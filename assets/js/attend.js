$(document).ready(function () {
    var emp_id = $('#emp_id').val();
    var month = $('#month').val();
    load_data_table(emp_id,month);

}); //end of document ready

function load_data_table(emp_id, month){

    billing_table = $('#billing_table').DataTable({
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'get_attend_jtable',
            "type": "POST",
            "data" : {emp_id : emp_id , month:month}
        },
        "columnDefs": [
            {

                "data": "0",
                "orderable": false,
//                    "render": function (data, type, full, meta) {
//                        return getJtableBtnHtml(full);
//                    }
            }
        ],
        "order": [[0, "desc"]],
        dom: 'lBfrtip',
        lengthMenu: [[10, 25, 50, 100, 99999999999999], [10, 25, 50, 100, "All"]],
        buttons:
            ['csv',
                {
                    extend: 'excel',
                    title: 'Intern Attendance Report - from ' + emp_id + ' to '+emp_id+ '.',
                    footer: true,

                },
                {
                    extend: 'pdf',
                    footer: true,
                    orientation: 'portrait',
                    pageSize: 'LEGAL',
                    width: '100%',
                    title: 'Intern Attendance Report - from ' + emp_id + ' to '+emp_id+ '.',
                    //title: 'CB Billing',
                }],
        drawCallback:function(settings)
        {

        }
    });

    //data table error handling
    $.fn.dataTable.ext.errMode = 'none';
    $('#merchant_table').on('error.dt', function (e, settings, techNote, message) {
        console.log('DataTables error: ', message);
    });
}


$('#update_attendance').on('click', function(){
    var formData = new FormData(attendance_form);
    $.ajax({
        method: 'POST',
        url: 'insert_attendance',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data.status);
        if (data.status == '1') {
            showSuccessAlert("Record successfully.");
            document.getElementById("attendance_form").reset();
            $('#billing_table').DataTable().ajax.reload();
            reset_field();
        
        } else if (data.status == '2'){
            var message = data.msg;
            console.log(message);
            showFailedAlert(message);
            reset_field();

        }
    });

});


function getJtableBtnHtml(full) {
    var log_user = $('#hidden_log_user').val();
    console.log(full);
    var html = '';
    html += '<div class="btn-group" role="group">';
        if (full[6] == 0) {
                if(log_user == 'Dharani' || log_user == 'Andrea' ){
                    html += '<button type="button" class="btn btn-warning btn_dara" value="' + full[0] + '" data-toggle="tooltip" title="Confirm this Order"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>';
                }else{
                    html += '<button type="button" class="btn btn-warning btn-activate" value="' + full[0] + '" data-toggle="tooltip" title="Confirm this Order"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>';
                }
        } else {
            html += '<button type="button" class="btn btn-success btn-inactivate" value="' + full[0] + '" data-toggle="tooltip" title="Confirmed Order"><i class="fa fa-check-circle" aria-hidden="true"></i></button>';
        }
    html += '</div>';
    return html;
}




function reset_field(){
    document.getElementById("attendance_form").reset();
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








