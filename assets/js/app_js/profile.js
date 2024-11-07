
$('#create_basic_profile_button').on('click',function(){
    event.preventDefault();
    var formData = new FormData(basic_profile_form);
    $.ajax({
        method: 'POST',
        url: 'save_basic_profile',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            var success_message = data.msg;
            var profile_id = data.profile_id;

            $('#hidden_profile_id').val(profile_id);

            showSuccessAlert(success_message);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

$('#save_ols').on('click',function(){
    event.preventDefault();
    var formData = new FormData(ol_profile_form);
    $.ajax({
        method: 'POST',
        url: 'save_profile_ols',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            var success_message = data.msg;
            showSuccessAlert(success_message);
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

$('#save_als').on('click',function(){
    event.preventDefault();
    var formData = new FormData(al_form);
    $.ajax({
        method: 'POST',
        url: 'save_profile_Als',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_field();
            var success_message = data.msg;
            showSuccessAlert(success_message);
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

function reset_field(){
    document.getElementById("al_form").reset();
}


$('#save_hnd').on('click',function(){
    event.preventDefault();
    var formData = new FormData(hnd_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_hnd',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_hnd_table();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
            reset_hnd_table();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

function reset_hnd_table(){
    $("#hnd_table tbody").html('');
    $('#hnd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='hnd_name[]' id='hnd_name" + i + "'  value='' type='text' placeholder='HND Name'  class='form-control input-md hnd_name'></td><td><input  name='hnd_institute[]' id='hnd_institute" + i + "'  value='' type='text' placeholder='HND Instutute'  class='form-control input-md hnd_institute'></td></tr>");

}


$('#save_bachelers').on('click',function(){
    event.preventDefault();
    var formData = new FormData(bachler_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_bachelor',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_bachler();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
           reset_bachler();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

function reset_bachler(){
    $("#bachelors_table tbody").html('');
    $('#bachelors_table').append("<tr id='addr" + (j + 1) + "' class='rowval'><td><input  name='degree_name[]' id='degree_name" + j + "'  value='' type='text' placeholder='Degree Name'  class='form-control input-md degree_name'></td><td><input  name='degree_institute[]' id='degree_institute" + j + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

}


$('#save_masters').on('click',function(){

    event.preventDefault();
    var formData = new FormData(masters_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_master',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_master();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
            reset_master();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});


function reset_master(){
    $("#masters_table tbody").html('');
    $('#masters_table').append("<tr id='addr" + (k + 1) + "' class='rowval'><td><input  name='masters_name[]' id='masters_name" + k + "'  value='' type='text' placeholder='Masters Title'  class='form-control input-md degree_name'></td><td><input  name='masters_degree_institute[]' id='masters_degree_institute" + k + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

}

$('#save_phd').on('click',function(){
    event.preventDefault();
    var formData = new FormData(phd_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_phd',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_phd();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
            reset_phd();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});


function reset_phd(){
    $("#phd_table tbody").html('');
    $('#phd_table').append("<tr id='addr" + (n + 1) + "' class='rowval'><td><input  name='phd_name[]' id='phd_name" + n + "'  value='' type='text' placeholder='Qualification Title'  class='form-control input-md Qualification_name'></td><td><input  name='phd_degree_institute[]' id='phd_degree_institute" + n + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

}



$('#save_qualify_btn').on('click',function(){
    event.preventDefault();
    var formData = new FormData(professional_q_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_qualification',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_qualify();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
            reset_qualify();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});


function reset_qualify(){
    $("#qualification_table tbody").html('');
    $('#qualification_table').append("<tr id='addr" + (m + 1) + "' class='rowval'><td><input  name='designation[]' id='designation" + m + "'  value='' type='text' placeholder='Designation'  class='form-control input-md designation'></td><td><input  name='company_name[]' id='company_name" + m + "'  value='' type='text' placeholder='Company'  class='form-control input-md company_name'></td><td><input  name='duration[]' id='duration" + m + "'  value='' type='text' placeholder='Duration'  class='form-control input-md duration'></td></tr>");
}

$('#save_preference').on('click',function(){
    event.preventDefault();
    var formData = new FormData(preference_form);
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: 'save_preferences',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        if (data.status == '1') {
            reset_prefe_form();
            var success_message = data.msg;
            showSuccessAlert(success_message);

        } else {
            reset_prefe_form();
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });
});

function reset_prefe_form(){
    document.getElementById("preference_form").reset();
}


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
