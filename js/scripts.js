	
	  getCart();
	  getfav();
	$(document).on('submit', '#productForm', function(e){

  	e.preventDefault();
	if($('#add').click==true){alert('welcome');}
    var product = $(this).serialize();
	//console.log(product);
  
	  
	
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){

  		$('#callout').show();
		 
  		$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
				getCart();
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
	getCart();
  		return false;
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });
  function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			console.log(response.list);
			$('.cart_count').html(response.count);
		}
	});
}





 

  
  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });
  function getfav(){
	$.ajax({
		type: 'POST',
		url: 'favorite_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#favorite_menu').html(response.list);
			console.log(response.list);
			$('.favorite_count').html(response.count);
		}
	});
}


function moataz(product){

var product = parseInt(product);

	 console.log(product);
  
	  
	
  	$.ajax({
  		type: 'POST',
  		url: 'favorite_add.php',
		data: {id:product},
  		dataType: 'json',
  		success: function(response){

  		$('#callout').show();
		 
  		$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getfav();
  			}
  		}
  	});
  		return false;
}

	
	