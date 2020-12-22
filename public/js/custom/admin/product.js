$(document).ready(function() {
	product_list();
	product_slug();
  category_select();
  desc_froala();
  price();
  other_image();
});
function product_list() {
	$("#products").DataTable({
    "scrollX": true
  });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
}
function product_slug() {
	$('#title').keyup(function(){
		var id = $(this).val();
		$('#title_slug').val(id);	
		$('#title_slug_disabled').val(id);	
    });
}
function category_select() {
  $(".category_select").on('change', function() {
    var category_id = $(this).val();
    $.ajax({
      url: base_url+'category_select',
      type: 'POST',
      dataType: 'json',
      data: {category_id: category_id},
    })
    .done(function(data) {
      var sub_category = "";
      $.each(data, function(index, val) {
        sub_category += "<option value='"+val.sub_category_id+"'>"+val.sub_category_name+"</option>";
      });
      $(".sub_category_select").html(sub_category);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
}
function desc_froala() {
  $('#desc_froala').froalaEditor({
      imageStyles: {
        class1: 'Class 1',
        class2: 'Class 2' 
      }
    })
}
function price() {
  $('#sale_price').number( true );
  $('#purchase_price').number( true );
}
function other_image() {
    $("#other_image").on('click', function() {
      $(".subm").remove();
      $(".add-image").append('<div class="col-md-6"> <div class="form-group"> <label>Image Product</label> <input type="file" id="img_product" name="img_product[]" class="form-control"> </div> </div><div class="col-md-12 subm"> <div class="form-group"> <button type="submit" class="btn btn-primary float-right">Submit  <i class="fa fa-angle-double-right"></i></button> </div> </div>');
    });
}