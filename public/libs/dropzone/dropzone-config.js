$(document).ready(function () {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#mydropzone",{
        url: "{{route('vms.vehicle.uploadImage')}}",
        autoProcessQueue: false,
        uploadMultiple: true,
        addRemoveLinks:true,
        parallelUploads:10,
        params:{
        },
        successmultiple: function(data,response){
            $('#msgBoard').append(response.message).addClass("alert alert-success");
            $('#msgBoard').delay(2000).fadeOut();
            $('#fileslist').val(response.filesList);
            $('#myForm').off('submit').submit();
        }
    });
});