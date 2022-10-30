<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';

	if(isset($_SESSION['user'])){
		if(isset($_SESSION['favorite'])){
			foreach($_SESSION['favorite'] as $row){
				$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM favorite WHERE user_id=:user_id AND product_name=:product_name");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid']]);
				$crow = $stmt->fetch();
				if($crow['numrows'] < 1){
					$stmt = $conn->prepare("INSERT INTO favorite (user_id, product_id, quantity) VALUES (:user_id, :product_id,)");
					$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid'], 'quantity'=>$row['quantity']]);
				}
				else{
					$stmt = $conn->prepare("UPDATE favorite SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
					$stmt->execute(['quantity'=>$row['quantity'], 'user_id'=>$user['id'], 'product_id'=>$row['productid']]);
				}
			}
			unset($_SESSION['favorite']);
		}

		try{
			$total = 0;
			$stmt = $conn->prepare("SELECT *, favorite.id AS favoriteid FROM favorite LEFT JOIN products ON products.id=favorite.product_id WHERE user_id=:user");
			$stmt->execute(['user'=>$user['id']]);
			foreach($stmt as $row){
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$output .= "
					<tr>
					    <td>".$row['name']."</td>
						<td><img src='".$image."' width='30px' height='30px'></td>
						
						<td>&#36; ".number_format($row['price'], 2)."</td>
						</td>
						<td><button type='button' data-id='".$row['favoriteid']."' class='btn btn-danger btn-flat favorite_delete'><i class='far fa-trash-alt'></i></button></td>

					</tr>
				";
			}
			$output .= "
	
			";

		}
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(count($_SESSION['favorite']) != 0){
			$total = 0;
			foreach($_SESSION['favorite'] as $row){
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$subtotal = $product['price']*$row['quantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><img src='".$image."'  class='img-thumbnail'></td>
						<td>".$product['prodname']."</td>
						
						
						<td>&#36; ".number_format($product['price'], 2)."</td>
					
						<td><button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat favorite_delete'><i class='far fa-trash-alt'></i></button></td>
						
					</tr>
				";
				
			}

			
		}

		else{
			$output .= "
				<tr>
					<td colspan='6' align='center'><b>Shopping favorite empty</b></td>
				<tr>
			";
		}
		
	}

	$pdo->close();
	echo json_encode($output);
