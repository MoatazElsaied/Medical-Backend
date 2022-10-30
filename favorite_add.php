<?php
include 'includes/session.php';

$conn = $pdo->open();

$output = array('error' => false);

$id = $_POST['id'];
$quantity = 1;

if (isset($_SESSION['user'])) {
	$stmt = $conn->prepare("SELECT * FROM favorite WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['user_id' => $user['id'], 'product_id' => $id]);
	$row = $stmt->fetch();
	if ($row < 1){
		try {
			$stmt = $conn->prepare("INSERT INTO favorite (user_id, product_id) VALUES (:user_id, :product_id)");
			$stmt->execute(['user_id' => $user['id'], 'product_id' => $id]);
			$output['message'] = 'Item added to favorite';
		} catch (PDOException $e) {
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	} else {
		$output['error'] = true;
		$output['message'] = 'Product with id '.$id.' already in favorite';
	}
} else {
	if (!isset($_SESSION['favorite'])) {
		$_SESSION['favorite'] = array();
	}

	$exist = array();

	foreach ($_SESSION['favorite'] as $row) {
		array_push($exist, $row['productid']);
	}

	if (in_array($id, $exist)) {
		$output['error'] = true;
		$output['message'] = 'Product with id '.$id.' already in favorite';
	} else {
		$data['productid'] = $id;
		$data['quantity'] = $quantity;

		if (array_push($_SESSION['favorite'], $data)) {
			$output['message'] = 'Item with id '.$id.' added to favorite';
		} else {
			$output['error'] = true;
			$output['message'] = 'Cannot add item with id '.$id.' to favorite';
		}
	}
}

$pdo->close();
echo json_encode($output);

?>
<?php
/*include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$prodid = $_POST['id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT * FROM favorite WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$prodid]);
		$row = $stmt->fetch();
		if(count($row) == 0){
			try{
				$stmt = $conn->prepare("INSERT INTO favorite (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$prodid, 'quantity'=>$quantity]);
				$output['message'] = 'Item added to favorite';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in favorite';
		}
	}
	else{
		if(!isset($_SESSION['favorite'])){
			$_SESSION['favorite'] = array();
		}

		$exist = array();

		foreach($_SESSION['favorite'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($prodid, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in favorite '.$prodid;
		}
		else{
			$data['productid'] = $prodid;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['favorite'], $data)){
				$output['message'] = 'Item added to favorite'.$prodid;
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to favorite'.$prodid;
			}
		}

	}

	$pdo->close();
	echo json_encode($output);
*/
?>
