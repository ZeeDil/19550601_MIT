<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="container ">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <h2><i class="fa fa-list-alt" aria-hidden="true"></i> CREATE COMPANY</h2>
            </div>
            <div class="filter_and_sort">
                <div class="links" style="float:right;">
                    <a  href="<?php echo base_url().'admin/dashboard';?>">Home</a><span> / </span>
                    <a  href="" style="color:#313644;">Create Company</a>
                </div>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title m-b-0">Create Company</h3>
            <p class="text-muted m-b-30 font-13"><i class="fa fa-hand-o-down"></i>  Create Your Company and start posting Job Advertisements</p>
            <hr>

            <form class="form" method="POST" id="create_company" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="" class="col-4 control-label col-form-label">Company Name</label>
                    <div class="col-8">
                        <input class="form-control"  id="company_name" name="company_name" type="text" placeholder="Insert Company Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Company Address</label>
                    <div class="col-8">
                        <input class="form-control" id="com_address" name="com_address" type="text" placeholder="Company Address">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Location(District)</label>
                    <div class="col-8">
                        <select class="form-control" id="com_city" name="com_city">
                            <option value="0">Select District</option>
                            <?php foreach($all_districts as $item){
                                $district_id = $item->district_id;
                                $district_name = $item->district;
                                ?>
                                <option value="<?php echo $district_id ?>"><?php echo $district_name ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Category</label>
                    <div class="col-8">
                        <select id="jb_cat" name="jb_cat" class="form-control">
                            <option value="">Select Job category</option>
                            <?php foreach($all_categories AS $item){
                                $cat_id = $item->job_cat_id;
                                $cat_name = $item->job_cartegory;
                                ?>
                                <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>




                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Phone</label>
                    <div class="col-8">
                        <input class="form-control" type="text" id="com_phone" name="com_phone" type="text" placeholder="Company Phone" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Company Email</label>
                    <div class="col-8">
                        <input class="form-control" type="text"id="com_email" name="com_email" type="text" placeholder="Company Email" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Company Logo</label>
                    <div class="col-8">
                        <input class="form-control" type="file" id="com_logo" name="com_logo" accept="">
                    </div>
                </div>

                <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                    Warning! Some messages shows here..
                </div>

                <div class="form-group m-b-0">
                    <div class="offset-sm-5 col-sm-10" style="margin-bottom: 30px;">
                        <button type="" class="btn btn-success btn-rounded btn-lg waves-effect waves-light m-r-10" id="save_company"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create Company </button>
                    </div>
                </div>

            </form>




            <div class="table">
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
    </div>

</div>
</div>
<script src="<?php echo base_url("assets/js/app_js/company.js?v1")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>
<script>
    $("#com_phone").change(function () {
        var phone_no = $('#com_phone').val();
        const valid_phone = /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/;
        const match = phone_no.match(valid_phone);
        if(match){
        }else{
            swal({
                title: "The Phone Number You entered is Incorrect!",
                text: "Please Insert a valid Phone Number",
                type: "warning"
            });
        }
    });
</script>
