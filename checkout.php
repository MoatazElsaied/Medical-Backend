<?php include 'includes/session.php' ?>
<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['address'], $_POST['country'], $_POST['state'], $_POST['zipcode']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['zipcode'])) {
        $firstName = $_POST['first_name'];

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errorMsg[] = 'Please enter valid email address';
        } else {
            //validate_input is a custom function
            //you can find it in helpers.php file
            $firstName  = validate_input($_POST['first_name']);
            $lastName   = validate_input($_POST['last_name']);
            $email      = validate_input($_POST['email']);
            $address    = validate_input($_POST['address']);
            $address2   = (!empty($_POST['address']) ? validate_input($_POST['address']) : '');
            $country    = validate_input($_POST['country']);
            $state      = validate_input($_POST['state']);
            $zipcode    = validate_input($_POST['zipcode']);

            $sql = 'insert into order_details (first_name, last_name, email, address, address2, country, state, zipcode, order_status,created_at, updated_at) values (:fname, :lname, :email, :address, :address2, :country, :state, :zipcode, :order_status,:created_at, :updated_at)';
            $statement = $db->prepare($sql);
            $params = [
                'fname' => $firstName,
                'lname' => $lastName,
                'email' => $email,
                'address' => $address,
                'address2' => $address2,
                'country' => $country,
                'state' => $state,
                'zipcode' => $zipcode,
                'order_status' => 'confirmed',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $statement->execute($params);
            if ($statement->rowCount() == 1) {

                $getOrderID = $db->lastInsertId();

                if (isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items'])) {
                    $sqlDetails = 'insert into order_details (order_id, product_id, product_name, product_price, qty, total_price) values(:order_id,:product_id,:product_name,:product_price,:qty,:total_price)';
                    $orderDetailStmt = $db->prepare($sqlDetails);

                    $totalPrice = 0;
                    foreach ($_SESSION['cart_items'] as $item) {
                        $totalPrice += $item['total_price'];

                        $paramOrderDetails = [
                            'order_id' =>  $getOrderID,
                            'product_id' =>  $item['product_id'],
                            'product_name' =>  $item['product_name'],
                            'product_price' =>  $item['product_price'],
                            'qty' =>  $item['qty'],
                            'total_price' =>  $item['total_price']
                        ];

                        $orderDetailStmt->execute($paramOrderDetails);
                    }

                    $updateSql = 'update orders set total_price = :total where id = :id';

                    $rs = $db->prepare($updateSql);
                    $prepareUpdate = [
                        'total' => $totalPrice,
                        'id' => $getOrderID
                    ];

                    $rs->execute($prepareUpdate);

                    unset($_SESSION['cart_items']);
                    $_SESSION['confirm_order'] = true;
                    header('location:thank-you.php');
                    exit();
                }
            } else {
                $errorMsg[] = 'Unable to save your order. Please try again';
            }
        }
    } else {
        $errorMsg = [];

        if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
            $errorMsg[] = 'First name is required';
        } else {
            $fnameValue = $_POST['first_name'];
        }

        if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
            $errorMsg[] = 'Last name is required';
        } else {
            $lnameValue = $_POST['last_name'];
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errorMsg[] = 'Email is required';
        } else {
            $emailValue = $_POST['email'];
        }

        if (!isset($_POST['address']) || empty($_POST['address'])) {
            $errorMsg[] = 'Address is required';
        } else {
            $addressValue = $_POST['address'];
        }

        if (!isset($_POST['country']) || empty($_POST['country'])) {
            $errorMsg[] = 'Country is required';
        } else {
            $countryValue = $_POST['country'];
        }

        if (!isset($_POST['state']) || empty($_POST['state'])) {
            $errorMsg[] = 'State is required';
        } else {
            $stateValue = $_POST['state'];
        }

        if (!isset($_POST['zipcode']) || empty($_POST['zipcode'])) {
            $errorMsg[] = 'Zipcode is required';
        } else {
            $zipCodeValue = $_POST['zipcode'];
        }


        if (isset($_POST['address2']) || !empty($_POST['address2'])) {
            $address2Value = $_POST['address2'];
        }
    }
}

$pageTitle = 'Demo PHP Shopping cart checkout page with Validation';
$metaDesc = 'Demo PHP Shopping cart checkout page with Validation';

?>



<?php include('includes/header.php'); ?>

