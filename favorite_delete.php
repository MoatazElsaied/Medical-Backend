<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$id = $_POST['id'];

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("DELETE FROM favorite WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			$output['message'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['favorite'] as $key => $row){
			if($row['productid'] == $id){
				unset($_SESSION['favorite'][$key]);
				$output['message'] = 'Deleted';
			}
		}
	}

	$pdo->close();
	echo json_encode($output);
