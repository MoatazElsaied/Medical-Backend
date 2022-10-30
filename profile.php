<?php include 'includes/session.php';

if (!isset($_SESSION['user'])) {
    header('location: login.php');
  }
?>
<?php
$conn = $pdo->open();

if (isset($_POST['submit'])) {
$_SESSION['fullname'] = $_POST['fullname'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['gender'] = $_POST['gender'];

$fn=$_POST['fullname'];
$firstname=explode(" ", $fn)[0];
$lastname=explode(" ", $fn)[1];

try{

    $stmt = $conn->prepare("UPDATE users SET firstname = :firstname ,lastname = :lastname , Phone = :phone , Gender =:gender WHERE email = :useremail");
    $stmt->bindParam(':firstname',$firstname);
	$stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':useremail',$_SESSION['email'] );
	$stmt->bindParam(':phone',$_POST['phone'] );
	$stmt->bindParam(':gender',$_POST['gender'] );
    $stmt->execute();


     $target_dir = "user_photos/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $_SESSION['image']=$_FILES["fileToUpload"]["name"];

          } else {
                
             }


    $stmt=$conn->prepare("UPDATE users SET photo = :fileToUpload WHERE email=:useremail" );
    $stmt->bindParam(':fileToUpload',$_SESSION['image']);
    $stmt->bindParam(':useremail',$_SESSION['email']);
    $stmt->execute();


}catch(PDOException $e){
        echo $e->getmessage();
}

} else{

}
$conn = $pdo->close();

?>

<?php
    include('includes/header.php');

