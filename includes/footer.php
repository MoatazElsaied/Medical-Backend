<!-- Start Footer -->
     <footer>
     <img src="assets/images/pill.png" class="pill-pattern-right" alt="">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-6 col-12 mb-5">
                 <div class="content">
                     <div class="image-content">
                         <img src="assets/images/logo.png" alt="">
                     </div>
                     <p>
                         هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                         الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
                     </p>
                     <ul class="social-media">
                         <li>
                             <a href="#">
                                 <i class="fab fa-facebook-f"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <i class="fab fa-twitter"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <i class="fab fa-instagram"></i>
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <i class="fab fa-youtube"></i>
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-2 col-md-6 col-12 mb-5">
                 <div class="content">
                     <h6>المنتجات</h6>
                     <ul class="list">
                         <li>
                             <a href="#">الادويه</a>
                         </li>
                         <li>
                             <a href="#">الفيتامينات </a>
                         </li>
                         <li>
                             <a href="#">المعدات الطبيه</a>
                         </li>
                         <li>
                             <a href="#">
                                 جيمع المنتجات
                             </a>
                         </li>
                         <li>
                             <a href="#">معدات الدكاتره</a>
                         </li>
                         <li>
                             <a href="#">عروض الخصومات</a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-2 col-md-6 col-12 mb-5">
                 <div class="content">
                     <h6>روابط سريعه</h6>
                     <ul class="list">
                         <li>
                             <a href="#">الدعم الفني</a>
                         </li>
                         <li>
                             <a href="#">سياسة الاسترجاع
                             </a>
                         </li>
                         <li>
                             <a href="#">مركز المساعدة</a>
                         </li>
                         <li>
                             <a href="#">
                                 سياسة الخصوصيه
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 الشحن والاسترجاع
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-4  col-md-6 col-12 mb-5">
                 <div class="content">
                     <h6>الدفع الالكتروني</h6>
                     <p>
                         هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل
                         توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما-
                         للأحرف
                     </p>
                     <ul class="payment">
                         <li>
                             <a href="#">
                                 <img src="assets/images/card_1.png" alt="">
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <img src="assets/images/card_2.png" alt="">
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <img src="assets/images/card_3.png" alt="">
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <img src="assets/images/card_4.png" alt="">
                             </a>
                         </li>
                         <li>
                             <a href="#">
                                 <img src="assets/images/card_5.png" alt="">
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!--loading page-->
 <div class="loader">
     <div class="container">
         <div class="loading-content">
             <div class="drop-water light-blue"></div>
             <div class="drop-water light-blue"></div>
             <div class="box">
                 <div class="wave light-blue">

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--Scroll to top button-->
 <a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
     <i class="fas fa-chevron-up"></i>
 </a>
 <!--start the intialize of js lib-->
 <!--first intilize jquery lib-->
 <script src="assets/js/lib/jquery-3.6.0.min.js"></script>
 <!--second intialize popper js lib-->
 <script src="assets/js/lib/popper.js"></script>
 <!--third intialize bootstrap js lib-->
 <script src="assets/js/lib/bootstrap.js"></script>
 <!--intialize owl coursel js lib -->
 <script src="assets/js/lib/owl.carousel.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.0/gsap.min.js"></script>
 <script src="assets/js/lib/flipdown.js"></script>
 <!--end the intialize of js lib-->
 <!--intialize main js file-->
 <script src="assets/js/main.js"></script>
    
	<script>
	$(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"GET",  
                data:{page:page},  
                success:function(response){  
                     $('#pagination_data').html(response);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 }); 
	</script>
    <script src="js/scripts.js"></script>


</body>

</html>