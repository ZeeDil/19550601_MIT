$(document).ready(function () {
    var jod_id = 0;
    load_applicants_jtable(jod_id);


}); //end of document ready

$('#jb_company').on('change', function() {
    var selectedValue = $(this).val();
    load_applicants_jtable(selectedValue);
});

function load_applicants_jtable(jod_id){
    merchant_table = $('#applicant_table').DataTable({
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'applicant_jtable',
            "type": "POST",
            "data" : {jod_id : jod_id}
        },
        "columnDefs": [
            {
                "targets": -1,
                "data": "0",
                "orderable": false,
                "render": function (data, type, full, meta) {
                    //return getJtableBtnHtml(full);
                }
            }
        ],
        "order": [[0, "desc"]]
    });

    //data table error handling
    $.fn.dataTable.ext.errMode = 'none';
    $('#applicant_table').on('error.dt', function (e, settings, techNote, message) {
        console.log('DataTables error: ', message);
    });
}