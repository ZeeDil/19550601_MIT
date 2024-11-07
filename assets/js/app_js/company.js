$(document).ready(function () {
    load_company_tab();
    //$('#update_pri_btn').hide();
}); //end of document ready

$('#save_company').on('click', function(){
    event.preventDefault();
    var formData = new FormData(create_company);
    // var base_url = window.location.origin;
    $.ajax({
        method: 'POST',
        url: 'save_company',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert("Information saved successfully.");
            $('#company_table').DataTable().ajax.reload();
            reset_field();
        } else {
            var error_message = data.msg;
            showFailedAlert(error_message);
        }
    });

});

function load_company_tab(){
    company_table = $('#company_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'company_jtable',
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

function getJtableBtnHtml(full) {
    var html = '';
    html += '<div class="btn-group" role="group">';
    // html += '<button type="button" class="btn btn-default btn-edit" value="' + full[0] + '" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';

    html += '<button type="button" class="btn btn-danger btn-del" value="' + full[0] + '" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>';
    html += '</div>';
    return html;
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








$('#cancel_save_pri_btn').on('click', function(){
    event.preventDefault();
    reset_field();

});

function reset_field(){
    document.getElementById("create_company").reset();
}



$(document).on('click', '.btn-del', function (event) {
    var p_id = $(this).val();

    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            delete_p_by_ID(p_id);
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
});

function delete_p_by_ID(p_id) {
    var param = {};
    param.p_id = p_id;
    $.post('delete_priviledge_by_ID', param, function(response) {
        if (response !== null) {
            if (response.status == "1") {
                showSuccessAlert("Record deleted.");
                $('#company_table').DataTable().ajax.reload();
                //reset_field();
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





