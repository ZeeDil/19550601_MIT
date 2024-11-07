<style>
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 5px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .alert-success {
        background: #00c292;
        color: #fff;
        border-color: #00c292;
        padding: 5px;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>
<div class="main--container">
    <div class="target-vs-sales--container">
        <div class="section--title">
            <section class="container job_create_form_area">
                <h3 class="title">Create Company</h3>
                <form id="create_company" class="form_inputs">
                    <div class="input-box">
                        <label>Company Name</label>
                        <input id="company_name" name="company_name" type="text" placeholder="Insert Company Name">
                    </div>
                    <div class="input-box">
                        <label>Company Address</label>
                        <input id="com_address" name="com_address" type="text" placeholder="Company Address">
                    </div>

                    <div class="input-box">
                        <label>Location</label>
                        <select id="com_city" name="com_city">
                            <option value="0">Select District</option>
                            <?php foreach($all_districts as $item){
                            $district_id = $item->district_id;
                            $district_name = $item->district;
                            ?>
                            <option value="<?php echo $district_id ?>"><?php echo $district_name ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="input-box">
                        <label>Phone</label>
                        <input id="com_phone" name="com_phone" type="text" placeholder="Phone">
                    </div>

                    <div class="input-box">
                        <label>Company Email</label>
                        <input id="com_email" name="com_email" type="text" placeholder="Email">
                    </div>

                    <div class="input-box">
                        <label for="img">Company Logo:</label>
                        <input type="file" id="com_logo" name="com_logo" accept="">
                    </div>
                    <hr>

                    <div id="submit_button_area">
                        <button class="button button1" id="save_company"><i class="fa fa-save"></i> Save Company</button>
                    </div>
                </form>
            </section>
        </div>
        <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
            Warning! Some messages shows here..
        </div>

    </div>
    <hr>

    <div class="table">
        <div class="section--title">
            <h3 class="title">Companies</h3>
            <div></div>
        </div>
        <table id="company_table" class="" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
</section>
<script src="<?php echo base_url("assets/admin/js/main.js")?>"></script>
<script src="<?php echo base_url("assets/admin/js/sales.js")?>"></script>
<script src="<?php echo base_url("assets/admin/js/orders.js")?>"></script>
<script src="<?php echo base_url("assets/admin/js/products.js")?>"></script>
<script src="<?php echo base_url("assets/admin/js/customers.js")?>"></script>
<script src="<?php echo base_url("assets/admin/js/tarsale.js")?>"></script>

<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>

<script src="<?php echo base_url("assets/js/app_js/company.js")?>"></script>

<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>-->

</body>
</html>