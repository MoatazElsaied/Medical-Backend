<?php include 'includes/session.php'; ?>

<?php

    // Get PHP Mailer
    include('ContactMailer.php');
 

?>
<?php
    include('includes/header.php');

?>
     <!--start main-->
    <main>
        <section class="header">
            <div class="container">
                <h4>تواصل معنا</h4>
                <ul>
                    <li>
                        <a href="index.php">الرئيسيه</a>
                    </li>
                    <li>
                        <span>تواصل معنا</span>
                    </li>
                </ul>
            </div>
        </section>
        <!--start contact us-->
        <section class="contact-us">
            <div class="container">
                <div class="heading">
                    <h4>اطلب خدمتك</h4>
                    <p>توفير كافة سُبل الراحة لك ولأفراد أسرتك </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="form" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="الاسم ثلاثي " name="fullname">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="الجوال" name="tel">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="الايميل" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="البلد" name="country">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <select class="form-control" name="service">
                                            <option selected> نوع الخدمة </option>
                                            <option>استشارة طبية من افضل البروفسورات </option>
                                            <option> برنامج الفحص الشامل والفحص المبكر بالخارج</option>
                                            <option> تنظيم رحلة علاج بالخارج- </option>
                                            <option>برامج الرعاية الطبية الاخرى </option>
                                            <option>استفسارات </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 mb-3">
                                    <div class="form-group">
                                        <textarea placeholder="وصف الحالة " name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="input-images"></div>
                                </div>
                                <div class="col-12">
                                    <div class="button-content">
                                        <button class="custom-btn blue-btn" name="btn">تقديم الطلب</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--end main-->

   <?php
include 'includes/footer.php' ;

?>
</body>

</html>