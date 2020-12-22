$(document).ready(function() {
    shipping_cost();
});
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