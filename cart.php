<?php include 'includes/session.php'; ?>
<?php include('includes/header.php');?>
<main>
	<section class="header">
		<div class="container">
			<h4>سلة التسوق</h4>
			<ul>
				<li>
					<a href="index.php">الرئيسيه</a>
				</li>
				<li>
					<span>سلة التسوق</span>
				</li>
			</ul>
		</div>
	</section>
	<!--Start cart-pg -->
	<section class="cart-pg">
		<div class="container">
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
			<div class="row">
				<div class="col-md-4 m-auto">
					<div class="cart-summary">
						<div class="links row">
							<a href="products.php">استمرار التسوق</a>
							<a href="cart.php">تحديث السله</a>
						</div>
						</div>
					<?php
					if (isset($_SESSION['user'])) {
						echo "					
							<div id='paypal-button'></div>
							
					    	";

					} else {
						echo "
						<h4 class='text-center m-3'>You need to <a href='login.php'>Login</a>to checkout using paypal.</h4>
						";
					}
					?>
					
					
			</div>
		</div>
	</section>
</main>
<!--end main-->
<!--Scroll to top button-->
<a data-scroll href="#" class="scroll-top-btn" id="scroll-btn">
	<i class="fas fa-chevron-up"></i>
</a>
<?php include('includes/footer1.php');?>
<?php include 'includes/scripts.php'; ?>

<script>
	// ------------ increase products -----------
	$(".qt-plus").click(function() {
		$(this).parent().children(".qt").php(parseInt($(this).parent().children(".qt").php()) + 1);
	});

	$(".qt-minus").click(function() {

		child = $(this).parent().children(".qt");

		if (parseInt(child.php()) > 1) {
			child.php(parseInt(child.php()) - 1);
		}

		$(this).parent().children(".full-price").addClass("minused");

	});
</script>
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
<!-- Paypal Express -->
<script>
	paypal.Button.render({
		env: 'sandbox', // change for production if app is live,

		client: {
			sandbox: 'ASb1ZbVxG5ZFzCWLdYLi_d1-k5rmSjvBZhxP2etCxBKXaJHxPba13JJD_D3dTNriRbAv3Kp_72cgDvaZ',
			//production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
		},

		commit: true, // Show a 'Pay Now' button

		style: {
			color: 'silver',
			size: 'small',
			height: 40
		},

		payment: function(data, actions) {
			return actions.payment.create({
				payment: {
					transactions: [{
						//total purchase
						amount: {
							total: total,
							currency: 'USD'
						}
					}]
				}
			});
		},

		onAuthorize: function(data, actions) {
			return actions.payment.execute().then(function(payment) {
				window.location = 'sales.php?pay=' + payment.id;
			});
		},

	}, '#paypal-button');
</script>
</body>
</html>