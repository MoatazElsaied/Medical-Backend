<?php
include('includes/session.php');
?>
<?php
    if (isset($_GET['Oneid'])) {
        $conn = $pdo->open();
        try{
            // One Product To Display By It's ID And It's category
            $stmt = $conn->prepare("SELECT products.id,products.category_id, products.name,products.description,products.slug,products.price,products.photo,products.date_view,products.counter FROM products,category WHERE products.id = :product_id && products.category_id = category.id;");
            $stmt->bindparam(":product_id",$_GET['Oneid']);
            $stmt->execute();
            $selcetedProd = $stmt->fetchAll();

            // All Product In DB To Display In Botoom Slider Show
            $allProducts = $conn->prepare("SELECT * FROM products LIMIT 20,8");
            $allProducts->execute();
        } 
        catch(PDOException $e){
             echo "Product Not Found !: " . $e->getMessage();
            }
        $pdo->close();
    }
?>
<?php
    include('includes/header.php');

?>
   <section class="header">
                <div class="container">
                    <h4>تفاصيل المنتج</h4>
                    <ul>
                        <li>
                            <a href="index.php">الرئيسيه</a>
                        </li>
                        <li>
                            <a href="products.php">المنتجات</a>
                        </li>
                        <li>
                            <span>تفاصيل المنتج</span>
                        </li>
                    </ul>
                </div>
            </section>
            <!--start product-details -->
            <section class="product-details">
                <div class="container">
                    <div class="row">
                        
                        <?php 
                            foreach ($selcetedProd as $singelPro) {
                                echo '<div class="col-lg-4 col-md-6 col-12 mb-5">
								<form class="form" id="productForm" method="post">
                                <div class="item">
                                   <img src="images/'.$singelPro["photo"].'" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12 mb-5">
                            <div class="content">
                                <h3 class="type">'.$singelPro['name'].'</h3>
                                <h3>'.$singelPro["name"].'</h3>
                                <h3  class="price">'.$singelPro["price"].'$</h3>
                                <ul class="rate">
                                    <li class="active"> 
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li class="active">
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul>
                                <p class="description">
                                    
                                    '.$singelPro["description"].'                                    
                                </p>
                              <form class="form-inline" id="productForm" method="POST">
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
			            				</span>
							          	<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
							            <span class="input-group-btn">
							                <button type="button" id="plus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
							                </button>
							            </span>
							            <input type="hidden" value="'.$singelPro["id"].'"   name="id" >
							        </div>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat custom-btn black-btn" id="add"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form>
                                <ul class="code">
                                    <li>
                                        <strong>Available</strong>
                                        <span>'.$singelPro['counter'].'</span>
                                    </li>
                                    <li>
                                        <strong>Department</strong>
                                        <span>
                                             '.$singelPro['category_id'].'</span>
                                    </li>
                                    <li>
                                        <strong>Search Code </strong>
                                        <span>
                                        '.$singelPro['slug'].'
                                            </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</form>
                        <div class="col-12 mb-5">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    Full description
                                </a>
                                  <a  class="nav-item nav-link" id="nav-care-tab" data-toggle="tab" href="#nav-care" role="tab" aria-controls="nav-care" aria-selected="false">
                                        More information 
                                  </a>
                                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    Comments
                                  </a>
                                </div>
                            </nav>                                  
                        </div>
                        <div class="col-12 mb-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="data-content">
                                        <p>
                                            Know Who Your Target Audience is. The first step to writing product descriptions is to define your target audience. Hoodie is the most populat and trending proucts for both men’s an women in winter season. Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the takable look and sound of Marshall, unplugs the chords, and takes the show on the road.
                                            Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering. Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound that is both articulate & pronounced. The analogue knobs allow you to fine tune the controls to your personal preferences while the guitar-influenced.
                                        </p>
                                        <ul>
                                            <li>
                                                Downloadable/Digital Products, Virtual Products
                                            </li>
                                            <li>
                                                Downloadable/Digital Products, Virtual Products
                                            </li>
                                            <li>
                                                Downloadable/Digital Products, Virtual Products
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-care" role="tabpanel" aria-labelledby="nav-care-tab">
                                    <div class="data-content">
                                        <h4>additional information </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui consequatur ex voluptatem aspernatur, quos repellat laborum fugit animi quasi, vitae non quas a accusantium distinctio suscipit quam error? Similique, voluptatibus.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="data-content">
                                        <h5> Add Comment</h5>
                                        <p class="content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis delectus libero facilis iusto voluptas nobis. Soluta cum exercitationem quae dolores?</p>
                                        <form class="form" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Message" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="button-content">
                                                        <button class="custom-btn black-btn">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            }

                          ?>

                    </div>
                </div>
            </section>
           
        </main>
		<?php

if (isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $desc = $_POST['description'];

    require 'mail/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'emailproject20@gmail.com';                 // SMTP username
    $mail->Password = '123456789@@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('emailproject20@gmail.com', 'emailproject20');
    $mail->addAddress('emailproject20@gmail.com', 'emailproject20');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($email, $fullname);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Problem From Website User';
    $mail->Body    =  "<br> description :  " . $desc;
    $mail->AltBody = 'Problem From Website User';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo ' <h5 class="text-center text-primary">Message has been sent</h5>';
    }
}

?>

    <!--Scroll to top button-->
    <a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!-- scroll top button -->
    <!-- Start Footer -->
	
    <?php

include('includes/footer1.php');
?>
<?php include 'includes/script.php'; ?>
   <script>
$(function(){
	$('#plus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>