<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }

?>



<?php include 'includes/regheader.php'; ?>

    <!--start main-->
    <main>
        <!--Start register-pg -->
        <section class="register-pg">
		
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
					
                        <div class="form-wrapper">
                            <form method="POST" action="verify.php">
								<?php
								  if(isset($_SESSION['error'])){
									echo "
									  <div class='callout callout-danger text-center'>
										<p>".$_SESSION['error']."</p> 
									  </div>
									";
									unset($_SESSION['error']);
								  }
								  if(isset($_SESSION['success'])){
									echo "
									  <div class='callout callout-success text-center'>
										<p>".$_SESSION['success']."</p> 
									  </div>
									";
									unset($_SESSION['success']);
								  }
								?>
                                <div class="heading text-center mb-5">
                                    <h4 class="h4"> تسجيل الدخول الى حسابك    </h4>
                                        <p class="another-register">ليس لديك حساب  ? <a href="register.php"> تسجيل جديد</a></p>
                                        <img src="assets/images/logo.png" alt="" class="logo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="email" />
                                    <label class="floating-label">البريد الالكتروني </label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" autocomplete="off" autofocus
                                        required name="password" />
                                    <label class="floating-label"> الرقم السري </label>
                                    <span class="togglePassword"><i class="fas fa-eye" id="togglePassword"></i></span>
                                </div>
                                <div class="text w-100">
                                    <a class="forget-pass" href="recover_mail.php"> هل نسيت كلمة المرور؟</a>
                                </div>
                                <button class="submit-btn" name="signin"> تسجيل الدخول </button>
                                <a class="submit-btn" name="signin" href="index.php">الرجوع للصفحه الرئيسيه</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/pattern-3.png" alt="" class="pattern">
        </section>
    </main>
    <!--end main-->
    <?php include 'includes/regfooter.php'; ?>

