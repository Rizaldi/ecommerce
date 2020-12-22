$(document).ready(function() {
	detail_pengiriman();
	detail_payment();
	transaction_settlement();
	transaction_pending();
	transaction_expired();
	transaction_capture();
	view_transfer();
	transaction_status();
});
function detail_payment() {
	$(".list_payment").show();
	$("#detail_payment").click(function() {
		$(".list_payment").show();
	});
}
function transaction_settlement() {
	$("#transaction_settlement").DataTable({
  	});
}
function transaction_pending() {
	$("#transaction_pending").DataTable({
  	});
}
function transaction_expired() {
	$("#transaction_expired").DataTable({
  	});
}
function transaction_capture() {
	$("#transaction_capture").DataTable({
		"scrollX": true,
		"scrollY": true,
  	});
}
function detail_pengiriman() {
	$('.detail_pengiriman').on('click',function(){
	    var tracking_resi = $("#tracking_resi").text();
	    var tracking_jasa = $("#tracking_jasa").text();
	    // $('.modal-body').load(base_url+'detail_tracking',function(){
	    //     $('#detail_pengiriman').modal({show:true});
	    // });
	    $.ajax({
	    	url: base_url+'detail_tracking',
	    	type: 'POST',
	    	dataType: 'html',
	    	data: {tracking_resi: tracking_resi, tracking_jasa: tracking_jasa},
	    	beforeSend: function() {
	    		$(".loading_track").show();
	    	}
	    })
	    .done(function(data) {
	    	$('#detail_pengiriman').modal({show:true});
	    	$('.modal-body').html(data);
	    	$('.modal-header').html(tracking_resi);
	    })
	    .fail(function() {
	    	console.log("error");
	    })
	    .always(function() {
	    	console.log("complete");
	    });
	    
	});
}
function view_transfer() {
	$(document).on("click", ".view_transfer", function () {
         var trans = $(this).data('id');
         $.ajax({
             url: base_url+'transaction/transfer_img',
             type: 'POST',
             dataType: 'json',
             data: {trans: trans},
         })
         .done(function(data) {
            console.log(data.transfer_receipt);
            $("#img_transfer").html("<img width='200' src='"+base_url+"public/img/transfer_receipt/"+data.transfer_receipt+"'>");
            $("#trans_span").html("<input type='hidden' name='trans_val' id='trans_val' value='"+trans+"'>");
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });
         
    });
}
function transaction_status() {
	$(".transaction_status").on('change', function() {
		var status = $(this).val();
		var trans = $("#trans_val").val();
		$.ajax({
             url: base_url+'admin-jb-barang/list-transaction/update_status_transaction',
             type: 'POST',
             dataType: 'json',
             data: {trans: trans, status: status},
         })
         .done(function(data) {
         	if (data.success == 1) {
		        toastr.success('Data Success Updated', 'Data Info', {timeOut: 2000,preventDuplicates: true, positionClass:'toast-top-center'});
		        window.location.href = base_url+'admin-jb-brg/list-transaction';
		    }
            // console.log(data);
            // $("#img_transfer").html("<img width='200' src='"+base_url+"public/img/transfer_receipt/"+data.transfer_receipt+"'>");
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });
	});
}