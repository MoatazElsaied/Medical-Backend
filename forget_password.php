<?php include 'includes/session.php'; ?>
<?php


$conn = $pdo->open();

if (isset($_GET['Confirm2'])) {
    $code        = $_GET['code'];
    $passconfirm = $_GET['passConfirm'];
    $passconfirm = md5($passconfirm);
    //connect


    try {

        $stmt = $conn->prepare("SELECT Code FROM users WHERE Code=:code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            foreach ($result as $user) {
                if ($user['Code'] == $code) {

                    $stmt = $conn->prepare("UPDATE users SET Password=:passconfirm WHERE Code=:code");
                    $stmt->bindParam(':passconfirm', $passconfirm);
                    $stmt->bindParam(':code', $code);
                    $stmt->execute();
                    header("Location:login.php");
                } else {
                    echo "try again";
                }
            }
        } else {
            echo "error";
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}
$conn = $pdo->close();


?>


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
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!--start the intialize of css library files-->
    <!--the intilize of fontawsome lib-->
    <link rel="stylesheet" href="assets/css/lib/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <!--the intilize of bootstrap en version lib-->
    <!-- <link rel="stylesheet" href="assets/css/lib/bootstrap.css"> -->
    <!--the intilize of bootstrap ar version lib-->
    <link rel="stylesheet" href="assets/css/lib/bootstrap-rtl.min.css">
    <!--the intilize of owl carousel lib-->
    <link rel="stylesheet" href="assets/css/lib/owl.carousel.min.css">
    <!--the intilize of dots that appear with owl carousel -->
    <link rel="stylesheet" href="assets/css/lib/owl.theme.default.css">
    <link rel="stylesheet" href="assets/css/lib/flipdown.css">
    <!--end the intialize of css library files-->
    <!--start the intilalize of css files -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--the media file screen -->
    <link rel="stylesheet" href="assets/css/media.css">
    <!--end the intilalize of css files-->
</head>

<body>
    <!--start main-->
    <main>
        <!--Start register-pg -->
        <section class="register-pg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="form-wrapper">
                            <form>
                                <div class="heading text-center mb-5">
                                    <h4 class="h4">اعاده تعين الرقم السري</h4>
                                    <img src="assets/images/logo.png" alt="" class="logo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" autofocus required name="code" />
                                    <label class="floating-label">Confimation code</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" autocomplete="off" autofocus required name="passConfirm" />
                                    <label class="floating-label">Password </label>
                                    <span class="togglePassword"><i class="fas fa-eye" id="togglePassword"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" autocomplete="off" autofocus required />
                                    <label class="floating-label">Confirm password </label>
                                </div>
                                <button class="submit-btn" name="Confirm2">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets/images/pattern-3.png" alt="" class="pattern">
        </section>
    </main>
    <!--end main-->
    <!--start the intialize of js lib-->
    <!--first intilize jquery lib-->
    <script src="assets/js/lib/jquery-3.6.0.min.js"></script>
    <!--second intialize popper js lib-->
    <script src="assets/js/lib/popper.js"></script>
    <!--third intialize bootstrap js lib-->
    <script src="assets/js/lib/bootstrap.js"></script>
    <!--intialize owl coursel js lib -->
    <script src="assets/js/lib/owl.carousel.min.js"></script>
    <!--end the intialize of js lib-->
    <!--intialize main js file-->
    <script src="assets/js/main.js"></script>
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
    </script>
</body>

</html>