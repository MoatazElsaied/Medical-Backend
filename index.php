
<?php include 'includes/session.php'; ?>
<?php
$conn = $pdo->open();





$take = array('Laptops','Desktop PC','Tablets','Smart Phones');

if (isset($_GET['catid'])) {
   $getCat = $_GET['catid'];
} else{
    $getCat = $take[0];
}
try{


         // One Product To Display By It's ID And It's category
            $stmt = $conn->prepare("SELECT * ,category.name ,category.id
              FROM products,category WHERE  products.category_id = category.id  && category.name =:ID");
            $stmt->bindparam(":ID",$getCat);
            $stmt->execute();
            $selcetedProd = $stmt->fetchAll();
    
            $owldata = $conn->prepare("SELECT * FROM products LIMIT 8");
            $owldata->execute();
            $varyData = $owldata->fetchAll();

  
}
catch(PDOException $e){
  echo "There is some problem in connection: " . $e->getMessage();
}


   

$pdo->close();


?>
<?php
    include('includes/header.php');

?>

    <!-- Slider main container -->
  <main>
    <!--start header-->
    <header>
        <div class="owl-carousel owl-theme owl-header">
            <div class="item gray-bk">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="content">
                                <h6>خصم 33% </h6>
                                <h3>
                                    Disposable NIOSH N95 Flat Fold Dust Mask
                                </h3>
                                <p>
                                    Medicia as always focused on the best treatments with affordable price through
                                    the best medical services.
                                </p>
                                <div class="buttons-contain">
                                    <a href="checkout.php" class="custom-btn black-btn">تسوق الان</a>
                                    <a href="products.php" class="custom-btn blue-btn">شاهد المزيد</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="image-content">
                                <img src="assets/images/mask.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item gray-bk">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="content">
                                <h6>خصم 33% </h6>
                                <h3>
                                    Disposable NIOSH N95 Flat Fold Dust Mask
                                </h3>
                                <p>
                                    Medicia as always focused on the best treatments with affordable price through
                                    the best medical services.
                                </p>
                                <div class="buttons-contain">
                                    <a href="checkout.php" class="custom-btn black-btn">تسوق الان</a>
                                    <a href="products.php" class="custom-btn blue-btn">شاهد المزيد</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="image-content">
                                <img src="assets/images/meter.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="banners">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 mb-5">
                    <div class="banner-item">
                        <a href="checkout.php">
                            <img src="assets/images/glaves.jpg" alt="">
                        </a>
                        <div class="content">
                            <small>Medical Supplies</small>
                            <h3>Coronavirus Medical Supplies</h3>
                            <a href="products.php" class="custom-btn black-btn">شاهد المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12 mb-5">
                    <div class="banner-item">
                        <a href="checkout.php">
                            <img src="assets/images/medican.jpg" alt="">
                        </a>
                        <div class="medican-content">
                            <small>Medical Supplies</small>
                            <h3>Coronavirus Medical Supplies</h3>
                            <a href="products.php" class="custom-btn blue-btn">شاهد المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="data-cards">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="75" viewBox="0 0 60 75">
                                <image width="60" height="75" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABLCAMAAAAbBRQ5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACuFBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAABT/KRRAAAA5nRSTlMAAEXqskiw/bHuJmv4Ce0l4htC7Ll7RPC+gHef1O8nvIF9xgM6oSm4fAt6qHSJg3bB24fCwMUCdXPHBA0gB1z+tk2z5ppvcsoFCm3LCJdlSWrQbMg3qSjMptjk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">
                                </image>
                            </svg>
                        </div>
                        <h6>Medical Equipment</h6>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="77" height="61" viewBox="0 0 77 61">
                                <image width="77" height="61" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAA9CAMAAADf9RRDAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC1lBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAAC+OtfvAAAA8HRSTlMAAF2o0u7z8tmqbBxCkMHp472OHR/1kQ9OxQuryZd2Zm/H4j7sgWdqh7HNUETCRwRS5/wnlakjIvCmKMhV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">
                                </image>
                            </svg>
                        </div>
                        <h6>Surgery Equipments</h6>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68" height="67" viewBox="0 0 68 67">
                                <image width="68" height="67" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABDCAMAAAASyFM4AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC+lBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAAB8xSA+AAAA/HRSTlMAAAlEgazV8v7wz6VkHUae6/2jKlPG6Kd3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">
                                </image>
                            </svg>
                        </div>
                        <h6>General Medicine</h6>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72" height="72" viewBox="0 0 72 72">
                                <image width="72" height="72" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAMAAABiM0N1AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAC5VBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAACgzv4VAAAA9XRSTlMAAAzaJQRTKSMNz/09GiJOrwWQtEovPhIe+WAOOGuMscgDhphsOxCJJMLweCyN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">
                                </image>
                            </svg>
                        </div>
                        <h6>CVID-19 Prevention</h6>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="58" height="70" viewBox="0 0 58 70">
                                <image width="58" height="70" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAABGCAMAAACqhXegAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACvlBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAAByPioKAAAA6HRSTlMAADqGt+T57MOWUAVcx+B1BiO8unhPNDFFb6n025cnFHbzRtw7GbR/IcoMmFjS3wiq/hZjKOKsAemLmldBJU0J1MuQo6RMYOPeoBwVKzz6xDUNYtby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">
                                </image>
                            </svg>
                        </div>
                        <h6>Health & Fitness</h6>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <a href="products.php" class="box">
                        <div class="image-content">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="66" height="66" viewBox="0 0 66 66">
                                <image width="66" height="66" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCCAMAAADUivDaAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACiFBMVEWJkav///+JkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkauJkasAAACPpkJXAAAA1nRSTlMAABHb4hLa6BXc3t8QFBbd2Bjg1xnhD9kXKSg9IwrVDmmQO+wNapxH/prRbKa0a2cx/OqZNX4u+a1/QlmYMrIIgF5UPzZdbXyekwU4+297Kxs695tSGvCpjwZcSoh6WD4tYI14WsL0IEiKcHdVvvaOV+8nY4vrgol2qnECckPzJmSHIay/u8GWc1vF8R9Ng24q9YVmwExO5nV0jCKElPhG44FPp2hlXzNBOaFJPBwkB3nM7lOko6WoLKDI8r0vtzSx+oZ9uFFW7ce5MJWu6aJixCXUQMvQhXlyRgAAAAFiS0dE15CyWj8AAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAHdElNRQfkBRcXEgVV2CLLAAAEcElEQVRYw6WW+18UVRjGXxZYFuVmkgqUSt51FcFyWUgQW0pWDDWzADVAMDUpS8ELIGCQbggilYpmKJAUoYUuGGIXs6vdb8/f0zlndmdnZ2f30+w8P53LfL6f933Oe945RMZkiowySIg2I8YYwRKLSIsxwhSYTRGGCFNhjoswgmAxxEaTEQSLITKejCASEmGOJiOIeOaDiYwgWBZJcWQEMe0hTDeREUTywzDPICMIS5TkZPgI5sPMODKCmMWcNFG4iJRU5gNzMo7CRaQBjzwahdlzKBzE3HSixwDMS0TSfAoHsQBYuGgxliwElqq2/idiGYSsRMuRmBoOYgWQsTITWXy8CnhcP4Jl8QTRahuy2cQO5OhGzOWE3CdpTSby8tcCBboTYVnYaR3wFDkyMRUo1G3n08AzROtR5CTaUAysI72IjcCzVLJp/mYxc2zBc06dCBHDVkR6589vwwv6EMs4gfnwIpWWreYL5VuwXReCxbCDdnICvQRbBVElUKXLC+bDLqoWBDLVYPfLe4C9pAexD3iF9gPp0rQWryIgi9CIfTyG/VIMQrM1CSEQGz0+vOZdOPC6JiE4QjhZ7XHPWfgGHdTyIRRC+JALHBKzHNTVA4dJD4IRjsgxsKfMUWj7EBxxjMcg6qGhTDSYyuAEbUSjJwbmZBOONxO1AK1EJ95sa1fprZP5mohTPAaX5EP02+g43Ql0sfEZaKhbC3GMx5Ar+1+Ds0APH72Dd9/z17kOlGggBMGl8D/J60MLTqo/Po+UQAQjXKACxW3auc3rZAtWqRExGohe4BSVARf5xFl4iTv5vmdvBWZWFSmVfvkDVKgRR4BGfhZSFn24chW46t0s0LLzkgpxgd8snw+WbPZNvW+7r7+zKRsDTecGez+8Brj2dPYPqepCVFQZP4sGVzNfyBD1ICul76OPBzCcxvvoJ0D/SE7TdX9EI3dyhvC/HB03REX1+LY/rZWjr6LPvMN6JYL50EtUms4jTxjFzeudflnQLdQNu63usfHbYw76fGJ8zGqdYJlO8yF2CYJXzjuY9CewVrw+sJLrUCEjUuQG51GsVNU+tcAdiIhBqoyYcxfTv1DsuSZ9p+lFWIMjcu189iVsX0lJFJ7mP3M7aSO6v66p9ehu2z0JwQphgu+NoVi8HMoxxQ51DD7EN/61xRGi6DhjALBxRkIeVE76Ie7j2+9uSdr6/aRAAMM3gCJTO0bzcM9B4kkSSJARO5TFcl4gLuJm9yzgB/w48hNQ/IAGgfsUCvGz7+yzJC+2A2ssQFb1Hfxixa+HtAkKxGV5rcGDoMOMEQ/sRhsRCwRrKTRC0YnlutgLrOS58HG7qqICEF2InbgtafyoTS6tVmCIMYr4+AGFRpwJPFShHsCRsBi/UXB5EfkHDhZ45Pr9uKLAmR9DlmK4G4IiMgJbJ9EVlPhuKvOjJNkW7MfJNIg/0lQaWXQWzYp+wc52ScC7VKE/tVon/ipVdq0utnIthBl/L1/6j79G/3Un+/fO1nmVpF8REf8BzCGHiMwwgdAAAAAASUVORK5CYII=">
                                </image>
                            </svg>
                        </div>
                        <h6>Medical Tools</h6>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--start general porduct -->
    <section class="general-product">
        <div class="container">
            <div class="heading">
                <h4>منتجات حسب الاقسام</h4>
                <p>تصفح المنتجات واحصل علي المنتجات بخصومات رائعه</p>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                    اشهر المنتجات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                    الاكثر تقيم
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                    العناصر المميزه
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
							<?php
                              
$output = "";

$conn = $pdo->open();
try {
  $unmproducts = 6;
  $stmt = $conn->prepare("SELECT * FROM products");
  $stmt->execute();
  $stmt = $stmt->rowCount();

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $totalPage = ceil($stmt / $unmproducts);
  $results = $conn->prepare("SELECT * FROM products LIMIT " . $unmproducts . " OFFSET " . ($page - 1) * $unmproducts);
  $results->execute();
  foreach ($results as $Oneproduct) {
    //  print_r($Oneproduct);
    $output .= "  <div class='col-lg-4 col-md-6 col-12 mb-5'>
                                         <form id='productForm' method='post'>
                                                    <div class='product-box'>
                                                      <div class='image-content'>
                                                      <input id='hide1' type='hidden' value='" . $Oneproduct['id'] . "' name='id'>
                                                      <input id='hide2' type='hidden' value='1' name='quantity'>
				
                                                        <img src='images/" . $Oneproduct['photo'] . "' alt='' name='img'/>
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
                                                              href='single_product.php?Oneid=" . $Oneproduct['id'] . "'
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
                                                              <button type='button' onclick='moataz(". $Oneproduct['id'].")' class='far fa-heart' id='add1' name='addtofavorite'></button>
                                                            </span>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                      <div class='product-content'>
                                                        <a href='single_product.php?Oneid=" . $Oneproduct['id'] . "'
                                                          name='name' >" . $Oneproduct['name'] . "</a
                                                        >
                                                        <p name='pric'>" . $Oneproduct['price'] . "</p>
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
  }

  $output .= "<div class='col-12'><div class='block-27 mt-5  text-center'>";



  $output .= "</div></div>";

  echo $output;
} catch (PDOException $e) {
  echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

		?>					   
  
                <div class="col-12">
                    <div class="button-content">
                        <a href="products.php" class="custom-btn black-btn">تصفح باقي المنتجات</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start offer section-->
    <section class="offers gray-bk">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mb-5">
                    <div class="offers-content">
                        <h6>خصومات تصل الي 50%</h6>
                        <h4>اغتنم الفرصه لتصفح المنتجات باسعار مناسبه </h4>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                        </p>
                        <ul>
                            <li>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                            </li>
                            <li>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                            </li>
                            <li>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                            </li>
                            <li>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                            </li>
                            <li>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                            </li>
                        </ul>
                        <a href="cart.php" class="custom-btn blue-btn">اشتري الان</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mb-5">
                    <div class="image-content">
                        <img src="assets/images/img_2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start new products-->
    <section class="new-products">
        <img src="assets/images/pill.png" class="pill-pattern" alt="">
        <div class="container">
            <div class="heading">
                <h4>منتجات وصلت حديثا</h4>
                <p>تصفح المنتجات واحصل علي المنتجات بخصومات رائعه</p>
            </div>
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel owl-theme owl-partner">
                        <?php

                            foreach ($varyData as $onerow) {
                                echo "<div class='item'>
                           <form id='productForm' method='post'>
                                                    <div class='product-box'>
                                                      <div class='image-content'>
                                                      <input id='hide1' type='hidden' value='" . $onerow['id'] . "' name='id'>
                                                      <input id='hide2' type='hidden' value='1' name='quantity'>
				
                                                        <img src='images/" . $onerow['photo'] . "' alt='' name='img'/>
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
                                                              href='single_product.php?Oneid=" . $onerow['id'] . "'
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
                                                              <button type='button' onclick='moataz(". $onerow['id'].")' class='far fa-heart' id='add1' name='addtofavorite'></button>
                                                            </span>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                      <div class='product-content'>
                                                        <a href='single_product.php?Oneid=" . $onerow['id'] . "'
                                                          name='name' >" . $onerow['name'] . "</a
                                                        >
                                                        <p name='pric'>" . $onerow['price'] . "</p>
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
                            }


                        ?>
                    </div>
    </section>
    <!--satrt skin product-->
    <section class="skin-offers gray-bk">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mb-5">
                    <div class="content">
                        <h6>عروض مميزه وخصومات تصل الي 50% علي منتاجات العنايه بالبشره</h6>
                        <h4>كريمات طبيعيه 100% </h4>
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز</p>
                        <div id="flipdown" class="flipdown"></div>
                        <a href="cart.php" class="custom-btn blue-btn">اشتري الان</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mb-5">
                    <div class="image-content">
                        <img src="assets/images/product_skin.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <img src="assets/images/leaf_1.png" class="left-leaf" alt="">
        <img src="assets/images/leaf_1.png" class="right-leaf" alt="">
    </section>
    <!--start blog-->
    <section class="blog">
        <img src="assets/images/pill.png" class="pill-pattern" alt="">
        <img src="assets/images/pill.png" class="pill-pattern-right" alt="">
        <div class="container">
            <div class="heading">
                <h4>المدونه</h4>
                <p>اخر الاخبار بالنسبه للدواء والادوات الطبيه </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="blog-box">
                        <div class="image-content">
                            <div class="type">
                                <p>medplus</p>
                            </div>
                            <img src="assets/images/blog_img_1.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    22 - 5 - 2021
                                </li>
                                <li>
                                    /
                                </li>
                                <li>
                                    5 min
                                </li>
                            </ul>
                            <h6>Lorem Ipsum is simply dummy text of the printing and typesettin</h6>
                            <a href="single_product.php" class="custom-btn black-btn">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="blog-box">
                        <div class="image-content">
                            <div class="type">
                                <p>medplus</p>
                            </div>
                            <img src="assets/images/blog_img_2.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    22 - 5 - 2021
                                </li>
                                <li>
                                    /
                                </li>
                                <li>
                                    5 min
                                </li>
                            </ul>
                            <h6>Lorem Ipsum is simply dummy text of the printing and typesettin</h6>
                            <a href="single_product.php" class="custom-btn black-btn">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="blog-box">
                        <div class="image-content">
                            <div class="type">
                                <p>medplus</p>
                            </div>
                            <img src="assets/images/blog_img_3.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    22 - 5 - 2021
                                </li>
                                <li>
                                    /
                                </li>
                                <li>
                                    5 min
                                </li>
                            </ul>
                            <h6>Lorem Ipsum is simply dummy text of the printing and typesettin</h6>
                            <a href="single_product.php" class="custom-btn black-btn">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



    <!--Scroll to top button-->
    <a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!-- scroll top button -->

    <?php
    include('includes/footer.php');
    ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Unix timestamp (in seconds) to count down to
        var twoDaysFromNow = (new Date().getTime() / 1000) + (86400 * 2) + 1;

        // Set up FlipDown
        var flipdown = new FlipDown(twoDaysFromNow)

            // Start the countdown
            .start()
    });
</script>