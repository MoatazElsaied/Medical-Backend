<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$qty = $_POST['qty'];

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("UPDATE favorite SET quantity=:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$qty, 'id'=>$id]);
			$output['message'] = 'Updated';
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['favorite'] as $key => $row){
			if($row['productid'] == $id){
				$_SESSION['favorite'][$key]['quantity'] = $qty;
				$output['message'] = 'Updated';
			}
		}
	}

	$pdo->close();
	echo json_encode($output);
