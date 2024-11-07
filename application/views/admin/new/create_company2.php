<div class="container ">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <h2><i class="fa fa-list-alt" aria-hidden="true"></i> INVENTORY MANAGEMENT</h2>
            </div>
            <div class="filter_and_sort">
                <div class="links" style="float:right;">
                    <a  href="<?php echo base_url().'admin/dashboard';?>">Home</a><span> / </span>
                    <a  href="" style="color:#00c292;">Inventory Management</a>
                </div>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title m-b-0">Inventory Management</h3>
            
            <p class="text-muted m-b-30 font-13"><i class="fa fa-hand-o-down"></i>  Filter Inventory by Warehouse</p>
            <div>
                <label class="radio-inline">
                    <input type="radio" name="optradio" value="us" checked> <img class="country_image" src="<?php echo base_url().'assets/img/country/us.png' ?>" alt="US">
                </label>
                <label class="radio-inline">
                    <input type="radio" name="optradio" value="uk"> <img class="country_image" src="<?php echo base_url().'assets/img/country/uk.png' ?>" alt="US">
                </label>
            </div>
            <hr>
            <div class="table">
                <table class="table" id="inventory_export_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<script>
    $(document).ready(function () {
        var warehouse = "us";
        load_inventory_tab(warehouse);
    }); //end of document ready

    $('input[type=radio][name=optradio]').change(function() {
        var warehouse = this.value;
        load_inventory_tab(warehouse);

    });

    function load_inventory_tab(warehouse){
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        var currentMonth = currentDate.getMonth() + 1; // Months are zero-indexed, so add 1
        var currentDay = currentDate.getDate();
        var formated_date = currentYear + '-' + addLeadingZero(currentMonth) + '-' + addLeadingZero(currentDay);

        var BASE_URL = "<?php echo base_url();?>";
        inventory_export_table = $('#inventory_export_table').DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "url": BASE_URL+"/admin/Shipment_new/getExport_inventory_details",
                "data" : {warehouse: warehouse}
            },
            "columnDefs": [
                {

                    "data": "0",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        //return getJtableBtnHtml(full);
                    }
                }
            ],
            "order": [[0, "desc"]],
            dom: 'lBfrtip',
            lengthMenu: [[10, 25, 50, 100, 99999999999999], [10, 25, 50, 100, "All"]],
            buttons:
                    [{
                        extend: 'csv',
                        title: 'Crossborder Inventory Report - '+formated_date+' - '+warehouse,
                    },
                    {
                        extend: 'excel',
                        title: 'Crossborder Inventory Report - '+formated_date+' - '+warehouse,
                    },
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        width: '100%',
                        title: 'Crossborder Inventory Report - '+formated_date+' - '+warehouse,
                    }],
            drawCallback:function(settings)
            {
//                $('#total_order').html(settings.json.total);
            }
        });
    }

    function addLeadingZero(number) {
        return (number < 10 ? '0' : '') + number;
    }
</script>
<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>


