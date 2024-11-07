$(document).ready(function () {


}); //end of document ready

$(document).on('click', '#delivery_city_update_btn', function (event) {
    event.preventDefault();
    var formData = new FormData(delivery_ciry_form);
    $.ajax({
        method: 'POST',
        url: 'insert_selected_cities',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            var details = data.data;
            console.log(details);
        } else {
            showFailedAlert("You have entered an invalid reference number. Please check and re-enter");
        }
    });
});

function showFailedAlert(message) {
    $(".form-alertbox").html(message);
    $(".form-alertbox").addClass("alert-dismissible");
    $(".form-alertbox").removeClass('alert-success alert-warning alert-info').addClass('alert-danger');
    $(".form-alertbox").show();
    setTimeout(function () {
        $(".form-alertbox").slideUp();
    }, 3000);
}

