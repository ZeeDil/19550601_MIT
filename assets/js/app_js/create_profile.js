$(document).ready(function () {

}); //end of document ready

$('#create_profile_btn').on('click', function(){
    event.preventDefault();
    var formData = new FormData(form_create_profile);
    // var base_url = window.location.origin;
    $.ajax({
        method: 'POST',
        url: 'create_job_provider_profile',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert(data.msg)
            reset_field();
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });

});


function showSuccessAlert(message) {
    $(".form-alertbox").html(message);
    $(".form-alertbox").addClass("alert-dismissible");
    $(".form-alertbox").removeClass('alert-warning alert-danger alert-info').addClass('alert-success');
    $(".form-alertbox").show();
    setTimeout(function () {
        $(".form-alertbox").slideUp();
    }, 3000);
}

function showFailedAlert(message) {
    $(".form-alertbox").html(message);
    $(".form-alertbox").addClass("alert-dismissible");
    $(".form-alertbox").removeClass('alert-success alert-warning alert-info').addClass('alert-danger');
    $(".form-alertbox").show();
    setTimeout(function () {
        $(".form-alertbox").slideUp();
    }, 3000);
}



function reset_field(){
    document.getElementById("form_create_profile").reset();
}