<!--start main-->
<main>
    <!--Start chechout-pg-->
    <section class="chechout-pg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 m-auto">
                    <div class="payments-inner">
                        <div class="payments-header">
                            <div class="text text-center">
                                <h5> اتمام عملية الدفع</h5>
                            </div>
                        </div>
                        <div class="payments-body">
                            <form id="regForm" class="pay-form">

                                <!-- One "tab" for each step in the form: -->
                                <!-- Personal info tab -->
                                <div class="tab">
                                    <div class="sec-heading">
                                        <h4> البيانات الشخصيه</h4>
                                        <?php
                                        if (isset($errorMsg) && count($errorMsg) > 0) {
                                            foreach ($errorMsg as $error) {
                                                echo '<div class="alert alert-danger">' . $error . '</div>';
                                            }
                                        }
                                        ?>

                                    </div>
                                    <form class="needs-validation" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>الاسم الاول</label>
                                                    <input placeholder=" الاول" class="form-control" name="first_name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>الاسم الآخير</label>
                                                    <input placeholder=" الاخير" class="form-control" name="last_name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue : '' ?>">
                                                </div>
                                            </div>
                                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>البريد الالكتروني</label>
                                                    <input placeholder="name@example.com" name="email" class="form-control" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue : '' ?>">
                                                </div>
                                            </div>
                                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>رقم الهاتف</label>
                                                    <input placeholder="+201014410480" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <!-- Location tab -->
                                <div class="tab">
                                    <div class="sec-heading">
                                        <h4> البيانات الشخصيه</h4>
                                        <?php
                                        if (isset($errorMsg) && count($errorMsg) > 0) {
                                            foreach ($errorMsg as $error) {
                                                echo '<div class="alert alert-danger">' . $error . '</div>';
                                            }
                                        }
                                        ?>

                                    </div>
                                    <form class="needs-validation" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"> الدوله</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>مصر</option>
                                                        <option>المانيا</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"> المحافظه</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>القاهره</option>
                                                        <option>الدقهليه</option>
                                                        <option>الاسكندريه</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1"> المدينه</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>القاهره الجديده</option>
                                                        <option>المنصوره</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label> العنوان</label>
                                                    <input placeholder=" اسم المنطقه , الشارع , رقم المنزل ..." name="address" class="form-control" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue : '' ?>">
                                                </div>
                                            </div>
                                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label> عنوان آخر</label>
                                                    <input placeholder=" العنوان الآخر (اختياري)" name="address2" class="form-control" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value : '' ?>">
                                                </div>
                                            </div>
                                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label> الرقم البريدي</label>
                                                    <input placeholder="1234" class="form-control" name="zipcode" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue : '' ?>">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <!-- Order details tab -->

                                <div class="tab">
                                    <div class="sec-heading">
                                        <h4> تفاصيل الطلب</h4>
                                    </div>
                                    <div class="item">
                                        <div class="content">
                                            <img src="assets/images/product_2.png" alt="">
                                            <div class="text">
                                                <h6>Amazon Card </h6>
                                                <p>250.00 EGP</p>
                                                <span>1 قطعه</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="content">
                                            <img src="assets/images/product_1.png" alt="">
                                            <div class="text">
                                                <h6>Amazon Card </h6>
                                                <p>250.00 EGP</p>
                                                <span>1 قطعه</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <h6>المجموع: <span>500.00 EGP</span></h6>
                                        <h6>الشحن: <span>25.00 EGP</span></h6>
                                        <h6>الاجمالي: <span class="active">525.00 EGP</span></h6>
                                    </div>
                                </div>

                                <!-- pay method tab -->
                                <div class="tab">
                                    <div class="sec-heading">
                                        <h4> طريقة الدفع</h4>
                                    </div>
                                    <div class="pay">
                                        <div class="row pay-method mt-3">
                                            <div class="col-lg-3 col-md-6 ">
                                                <label>
                                                    <input type="radio" name="visa" value="visa" class="card-input-element" />
                                                    <div class="panel panel-default card-input">
                                                        <img src="assets/images/pay/visa.png">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-lg-3 col-md-6 ">
                                                <label>
                                                    <input type="radio" name="payment" value="payment" class="card-input-element" />
                                                    <div class="panel panel-default card-input">
                                                        <img src="assets/images/pay/master.png">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-lg-3 col-md-6 ">
                                                <label>
                                                    <input type="radio" name="paypal" value="paypal" class="card-input-element" />
                                                    <div class="panel panel-default card-input">
                                                        <img src="assets/images/pay/paypal.png">
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-lg-3 col-md-6 ">
                                                <label>
                                                    <input type="radio" name="handcheck" value="handcheck" class="card-input-element" />
                                                    <div class="panel panel-default card-input">
                                                        <img class="handcheck" src="assets/images/pay/handshake.svg">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="buttons-container">
                                            <button class="mr-1 ml-1" type="submit" name="submit" value="submit">الدفع</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons-container">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">السابق</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">التالي</button>
                                </div>
                                <!-- Progress circles -->
                                <div class="row w-100">
                                    <div class="col-12">
                                        <!-- Circles which indicates the steps of the form: -->
                                        <div class="circles">
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--end main-->
<?php include('includes/footer.php'); ?>

<script>
    /****************** Checkout form page /*******************/

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
        } else {
            document.getElementById("nextBtn").display = "التالي";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
</body>

</html>