<?php
	require_once 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
			$_SESSION['fullname'] = $user['firstname']." ".$user['lastname'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['phone'] = $user['Phone'];
			$_SESSION['gender'] = $user['Gender'];
			if (!empty($user['photo'])) {
            $_SESSION['image'] = $user['photo'];
			
        } else {
            $_SESSION['image'] = 'download.png';
        }  
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
	
?>