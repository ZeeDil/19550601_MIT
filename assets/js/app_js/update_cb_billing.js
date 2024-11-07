$(document).ready(function () {

    load_cb_data();

    /*$('#update_order_btn').hide();
    $('#product_name_hidden').hide();
    $(".three_doller_section").hide();
    $(".eight_doller_section").hide();
*/

}); //end of document ready

function load_cb_data(){
    $("form .form-control").val('');
    //reset_field();
    // $('#save_category_btn').hide();
    // $('#update_category_btn').show();
    var order_id = "001";

    var param = {};
    param.order_id = order_id;
    $.post('get_cb_billling_values', param, function(response) {
        if (response !== null) {
           var cb_count = response.count;

            for (i = 0; i < cb_count; i++) {


            }





            console.log(cb_count);
            if (response.status == "1") {

                $("#hidden_merchant_order_id").val(response.data[0].id);
                $("#product_id").val(response.data[0].product_id);
                $("#order_ref_no").val(response.data[0].order_ref_no);
                $("#hidden_order_ref_no").val(response.data[0].order_ref_no);
                $("#platform").val(response.data[0].platform);
                $("#order_qty").val(response.data[0].order_qty);
                $("#product_name_hidden").val(response.data[0].product_name);

            } else {
                showFailedAlert("Could not load data.");
            }

        } else {
            showFailedAlert("Could not load data.");
        }
    }, 'json');
}


$('#create_order_btn').on('click', function(){
    event.preventDefault();
    var formData = new FormData(form_create_direct_merchant_order);
    $.ajax({
        method: 'POST',
        url: 'create_direct_merchant_order',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert("Order created successfully.");
            document.getElementById("form_create_direct_merchant_order").reset();
            $('.direct_shipping_ko').hide();
            $('#merchant_table').DataTable().ajax.reload();
            $(".three_doller_section").hide();
            $(".eight_doller_section").hide();
        } else if (data.status == '2'){
            var message = data.msg;
            console.log(message);
            showFailedAlert(message);
        }
    });

});





function load_ref_no_byID(order_id){
    $("form .form-control").val('');
    reset_field();
    // $('#save_category_btn').hide();
    // $('#update_category_btn').show();

    var param = {};
    param.order_id = order_id;
    $.post('get_merchant_order_details_by_ID', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                console.log(response);
                 $("#hidden_merchant_order_id").val(response.data[0].id);
                 $("#product_id").val(response.data[0].product_id);
                 $("#order_ref_no").val(response.data[0].order_ref_no);
                 $("#hidden_order_ref_no").val(response.data[0].order_ref_no);
                 $("#platform").val(response.data[0].platform);
                 $("#order_qty").val(response.data[0].order_qty);
                 $("#product_name_hidden").val(response.data[0].product_name);

            } else {
                showFailedAlert("Could not load data.");
            }

        } else {
            showFailedAlert("Could not load data.");
        }
    }, 'json');
}

$(document).on('click', '#update_order_btn', function (event) {
    event.preventDefault();
    var formData = new FormData(form_create_direct_merchant_order);
    $.ajax({
        method: 'POST',
        url: 'update_order_info_by_id',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert("Information updated successfully.");
            document.getElementById("form_create_direct_merchant_order").reset();
            $('#cat_data_tab').DataTable().ajax.reload();
            $("#order_ref_no").prop('disabled', false);
            $("#platform").prop('disabled', false);
            $("#order_qty").prop('disabled', false);
            $('#product_name').next(".select2-container").show();
            $('.available_qty_section').show();
            $('#create_order_btn').show();
            $('#update_order_btn').hide();
            $('#product_name_hidden').hide();
            $('#direct_shipping_ko').hide();
            $('#merchant_table').DataTable().ajax.reload();
            $(".three_doller_section").hide();
            $(".eight_doller_section").hide();
             reset_field();
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

function reset_field(){
    document.getElementById("form_create_direct_merchant_order").reset();
}

$(document).on('click', '#cancel_btn', function (event) {
    $("#order_ref_no").prop('disabled', false);
    $("#platform").prop('disabled', false);
    $("#order_qty").prop('disabled', false);
    $('#product_name').next(".select2-container").show();
    $('.available_qty_section').show();
    $('#create_order_btn').show();
    $('#update_order_btn').hide();
    $('#product_name_hidden').hide();
    $('#direct_shipping_ko').hide();
    $(".three_doller_section").hide();
    $(".eight_doller_section").hide();
    $('.direct_shipping_ko').hide();
    var check_val = 0;
    load_data_table(check_val);
    reset_field();
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

$('#domastic_custom_doller').on('click', function(){
    //document.getElementById('international_custom_doller_val').removeAttribute('readonly');
    document.getElementById('domastic_custom_doller_val').readOnly = false;
    $("#domastic_custom_doller_val").focus();
    $('#domastic_custom_doller_val').val('');
});

$('#3_doller').on('click', function(){
    //document.getElementById('international_custom_doller_val').removeAttribute('readonly');
    document.getElementById('domastic_custom_doller_val').readOnly = true;
    $('#domastic_custom_doller_val').val('3');
});

$('#ko_international_charge').on('click', function(){
    //document.getElementById('international_custom_doller_val').removeAttribute('readonly');
    document.getElementById('international_custom_doller_val').readOnly = false;
    $("#international_custom_doller_val").focus();
    $('#international_custom_doller_val').val('');
});

$('#8_doller').on('click', function(){
    //document.getElementById('international_custom_doller_val').removeAttribute('readonly');
    document.getElementById('international_custom_doller_val').readOnly = true;
    $('#international_custom_doller_val').val('8');
});

$('#ko_charge').on('change', function(){
    var val = $("#ko_charge").val();
    if(val == "domestic") {
       $(".eight_doller_section").hide();
       $(".three_doller_section").show();
    }
    else if(val == "international"){
        $(".three_doller_section").hide();
        $(".eight_doller_section").show();
    }
});








