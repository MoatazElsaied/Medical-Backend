<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<?php
/*
if ($_SERVER['REQUEST_METHOD']=='POST') {
//inputs
$userfirstnameUp = $_POST['firstname'];
$userLastnamenameUp = $_POST['Lastname'];
$Gender = $_POST['Gender'];
$Phone = $_POST['Phone'];
$emailUp    = $_POST['email'];
$passwordUp = $_POST['password'];
$passwordUp = md5($passwordUp);

$_SESSION['fullname'] = $_POST['firstname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['Gender'] = $_POST['Gender'];
$_SESSION['Phone'] = $_POST['Phone'];
//connect
$servername     = "mysql:host=localhost;dbname=ecomm";
$serverusername = "root";
$serverpassword = "";

        $conn = $pdo->open();
try{

$stmt = $conn->prepare("INSERT INTO users(firstname,lastname,email,password,Phone,Gender)
    VALUES(:firstname,:Lastname, :email,:password ,:Phone,:Gender)");

        $stmt->bindParam(':firstname',$userfirstnameUp);
        $stmt->bindParam(':Lastname',$userLastnamenameUp);
        $stmt->bindParam(':Gender',$Gender);
        $stmt->bindParam(':Phone',$Phone);
        $stmt->bindParam(':email',$emailUp);
        $stmt->bindParam(':password',$passwordUp);

        $stmt->execute();
        header("Location:index.php");

}catch(PDOException $e){
        echo $e->getmessage();
}

}
$conn = $pdo->close();
*/
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
                            <form method="POST" action="regis.php">
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
                                    <h4 class="h4"> تسجيل حساب جديد</h4>
                                    <p class="another-register"> لديك حساب بالفعل ؟ <a href="login.php">تسجيل الدخول</a></p>
                                    <img src="assets/images/logo.png" alt="" class="logo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="firstname"  value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>"/>
                                    <label class="floating-label">  الاسم الاول  </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="lastname"  value="<?php echo (isset($_SESSION['Lastname'])) ? $_SESSION['Lastname'] : '' ?>"/>
                                    <label class="floating-label"> الاسم الاخير  </label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>"/>
                                    <label class="floating-label">البريد الالكتروني  </label>
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="Phone"  value="<?php echo (isset($_SESSION['Phone'])) ? $_SESSION['Phone'] : '' ?>"/>
                                    <label class="floating-label"> رقم الهاتف </label>
                                </div>
                                 <div> <p class="ml-2">النوع :</p>
                                <span>
                                  
                                    <input type="radio" value="Male" autocomplete="off" autofocus required name="Gender" />
                                      <label>ذكر</label>
                                </span>
                                <span>
                                    
                                    <input type="radio" value="female" autocomplete="off" autofocus required name="Gender" />
                                    <label>انثي</label>
                                </span>

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" autocomplete="off" autofocus
                                        required name="password" />
                                    <label class="floating-label">  الرقم السري  </label>
                                    <span class="togglePassword"><i class="fas fa-eye" id="togglePassword"></i></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="repassword" autocomplete="off" autofocus required />
                                    <label class="floating-label"> إعادة الرقم السري  </label>
                                </div>
                                <button class="submit-btn" name="signup"> تسجيل جديد </button> 
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
   <?php include('includes/regfooter.php')?>
  