<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>
<section class="header">
		<div class="container">
			<h4>الاقسام</h4>
			<ul>
				<li>
					<a href="index.php">الرئيسيه</a>
				</li>
				<li>
					<span>الاقسام</span>
				</li>
			</ul>
		</div>
	</section>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-12">
		            <h2 class="page-header text-center m-3 text-primary"><?php echo $cat['name']; ?></h2>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';

						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							 <div class='col-lg-4 col-md-6 col-12 mb-5'>
                                         <form id='productForm' method='post'>
                                                    <div class='product-box'>
                                                      <div class='image-content'>
                                                      <input id='hide1' type='hidden' value='" . $row['id'] . "' name='id'>
                                                      <input id='hide2' type='hidden' value='1' name='quantity'>
				
                                                        <img src='images/" . $row['photo'] . "' alt='' name='img'/>
                                                        <ul class='add-items'>  
                                                          <li>
                                                            <span
                                                              
                                                              data-toggle='tooltip'
                                                              data-placement='top'
                                                              title='  Add to cart'
                                                            >
                                                              <button type='submit' class='fas fa-shopping-basket' id='add' name='addtocart'></button>
                                                            </span>
                                                          </li>
                                                          <li>
                                                            <a
                                                              href='single_product.php?Oneid=" . $row['id'] . "'
                                                              data-toggle='tooltip'
                                                              data-placement='top'
                                                              title=' View Details'
                                                            >
                                                              <i class='far fa-dot-circle'></i>
                                                            </a>
                                                          </li>
                                                          <li>
                                                              <span
                                                              data-toggle='tooltip'
                                                              data-placement='top'
                                                              title='  Add to favorite'
                                                            >
                                                              <button type='button' onclick='moataz(". $row['id'].")' class='far fa-heart' id='add1' name='addtofavorite'></button>
                                                            </span>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                      <div class='product-content'>
                                                        <a href='single_product.php?Oneid=" . $row['id'] . "'
                                                          name='name' >" . $row['name'] . "</a
                                                        >
                                                        <p name='pric'>" . $row['price'] . "</p>
                                                        <ul class='rate'>
                                                          <li class='active'>
                                                            <i class='fas fa-star'></i>
                                                          </li>
                                                          <li class='active'>
                                                            <i class='fas fa-star'></i>
                                                          </li>
                                                          <li class='active'>
                                                            <i class='fas fa-star'></i>
                                                          </li>
                                                          <li class='active'>
                                                            <i class='fas fa-star'></i>
                                                          </li>
                                                          <li>
                                                            <i class='fas fa-star'></i>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                        </form>
                                      </div> 
					
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        	
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>