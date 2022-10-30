<script>
    getCart();

    $('#productForm').submit(function() {
        // e.preventDefault();
        // var product = $(this).serialize();
        var product = $('#hide').val();
        $.ajax({
            type: 'POST',
            url: 'cart_add.php',
            data: product,
            dataType: 'json',
            success: function(response) {

                $('#callout').show();
                $('.message').php(response.message);
                if (response.error) {
                    $('#callout').removeClass('callout-success').addClass('callout-danger');
                } else {
                    $('#callout').removeClass('callout-danger').addClass('callout-success');
                    getCart();
                }
            }
        });
        return false;
    });

    $(document).on('click', '.close', function() {
        $('#callout').hide();
    });

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