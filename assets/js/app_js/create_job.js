$(document).ready(function () {
    load_job_tab();


    // $("#jb_type").select2({
    //     tags: true
    // });
    //
    // $("#jb_cat").select2({
    //     tags: true
    // });
    //
    // $("#jb_district").select2({
    //     tags: true
    // });
    //
    // $("#jb_company").select2({
    //     tags: true
    // });
});


$('#jb_company').on('change', function(){
    var cat = $(this).val();
    get_cat_by_company(cat);

});

function get_cat_by_company(cat) {
    var param = {};
    param.cat = cat;
    $.post('get_category_by_job_id', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                var cat = response.category;
                $('#jb_cat').val(cat);
            } else {

            }

        } else {

        }
    }, 'json');
}



$('#save_jobs_button').on('click', function(){
    event.preventDefault();
    var formData = new FormData(job_create_form);
    // var base_url = window.location.origin;
    $.ajax({
        method: 'POST',
        url: 'save_job',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert("Information saved successfully.");
            $('#jobs_table').DataTable().ajax.reload();
            reset_field();
            clear_select2_dropdowns();
            //load_job_tab();

        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });

});

function load_job_tab(){
    job_data_table = $('#jobs_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'jobs_jtable_new',
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": -1,
                "data": "0",
                "orderable": false,
                "render": function (data, type, full, meta) {
                    return getJtableBtnHtml(full);
                }
            }
        ],
        "order": [[0, "desc"]]
    });
}

function clear_select2_dropdowns(){
    $("#select2-jb_company-container"). empty();
   // $("#select2-jb_company-container").select2("val", "");
    $("#select2-jb_district-container").select2("val", "");
    $("#select2-jb_cat-container").select2("val", "");
    $("#select2-jb_type-container").select2("val", "");

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


function getJtableBtnHtml(full) {
    var html = '';
    html += '<div class="btn-group" role="group">';
    // html += '<button type="button" class="btn btn-default btn-edit" value="' + full[0] + '" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
    html += '<button type="button" class="btn btn-danger btn-del" value="' + full[0] + '" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>';
    html += '</div>';
    return html;
}



$('#cancel_save_pri_btn').on('click', function(){
    event.preventDefault();
    reset_field();

});

function reset_field(){
    document.getElementById("job_create_form").reset();
}

$(document).on('click', '.btn-del', function (event) {
    var p_id = $(this).val();
    swal({
            title: "Are you sure?",
            text: "You want to delete this ?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            animation: "slide-from-top"
        },
        function () {
            delete_p_by_ID(p_id);
        });
});

function delete_p_by_ID(p_id) {
    var param = {};
    param.p_id = p_id;
    $.post('delete_job_by_ID', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                showSuccessAlert("Record deleted.");
                $('#jobs_table').DataTable().ajax.reload();
            } else {
                showFailedAlert("Delete failed.");
            }

        } else {
            showFailedAlert("Error,  Delete failed.");
        }
    }, 'json');
}

$(document).on('click', '.btn-inactivate', function (event) {
    var d_id = $(this).val();
    swal({
            title: "Are you sure?",
            text: "You want to deactivate this deal?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            animation: "slide-from-top"
        },
        function () {
            deactivate_deal_by_ID(d_id);
        });
});

function deactivate_deal_by_ID(d_id){
    var param = {};
    param.d_id = d_id;

    $.post('deactivate_deal_by_ID', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                showSuccessAlert("Deal deactivated.");
                $('#deals_data_table').DataTable().ajax.reload();
            } else {
                showFailedAlert("Deactivation failed.");
            }

        } else {
            showFailedAlert("Error, Deactivation failed.");
        }
    }, 'json');

}

$(document).on('click', '.btn-activate', function (event) {
    var d_id = $(this).val();
    swal({
            title: "Are you sure?",
            text: "You want to activate this deal?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            animation: "slide-from-top"
        },
        function () {
            activate_deal_by_ID(d_id);
        });
});

function activate_deal_by_ID(d_id){
    var param = {};
    param.d_id = d_id;

    $.post('activate_deal_by_id', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                showSuccessAlert("Deal activated.");
                $('#deals_data_table').DataTable().ajax.reload();
            } else {
                showFailedAlert("Deal Activation failed.");
            }

        } else {
            showFailedAlert("Error,  Activation failed.");
        }
    }, 'json');

}





