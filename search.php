<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

				<div class="col-lg-9 col-md-8 col-12 mb-3">
				<div class="callout text-center" id="callout" style="display:none">
                        <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                        <span class="message"></span>
                     </div>			  
	            <?php
	       			$conn = $pdo->open();
	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h3 class="page-header text-center text-primary">No results found for <b>'.$_POST['keyword'].'</b></h3>';
	       			}
	       			else{
	       				echo '<h3 class="page-header text-center text-primary">Search results for <b> '.$_POST['keyword'].' </b></h3>';
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
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
					}

					$pdo->close();

	       		?> 
	        	</div>
	        </div>
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