?>

    <main>
        <!------------------------------------ profile   ------------------------------------->
		     <section class="header">
                <div class="container">
                    <h4>الملف الشخصي</h4>
                    <ul>
                        <li>
                            <a href="index.php">الرئيسيه</a>
                        </li>
                        <li>
                            <span>الملف الشخصي</span>
                        </li>
                    </ul>
                </div>
            </section>
        <!--Start profile-pg-->
        <section class="profile-pg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="side-nav">
                            <div class="profile-img"> <img src="user_photos/<?php echo $_SESSION['image']; ?>" alt="user-pic">
                                <h6><?php echo $_SESSION['fullname'];?></h6>
                            </div>
                            <div class="links">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-tab1-tab" data-toggle="pill"
                                        href="#v-pills-tab1" role="tab" aria-controls="v-pills-tab1"
                                        aria-selected="false">
                                        <i class="far fa-edit"></i> البيانات الشخصيه
                                    </a>
                                    <a class="nav-link" id="v-pills-tab2-tab" data-toggle="pill" href="#v-pills-tab2"
                                        role="tab" aria-controls="v-pills-tab2" aria-selected="false">
                                        <i class="fas fa-map-marker-alt"></i>  بيانات العنوان
                                    </a>
                                    <a class="nav-link" id="v-pills-tab3-tab" data-toggle="pill" href="#v-pills-tab3"
                                        role="tab" aria-controls="v-pills-tab3" aria-selected="false">
                                        <i class="far fa-bell"></i>  الاشعارات
                                    </a>
                                    <a class="nav-link" id="v-pills-tab4-tab" data-toggle="pill" href="#v-pills-tab4"
                                        role="tab" aria-controls="v-pills-tab4" aria-selected="false">
                                        <i class="fas fa-shopping-bag"></i>  الطلبات
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel"
                                aria-labelledby="v-pills-tab1-tab">
                                <div class="tab-wrapper info-tab">
                                    <div class="sec-heading">
                                        <h4> البيانات الشخصيه</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>الاسم بالكامل</h6>
                                                <p class="text" name="username"><?php echo $_SESSION['fullname']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>البريد الالكتروني</h6>
                                                <p class="text" name="email"><?php echo $_SESSION['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>الهاتف</h6>
                                                <p class="text" name="phone"><?php echo $_SESSION['phone']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>النوع</h6>
                                                <p class="text" name="gender"><?php echo $_SESSION['gender']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="main-butn" data-toggle="modal"
                                                data-target="#infoModal">تعديل البيانات </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel"
                                aria-labelledby="v-pills-tab2-tab">
                                <div class="tab-wrapper info-tab">
                                    <div class="sec-heading">
                                        <h4>بيانات العنوان</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>الدوله</h6>
                                                <p class="text">مصر</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>المدينه</h6>
                                                <p class="text">القاهره</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>العنوان</h6>
                                                <p class="text"> تفاصيل العنوان هنا ...</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>الرقم البريدي</h6>
                                                <p class="text">1234</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="main-butn" data-toggle="modal"
                                                data-target="#addressModal">تعديل البيانات </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel"
                                aria-labelledby="v-pills-tab3-tab">
                                <div class="tab-wrapper notifications-tab">
                                    <div class="sec-heading">
                                        <h4>الاشعارات</h4>

                                    </div>
                                    <div class="noti-item mt-3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="new"></span>
                                                <img src="assets/images/product_3.png" alt="" class="noti-img">
                                            </div>
                                            <div class="col-md-8">
                                                <h6>Noon Card</h6>
                                                <span class="text">طلبك تحت المراجعه</span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="time">9:35 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti-item mt-3">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="assets/images/product_3.png" alt="" class="noti-img">
                                            </div>
                                            <div class="col-md-8">
                                                <h6>Noon Card</h6>
                                                <span class="text">طلبك تحت المراجعه</span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="time">9:35 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tab4" role="tabpanel"
                                aria-labelledby="v-pills-tab4-tab">
                                <div class="tab-wrapper orders-tab">
                                    <div class="sec-heading">
                                        <h4>الطلبات</h4>
                                    </div>
                                   			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">المنتج</th>
							<th class="text-center"> الصورة</th>
							<th class="text-center">السعر</th>
							<th class="text-center">الكميه</th>
							<th class="text-center">الاجمالي</th>
							<th class="text-center">مسح</th>
						</tr>
					</thead>
					<tbody id="tbody">
					</tbody>
				</table>
			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Info Modal-->
        <!---------------------------------------- Edit ----------------------------------->
  <!---------------------------------------- Edit ----------------------------------->
        <form method="POST" enctype="multipart/form-data">
        <div class="modal info-modal fade" id="infoModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">تعديل البيانات </h5><button type="button"
                            class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="image-container">
                            <img src="user_photos/<?php echo $_SESSION['image']; ?>" alt="user-pic" name="image">
                            <input type="file" class="custom-file-input" id="input-profile" name="fileToUpload"  capture="">
                            <button><i class="far fa-edit"></i></button>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>لاسم بالكامل </span>
                                    </div><input type="text" name="fullname" class="form-control enable-input" value="<?php echo $_SESSION['fullname']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>البريد الالكتروني </span>
                                    </div><input type="text" name="email" class="form-control enable-input" value="<?php echo $_SESSION['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span> الهاتف</span></div>
                                    <input type="text" class="form-control enable-input" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                                </div>
                            </div>
                             <div class="col-md-6">
                                            <div class="info-content">
                                                <h6>النوع</h6>
                                                 <input type="text" class="form-control enable-input" name="gender" value="<?php echo $_SESSION['gender']; ?>">
                                            </div>
                                        </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span> كلمة السر</span>
                                    </div><input type="password" class="form-control enable-input" value="<?php echo $_SESSION['password']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>إعادة كلمة السر </span>
                                    </div><input type="password" class="form-control enable-input" value="<?php echo $_SESSION['password']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="main-butn" name="submit">حفظ</button>
                    </div>

                </div>

            </div>

        </div>
        </form>
        <!--Address Modal-->
        <div class="modal info-modal fade" id="addressModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">تعديل البيانات</h5><button type="button"
                            class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>الدوله</span> </div>
                                    <select class="form-control enable-input">
                                        <option>مصر</option>
                                        <option> مصر </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>المدينه</span></div>
                                    <select class="form-control enable-input">
                                        <option>القاهره</option>
                                        <option> القاهره </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>العنوان </span></div>
                                    <input type="text" class="form-control enable-input" value="Address Details Here">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text">
                                    <div class="content"> <span>الرقم البريدي </span></div>
                                    <input type="text" class="form-control enable-input" value="1234">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-butn">حفظ</button>
                    </div>

                </div>

            </div>

        </div>
    </main>
    <!--Scroll to top button-->
    <a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!-- scroll top button -->
    <?php

include('includes/footer1.php');
include('includes/scripts.php');
?>
<script>
	var total = 0;
	$(function() {
		$(document).on('click', '.cart_delete', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: 'cart_delete.php',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		$(document).on('click', '.minus', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_' + id).val();
			if (qty > 1) {
				qty--;
			}
			$('#qty_' + id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		$(document).on('click', '.add', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var qty = $('#qty_' + id).val();
			qty++;
			$('#qty_' + id).val(qty);
			$.ajax({
				type: 'POST',
				url: 'cart_update.php',
				data: {
					id: id,
					qty: qty,
				},
				dataType: 'json',
				success: function(response) {
					if (!response.error) {
						getDetails();
						getCart();
						getTotal();
					}
				}
			});
		});

		getDetails();
		getTotal();

	});

	function getDetails() {
		$.ajax({
			type: 'POST',
			url: 'cart_details.php',
			dataType: 'json',
			success: function(response) {
				$('#tbody').html(response);
				getCart();
			}
		});
	}

	function getTotal() {
		$.ajax({
			type: 'POST',
			url: 'cart_total.php',
			dataType: 'json',
			success: function(response) {
				total = response;
			}
		});
	}
	
	
    function getCart() {
        $.ajax({
            type: 'POST',
            url: 'cart_fetch.php',
            dataType: 'json',
            success: function(response) {
                $('#cart_menu').php(response.list);
                $('.cart_count').php(response.count);
            }
        });
    }

</script>