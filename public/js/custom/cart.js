$(document).ready(function() {
	add_to_cart();
});
function add_to_cart() {
	$(".add_to_cart").on('click', function(event) {
		var list_cart = "";
		var count_cart = parseInt($(".counter_cart").text()) + parseInt(1);

		var img_product = $(".img_product").attr('src');
		var title_product = $(".title_product").text();
		var price_product = $(".price_product").text();

		list_cart += '<li class="single-cart-item clearfix mb-10 list_cart"> <span class="cart-img"> <a href="shop.html"><img src="'+img_product+'" alt="" width="48" height="57"></a> </span> <span class="cart-info"> <a href="product-details.html">'+title_product+'</a> <span>'+price_product+'</span> <a class="trash" href="#"><i class="fa fa-trash"></i></a> </span> </li>';

		$(".ul_cart").append(list_cart);
		$(".counter_cart").text(count_cart);

		console.log(img_product);
		console.log(title_product);
		console.log(price_product);
	});
	$("#buy_now").on('click', function(event) {
		event.preventDefault();
		var title_product = $("#title_product").text(),
		desc_product  = $("#desc_product").text(),
		price_product = $("#price_product").text(),
		front_image = $("#front_image").text(),
		qty			  = $("#qty_product").val();
		product_id	  = $("#product_id").val();

		$.ajax({
			url: base_url+'cart/add_to_cart',
			type: 'POST',
			dataType: 'html',
			data: {product_id : product_id, title_product: title_product, desc_product : desc_product, price_product : price_product, qty : qty, front_image : front_image, afl : afl},
		})
		.done(function() {
			window.location.href = base_url+'cart';
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
}
var update_cart = function() {
	var sumtotal;
	var sum = 0;
	$(".cart_item").each(function() {
		var price = $(this).data('price');

		var quantity = $('.quantity_cart', this).val();
		var subtotal = price*quantity;

		subtotal = subtotal.toFixed(2); 
		$(".rp_total").show();
		$('.product_total_n', this).html(subtotal);
		$('.product_total', this).number(subtotal);
	});
	$('.product_total_n').each(function() {
		sum += Number($(this).html());
	});
	$(".rp_total").show();
	$('.total_all').number(sum);
}
$(".cart_item .quantity_cart").on('keyup', function() {
	$(this).parents('tr').attr('data-qty', $(this).val());
	update_cart();
	var product_id = $(this).parents('tr').data('id');
	var qty = $(this).parents('tr').attr('data-qty');
	$.ajax({
		url: base_url+'cart/update_cart',
		type: 'POST',
		dataType: 'json',
		data: {product_id : product_id, qty : qty},
	})
	.done(function() {
		toastr.success('Cart Success Updated.', 'Cart updated');
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});	
});