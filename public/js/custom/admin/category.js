$(document).ready(function() {
	category_list();
	category_slug();
  $(document).ready(function() {
    $("#category_select").on('change', function() {
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
  });
});
function category_list() {
	$("#category").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
}
function category_slug() {
	$("input").attr('id', 'category_name').keyup(function(){
		var id = $(this).val();
		$("input").attr('id', 'category_slug').val(id);
		$("input").attr('id', 'category_slug_disabled').val(id);
    });
}