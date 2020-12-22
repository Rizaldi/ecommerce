$(document).ready(function() {
	check_guest();
	order_payment();
	shipping_cost();
	login_checkout();
	next_button();
});
function choose_bank(bank) {
	$(".loading").show();
	if (bank == 'bank_bca') {
		$("#bank_bca").show(1000);
		$("#choose_payment").hide();
		$(".loading").hide();
	}else if(bank == 'bank_mandiri'){
		$("#bank_mandiri").show(1000);
		$("#choose_payment").hide();
	}else if(bank == 'bank_bri'){
		$("#bank_bri").show(1000);
		$("#choose_payment").hide();
	}else if(bank == 'bank_bni'){
		$("#bank_bni").show(1000);
		$("#choose_payment").hide();
	}
}
function check_guest() {
	$("#login_checkout").show();
	$("input[name='check_guest']").change(function(){
	    if ($(this).val() == 'user') {
	    	$("#login_checkout").show();
	    	$("#btn-buyer").hide();
	    }else{
	    	$("#login_checkout").hide();
	    	$("#btn-buyer").show();
	    }
	});
}
function resizeIframe(obj) {
	obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}
function order_payment() {
	// $('#modal-payment').modal({show:true, keyboard: false, backdrop: 'static'});
	$("#order-payment").click(function(event) {
		event.preventDefault();
		// $(this).attr("disabled", "disabled");
		console.log("clicked");
		$('#modal-payment').on('show', function () {

	        // $('iframe').attr("src",frameSrc);
	      
		});
	    $('#modal-payment').modal({show:true, keyboard: false, backdrop: 'static'});
		// 	$.ajax({
		// 		url: base_url+'checkout/token',
		// 		type: "POST",
		// 		data:{username:$("#username").val(), surname:$("#surname").val(), email:$("#email").val(), phone:$("#phone").val() ,url_redirect:window.location.href},
		// 		cache: false,
		// 		success: function(data) {
		//         var resultType = document.getElementById('result-type');
		//         var resultData = document.getElementById('result-data');
		//         function changeResult(type,data){
		//         	$("#result-type").val(type);
		//         	$("#result-data").val(JSON.stringify(data));
		//       }
		//       snap.pay(data, {

		//       	onSuccess: function(result){
		//       		changeResult('success', result);
		//       		console.log(result.status_message);
		//       		console.log(result);
		//       		$("#payment-form").submit();
		//       	},
		//       	onPending: function(result){
		//       		changeResult('pending', result);
		//       		console.log(result.status_message);
		//       		$("#payment-form").submit();
		//       	},
		//       	onError: function(result){
		//       		changeResult('error', result);
		//       		console.log(result.status_message);
		//       		$("#payment-form").submit();
		//       	}
		//       });
		//   }
		// });
	});
	$("#midtrans-payment").click(function(event) {
		event.preventDefault();
		// $(this).attr("disabled", "disabled");
		console.log("clicked");
			$.ajax({
				url: base_url+'checkout/token',
				type: "POST",
				data:{username:$("#username").val(), surname:$("#surname").val(), email:$("#email").val(), phone:$("#phone").val() ,url_redirect:window.location.href},
				cache: false,
				success: function(data) {
		        var resultType = document.getElementById('result-type');
		        var resultData = document.getElementById('result-data');
		        function changeResult(type,data){
		        	$("#result-type").val(type);
		        	$("#result-data").val(JSON.stringify(data));
		      }
		      snap.pay(data, {

		      	onSuccess: function(result){
		      		changeResult('success', result);
		      		console.log(result.status_message);
		      		console.log(result);
		      		$("#payment-form").submit();
		      	},
		      	onPending: function(result){
		      		changeResult('pending', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	},
		      	onError: function(result){
		      		changeResult('error', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	}
		      });
		  }
		});
	});
}
function shipping_cost() {
	$('#province').select2({
        width: '100%',
        placeholder: 'Pilih Provinsi',
        ajax: {
            url: base_url+"province",
            method: 'POST',
            dataType: 'json',
            data: function (params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj) {
                        return {id: obj.province_id, text: obj.province}
                    })
                }
            },
            cache: true
        }
    });
    if ($("input[name='city']").val() == null) {
	    $('#city').select2({
	        width: '100%',
	        placeholder: 'Pilih Kota',
	        ajax: {
	            url: base_url+"city",
	            method: 'POST',
	            dataType: 'json',
	            data: function (params) {
	                return {
	                    province_id: $('#province').val(),
	                    term: params.term
	                }
	            },
	            processResults: function (data) {
	                return {
	                    results: $.map(data, function (obj) {
	                        return {id: obj.city_id, text: obj.city_name}
	                    })
	                }
	            },
	            cache: true
	        }
	    });
    }
    $('#shipping_select').select2({
        width: '100%',
        allowClear: true,
        placeholder: 'Pilih Pengiriman',
        ajax: {
            url: base_url+"shipping",
            method: 'POST',
            delay: 800,
            dataType: 'json',
            data: function (params) {
                return {
                    city_id: $('#city').val(),
                    term: params.term
                }
            },
            processResults: function (data) {
            	var arr = [];
            	var obj = {};
            	$.each(data, function(index, el) {
            		var	arr_costs = el.costs;
            		$.each(arr_costs, function(index2, el2) {
            			arr_costs[index2] = {service: el2.service, description: el2.description, code: el.code, name:el.name, cost: el2.cost[0].value, estimate: el2.cost[0].etd};
            		});
            		$.merge(arr, arr_costs);
            		// arr.push({code: el.code, name:el.name});
            		// $.each(el.costs, function(index2, el2) {
            		// 	var value_cost = {cost: el2.cost[0].value, estimate: el2.cost[0].etd}
            		// 	// console.log(value_cost);
            		// 	arr_costs.push(value_cost);
            		// });
            	});
            	// console.log(arr);
            	return {
                    results: $.map(arr, function (obj) {
                        return {id: '{"shipping":"'+obj.code.toUpperCase()+'",'+'"shipping_type":"'+obj.service+'","cost":"'+obj.cost+'"}', text: obj.code.toUpperCase()+' '+obj.service+ ' ( ' + obj.estimate + ' HARI ) - Rp '+addCommas(obj.cost)}
                    })
                }
            },
            cache: false
        }
    }).on('select2:select', function (e) {
    	var data = e.params.data;
    	$.ajax({
    		url: 'checkout/shipping_total',
    		type: 'POST',
    		dataType: 'json',
    		data: {data_shipping_id: data.id , data_shipping_text: data.text},
    	})
    	.done(function(data) {
    		$("#shipping_cost").number(data.shipping_cost);
    		$("#total_product_checkout").number(data.total_product_checkout);
    		$("#bank_amount").number(data.total_product_checkout);

			$(".rp_total").show();
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    });
}
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function login_checkout() {
	$("#login_checkout").submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: base_url+'login/checkout',
			type: 'POST',
			dataType: 'json',
			data: {email: $('input[name=email]').val(), password: $('input[name=password]').val()},
		})
		.done(function(data) {
			if (data.code == 200) {
				window.location.href = base_url+'checkout';
			}else{
				if (data.code == 403) {
					console.log("Failed Login");
				}
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
}
function next_button() {
	$("input").prop('required',true);
	$("#btn-buyer").on('click', function(event) {
		// $(this).hide('slow/400/fast', function() {
			
		// });
		$("#shippinginfo").addClass('show',5000);
		$('html, body').animate({ scrollTop: $("#headingThree").offset().top }, 500);
	});

	$("#btn-shipping-information").on('click', function(event) {
		if ($("#address").val() == null || $("#address").val() == '') {			
			$("#address").prop('required',true);
			console.log("kosong");
		}else{
			$.ajax({
				url: base_url+'checkout/update_address',
				type: 'POST',
				dataType: 'json',
				data: {address1: $("#address").val(), province: 0, city: 0},
			})
			.done(function(data) {
				console.log(data);
				$("#order-review").addClass('show',5000);
				$('html, body').animate({ scrollTop: $("#headingFour").offset().top }, 500);
			})
			.fail(function(xhr, ajaxOptions, thrownError){
                    $("#order-review").addClass('show',5000);
				$('html, body').animate({ scrollTop: $("#headingFour").offset().top }, 500);
            })
			.always(function() {
				console.log("complete");
			});
			
			$.ajax({
	    		url: 'checkout/shipping_total',
	    		type: 'POST',
	    		dataType: 'json',
	    		data: {data_shipping_id: 0 , data_shipping_text: 'tes'},
	    	})
	    	.done(function(data) {
	    	})
	    	.fail(function() {
	    		console.log("error");
	    	})
	    	.always(function() {
	    		console.log("complete");
	    	});
		}
		// console.log($("#address").val());
	});

	$("#btn-shipping-method").on('click', function(event) {
		$("#order-review").addClass('show',5000);
		$('html, body').animate({ scrollTop: $("#headingSix").offset().top }, 500);
	});
}