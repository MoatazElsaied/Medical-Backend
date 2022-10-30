<?php include 'includes/session.php'; ?>
<?php include('includes/header.php'); ?>
<section class="header">
    <div class="container">
        <h4>المنتجات</h4>
        <ul>
            <li>
                <a href="index.php">الرئيسيه</a>
            </li>
            <li>
                <span>المنتجات</span>
            </li>
        </ul>
    </div>
</section>
  <section class="general-product">
    <div class="container">
         <div class="row">
                       <div class="col-lg-3 col-md-8 col-12 mb-3">
                <div class="filter">
                    <form class="form">
                        <input type="text" placeholder="ابحث هنا">
                        <button class="search"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="categroy">
                        <h4>الاقسام</h4>
                        <ul class="links">
                            <li>
                                <a href="#">الادويه</a>
                            </li>
                            <li>
                                <a href="#">مستحضرات التجميل</a>
                            </li>
                            <li>
                                <a href="#">الادوات الطبيه</a>
                            </li>
                            <li>
                                <a href="#">الاجهزه الطبيه</a>
                            </li>
                            <li>
                                <a href="#">ادويه التخسيس</a>
                            </li>
                            <li>
                                <a href="#">ادويه السكر والضغط</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
                     <div class="col-lg-9 col-md-8 col-12 mb-3">
                     <div class="callout text-center" id="callout" style="display:none">
                        <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                        <span class="message"></span>
                     </div>
           				  <div class="heading">
                        <h4>منتجات حسب الاقسام</h4>
                        <p>تصفح المنتجات واحصل علي المنتجات بخصومات رائعه</p>
                    </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-list-content">
                                        <ul class="list-style">
                                            <li class="grid active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="000000">
                                                    <path id="_3_Grid" data-name="3 Grid" class="cls-1" d="M675,571h3.812v3.812H675V571Zm0,6.094h3.812v3.812H675v-3.812Zm0,6.093h3.812V587H675v-3.813ZM681.094,571h3.812v3.812h-3.812V571Zm0,6.094h3.812v3.812h-3.812v-3.812Zm0,6.093h3.812V587h-3.812v-3.813ZM687.188,571H691v3.812h-3.812V571Zm0,6.094H691v3.812h-3.812v-3.812Zm0,6.093H691V587h-3.812v-3.813Z" transform="translate(-675 -571)"></path>
                                                </svg>
                                            </li>
                                            <li class="small-grid">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="000000">
                                                    <path id="_2_Grid" data-name="2 Grid" class="cls-1" d="M707,580h7v7h-7v-7Zm10,1h6v6h-6v-6Zm-10-10h7v7h-7v-7Zm9,9h7v7h-7v-7Zm1-9h6v6h-6v-6Zm-1,0h7v7h-7v-7Z" transform="translate(-707 -571)"></path>
                                                </svg>
                                            </li>
                                            <li class="list">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="000000">
                                                    <path id="_1_Grid" data-name="1 Grid" class="cls-1" d="M738,571h4v4h-4v-4Zm0,6h4v4h-4v-4Zm0,6h4v4h-4v-4Zm6-12h10v4H744v-4Zm0,6h10v4H744v-4Zm0,6h10v4H744v-4Z" transform="translate(-738 -571)"></path>
                                                </svg>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="prodcut-content-list">
                                <div id="rowGrid" class="row grid">
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row" id="pagination_data">
                                                </div>
                                            </div>
                    				   </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="block-27 mt-5  text-center">              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                        ?>
                         <!--Scroll to top button-->
                        <a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                        <!-- scroll top button -->
						        <script>
            $(".grid").click(function(){
                $("#rowGrid").addClass('grid');
                $("#rowGrid").removeClass('small-grid');
                $("#rowGrid").removeClass('list-grid');
                $('.grid').addClass('active');
                $('.small-grid').removeClass('active');
                $('.list').removeClass('active');
            });
            $(".small-grid").click(function(){
                $("#rowGrid").addClass('small-grid');
                $("#rowGrid").removeClass('grid');
                $("#rowGrid").removeClass('list-grid');
                $('.small-grid').addClass('active');
                $('.grid').removeClass('active');
                $('.list').removeClass('active');
            });
            $(".list").click(function(){
                $("#rowGrid").addClass('list-grid');
                $("#rowGrid").removeClass('small-grid');
                $("#rowGrid").removeClass('grid');
                $('.list').addClass('active');
                $('.grid').removeClass('active');
                $('.small-grid').removeClass('active');
            });
        </script>
                        <?php
                        include('includes/footer.php');
                        ?>