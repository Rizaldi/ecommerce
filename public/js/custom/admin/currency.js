$(document).ready(function() {
    $("td[contenteditable=true]").blur(function(){
        var curr_id = $(this).attr("id");
        var value = $(this).text();

        $.post(base_url+'admin-jb-brg/currency/update' , curr_id + "=" + value, function(data){
            if(data != '')
            {
                toastr.success('Data Success Updated', 'Data Info', {timeOut: 2000,preventDuplicates: true, positionClass:'toast-top-center'});
                window.location.href = base_url+'admin-jb-brg/currency';
            }
        });
    });    
});