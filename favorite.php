<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<main>
	<section class="header">
		<div class="container">
			<h4>المفضله</h4>
			<ul>
				<li>
					<a href="index.php">الرئيسيه</a>
				</li>
				<li>
					<span>المفضله</span>
				</li>
			</ul>
		</div>
	</section>
	<!--Start cart-pg -->
	<section class="favorite-pg">
		<div class="container">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">المنتج</th>
							<th class="text-center"> الصورة</th>
							<th class="text-center">السعر</th>
							<th class="text-center">مسح</th>
						</tr>
					</thead>
					<tbody id="tbody">
					</tbody>
				</table>
			</div>
		</div>
	</section>
</main>


<!-- scroll top button -->
<?php include 'includes/footer1.php'; ?>
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
        $(document).on('click', '.favorite_delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'favorite_delete.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (!response.error) {
                        getDetails();
                        getfav();
                    }
                }
            });
        });

        getDetails();
      

    });

    function getDetails() {
        $.ajax({
            type: 'POST',
            url: 'favorite_details.php',
            dataType: 'json',
            success: function(response) {
                $('#tbody').html(response);
                getfav();
            }
        });
    }

   
</script>

</body>

</html>