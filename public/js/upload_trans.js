Formstone.Ready(function() {
    $(".upload").upload({
        maxSize: 1073741824,
        beforeSend: onBeforeSend
    }).on("start.upload", onStart)
    .on("complete.upload", onComplete)
    .on("filestart.upload", onFileStart)
    .on("fileprogress.upload", onFileProgress)
    .on("filecomplete.upload", onFileComplete)
    .on("fileerror.upload", onFileError)
    .on("chunkstart.upload", onChunkStart)
    .on("chunkprogress.upload", onChunkProgress)
    .on("chunkcomplete.upload", onChunkComplete)
    .on("chunkerror.upload", onChunkError)
    .on("queued.upload", onQueued);

    $(".filelist.queue").on("click", ".cancel", onCancel);
    $(".cancel_all").on("click", onCancelAll);
});

function onCancel(e) {
    console.log("Cancel");
    var index = $(this).parents("li").data("index");
    $(this).parents("form").find(".upload").upload("abort", parseInt(index, 10));
}

function onCancelAll(e) {
    console.log("Cancel All");
    $(this).parents("form").find(".upload").upload("abort");
}

function onBeforeSend(formData, file) {
    console.log("Before Send");
    formData.append("transaction", $(".trans").val());
                        // return (file.name.indexOf(".jpg") < -1) ? false : formData; // cancel all jpgs
    return formData;
}

function onQueued(e, files) {
    console.log("Queued");
    var html = '';
    for (var i = 0; i < files.length; i++) {
        html += '<li data-index="' + files[i].index + '"><span class="content"><span class="file">' + files[i].name + '</span><span class="cancel">Cancel</span><span class="progress">Queued</span></span><span class="bar"></span></li>';
    }

    $(this).parents("form").find(".filelist.queue")
    .append(html);
}

function onStart(e, files) {
    console.log("Start");
    $(this).parents("form").find(".filelist.queue")
    .find("li")
    .find(".progress").text("Waiting");
}

function onComplete(e) {
}

function onFileStart(e, file) {
    console.log("File Start");
    $(this).parents("form").find(".filelist.queue")
    .find("li[data-index=" + file.index + "]")
    .find(".progress").text("0%");
}

function onFileProgress(e, file, percent) {
    console.log("File Progress");
    var $file = $(this).parents("form").find(".filelist.queue").find("li[data-index=" + file.index + "]");

    $file.find(".progress").text(percent + "%")
    $file.find(".bar").css("width", percent + "%");
}

function onFileComplete(e, file, response) {
    var json = JSON.parse(response);

    if (json.success == 1) {
        toastr.success('file '+file.name+' Uploaded.', 'File Uploaded', {timeOut: 2000,preventDuplicates: true, positionClass:'toast-top-center'});
        window.location.href = base_url+'transaction/list';
    }
    if (response.trim() === "" || response.toLowerCase().indexOf("error") > -1) {
        $(this).parents("form").find(".filelist.queue")
        .find("li[data-index=" + file.index + "]").addClass("error")
        .find(".progress").text(response.trim());
    } else {
        var $target = $(this).parents("form").find(".filelist.queue").find("li[data-index=" + file.index + "]");
        $target.find(".file").text(file.name);
        $target.find(".progress").remove();
        $target.find(".cancel").remove();
        $target.appendTo($(this).parents("form").find(".filelist.complete"));
    }
}

function onFileError(e, file, error) {
    console.log("File Error");
    $(this).parents("form").find(".filelist.queue")
    .find("li[data-index=" + file.index + "]").addClass("error")
    .find(".progress").text("Error: " + error);
}

function onChunkStart(e, file) {
    console.log("Chunk Start");
}

function onChunkProgress(e, file, percent) {
    console.log("Chunk Progress");
}

function onChunkComplete(e, file, response) {
    console.log("Chunk Complete");
}

function onChunkError(e, file, error) {
    console.log("Chunk Error");
}
$(document).ready(function() {
    $(document).on("click", ".open_transaction", function () {
         var trans = $(this).data('id');
         $(".modal-body .trans").val( trans );
    });
    $(document).on("click", ".view_transfer", function () {
         var trans = $(this).data('id');
         $.ajax({
             url: base_url+'transaction/transfer_img',
             type: 'POST',
             dataType: 'json',
             data: {trans: trans},
         })
         .done(function(data) {
            // console.log(data);
            $("#img_transfer").html("<img src='"+base_url+"public/img/transfer_receipt/"+data.transfer_receipt+"'>");
         })
         .fail(function() {
             console.log("error");
         })
         .always(function() {
             console.log("complete");
         });
         
    });
});