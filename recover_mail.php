<?php include 'includes/session.php'; ?>

<?php
$conn = $pdo->open();

$randomm ="";

$n = 7;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

if (isset($_POST['conf'])) {

    $emailconf = $_POST['emailconf'];


try{

    $stmt = $conn->prepare("SELECT * FROM users WHERE email =:useremail");
    $stmt->bindParam(':useremail',$emailconf);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    if ($result) {
        $randomm = getName($n);
        $stmt = $conn->prepare("UPDATE users SET Code = :lastcode WHERE email =:useremail");
        $stmt->bindParam(':lastcode',$randomm);
        $stmt->bindParam(':useremail',$emailconf);
        $stmt->execute();
        include('mailer.php');
        header("Location:forget_password.php");

    }else{
        echo "error";
    }
 

}catch(PDOException $e){
        echo $e->getmessage();
    }
    
}
$conn = $pdo->close();

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
                            <form method="POST">
                                <div class="heading text-center mb-5">
                                    <h4 class="h4">البريد الالكترني المستخدم</h4>
                                    <img src="assets/images/logo.png" alt="" class="logo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="emailconf" />
                                    <label class="floating-label"> Email Adress </label>
                                </div>
                                <button class="submit-btn" name="conf">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/pattern-3.png" alt="" class="pattern">
        </section>
    </main>
    <?php include 'includes/regfooter.php'; ?>

    <script>
        //show password
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        $(window).scroll(function() {

            $scrollpos = $(this).scrollTop();
            if ($scrollpos >= 800) {
                $('.scroll-top-btn').css({
                    'opacity': '1'
                });

            } else {
                $('.scroll-top-btn').css({
                    'opacity': '0'
                });
            }


        });

        $('.scroll-top-btn').click(function() {




            $('html,body').animate({
                scrollTop: '0'
            }, 1000);

            return false;

        });
    </script>
</body>

</html>