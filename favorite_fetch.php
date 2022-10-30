<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT products.id, products.photo, products.name AS prodname, category.name AS catname ,favorite.user_id FROM favorite LEFT JOIN products ON products.id=favorite.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
				$output['list'] .= "
					<li class='item'>
					
					<div class='item-image'>
						<img src='".$image."' alt=''>
					</div>
					<div class='item-content'>
						
						
						<a href='../single_product.php?Oneid=".$row['id']."'><p>".$productname."</p></a>

						
						
					</div>
					
					
				</li>


					
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['favorite'])){
			$_SESSION['favorite'] = array();
		}

		if(empty($_SESSION['favorite'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['favorite'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT products.id,products.photo, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$output['list'] .= "
					<li class='item'>
					<div class='item-image'>
						<img src='".$image."' alt=''>
					</div>
					<div class='item-content'>
						
						<a href='single_product.php?Oneid=".$product['id']."'><p>".$product['prodname']."</p></a>
						
						
					</div>
					
					
				</li>
				";
				
			}
		}
	}

	$pdo->close();
	echo json_encode($output);
