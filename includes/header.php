<!DOCTYPE html>
<html>
<head>
    <!--start the meta tags-->
    <!--meta tag for utf-8 code for ar and en-->
    <meta charset="utf-8">
    <!--meta tag for description of website-->
    <meta name="description" content="....">
    <!--meta tag for the author of website-->
    <meta name="author" content="Moataz Elsaied">
    <!--meta tag for make website compatible with all screen devices-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--end the meta tags-->
    <!--title tag for website appear in tab-->
    <title>Medica </title>
    <!-- the style link for image icon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <!--start the intialize of css library files-->
    <!--the intilize of fontawsome lib-->
    <link rel="stylesheet" href="assets/css/lib/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.css">
    <!--the intilize of bootstrap en version lib-->
    <!-- <link rel="stylesheet" href="assets/css/lib/bootstrap.css"> -->
    <!--end the intilalize of css files-->
    <link rel="stylesheet" href="assets/css/lib/bootstrap-rtl.min.css">
    <!--the intilize of owl carousel lib-->
    <link rel="stylesheet" href="assets/css/lib/owl.carousel.min.css">
    <!--the intilize of dots that appear with owl carousel -->
    <link rel="stylesheet" href="assets/css/lib/owl.theme.default.css">
    <link rel="stylesheet" href="assets/css/lib/flipdown.css">
    <!--start the intilalize of css files -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--the media file screen -->
    <link rel="stylesheet" href="assets/css/media.css">
    <style>
    .paypal-button:not(.paypal-button-card){
    height: 40px!important;   
    }
    .callout {
      border-radius: 3px;
      margin: 0 0 20px 0;
      padding: 15px 30px 15px 15px;
      border:2px solid gray;
      border-left: 5px solid #eee;
    }
    .callout a {
      color: #fff;
      text-decoration: underline;
    }
    .callout a:hover {
      color: #eee;
    }
    .callout h4 {
      margin-top: 0;
      font-weight: 600;
    }
    .callout p:last-child {
      margin-bottom: 0;
    }
    .callout code,
    .callout .highlight {
      background-color: #fff;
    }
    .callout.callout-danger {
      border-color: #c23321;
    }
    .callout.callout-warning {
      border-color: #c87f0a;
    }
    .callout.callout-info {
      border-color: #0097bc;
    }
    .callout.callout-success {
      border-color: #00733e;
    }
    .callout-danger {
      background-color: #c23321;
      color: white;
    }
    .callout-warning {
        background-color: #c87f0a; 
    }
    .callout-info {
        background-color: #0097bc;
    }
    .callout-success {
        background-color: #00733e;
        color: white;
    }
    </style>
</head>
<body>
    <nav class="nav ">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <ul class="mail-content">
                            <li>
                                <i class="fas fa-envelope-open-text"></i>
                                <a href="#">support@admin.com</a>
                            </li>
                            <li>
                                <i class="fas fa-map-marked-alt"></i>
                                <a href="#"> مكان المتجر</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="hotline">
                            <li>
                                <span> الخط الساخن : </span>
                                <a href="#">33445</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mid-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-8">
                        <div class="nav-toggler">
                            <div class="hamburger" id="hamburger-6">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                            <a href="index.php" class="image-content">
                                <img src="images/logo.png" class="ml-4" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-4">
                        <ul class="button-groups">
                           <li>
								<form method="POST" action="search.php">
                                   <div class="form">
									<input class="search-input" name="keyword" type="text" placeholder="ابحث عن ما تريد">
                                       <a href="#" class="search-bnt">
                                          <i class="fas fa-search"></i>
                                       </a>
                                    </div>
									</form>
                            </li>
                          
                            <?php
                            if(isset($_SESSION['user'])):
                            ?>
                            <li class="profile-dropdown">
                               <div class="profile-name">
                                        <div class="image-content">
                                           <a href="profile.php"> <img style='width: 50px!important;' src="user_photos/<?php echo $_SESSION['image']; ?>" alt=""></a>
                                        </div>
                                    </div>
                                 </li>
                                <li class="dropdown profile-dropdown">    
                                    <a class="dropdown-toggle" href="profile.php" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <div class="profile-name">
                                            <div class="image-content">
                                                <img style='width: 50px!important;'  src="user_photos/<?php echo $_SESSION['image']; ?>" alt="" >
                                            </div>
                                            <div class="content">
                                                <a href="profile.php"><?php echo $_SESSION['fullname'];?></a>
                                            </div>
                                        </div>
                                        <ul class="profile-data">
                                                   <li>
                                                    <a href="profile.php">
                                                        <i class="far fa-user-circle"></i>
                                                        <span>الحساب</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="profile.php">
                                                        <i class="fas fa-user-cog"></i>
                                                        <span>الاعدادات</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="reset.php">
                                                        <i class="fas fa-sign-out-alt"></i>
                                                        <span> تسجيل خروج</span>
                                                    </a>
                                                </li>
                                             </ul>
                                            </div>
                                        </li>
                                        <?php
                                        else:
                                        ?>
                                         <li class="dropdown profile-dropdown">
                                                <a class="dropdown-toggle" href="profile.php" id="userDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-user"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="userDropdown">                       
                                                    <ul class="profile-data">
                                                             <li>
                                                                 <a href="login.php">
                                                                    <i class="far fa-user-circle"></i>
                                                                    <span>تسجيل دخول</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="register.php">
                                                                    <i class="fas fa-user-cog"></i>
                                                                    <span>تسجيل جديد</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                            <a href="forget_password.php">
                                                                <i class="fas fa-sign-out-alt"></i>
                                                                <span>هل نسيت كلمه المرور ؟</span>
                                                            </a>
                                                       </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <?php
                                                endif;
                                            ?>
                                            <li>
                                                <a href="favorite.php" class="dropdown-toggle"  id="navbarDropdown">	
                                                    <i class="far fa-heart"></i>
													<span class="favorite_count"></span>
                                                </a>
                                            </li>
											
                                            <li class="dropdown cart-shape">
                                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cart-plus"></i>
                                                    <span class="cart_count"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <div class="content">
                                                        <h6 class="heading">محتوي السله :-<span class="cart_count"></span></h6>
                                                    </div>
                                                    <ul class="data" id="cart_menu">
                                                    </ul>
                                                    <div class="buttons-contain">
                                                        <a href="cart.php" class="custom-btn black-btn">معاينه السله</a>
                                                        <a href="checkout.php" class="custom-btn blue-btn">الدفع</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="bottom-nav">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-12">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0">
                                                        <span class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <span><i class="fas fa-bars"></i></span>
                                                            جيمع الاقسام
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" class=" categories-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="data text-center">
                                                            <li>
                                                            <?php
                                                            $conn = $pdo->open();
                                                            try{
                                                              $stmt = $conn->prepare("SELECT * FROM category");
                                                              $stmt->execute();
                                                              foreach($stmt as $row){
                                                                echo "
                                                                  <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                                                                ";                  
                                                              }
                                                            }
                                                            catch(PDOException $e){
                                                              echo "There is some problem in connection: " . $e->getMessage();
                                                            }
                                                            $pdo->close();
                                                             ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-12">
                                        <ul class="nav-items">
                                            <li>
                                                <a href="index.php">الرئيسيه</a>
                                            </li>
                                            <li>
                                                <a href="who_us.php">
                                                    من نحن
                                                </a>
                                            </li>
                                            <li>
                                                <a href="products.php">
                                                    المنتجات
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact_us.php">
                                                    تواصل معنا
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>