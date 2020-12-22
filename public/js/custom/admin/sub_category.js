$(document).ready(function() {
	sub_category_list();
	sub_category_slug();
});
function sub_category_list() {
	$("#sub_category").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
}
function sub_category_slug() {
	$("input").attr('id', 'sub_category_name').keyup(function(){
		var id = $(this).val();
		$("input").attr('id', 'sub_category_slug').val(id);	
		$("input").attr('id', 'sub_category_slug_disabled').val(id);	
    });
}