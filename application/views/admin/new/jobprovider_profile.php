<div class="container ">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <h2><i class="fa fa-list-alt" aria-hidden="true"></i> CREATE JOB PROVIDER PROFILE</h2>
            </div>
            <div class="filter_and_sort">
                <div class="links" style="float:right;">
                    <a  href="<?php echo base_url('index.php/admin/new_dashboard') ?>';?>">Home</a><span> / </span>
                    <a  href="" style="color:#313644;">User Profile Creation</a>
                </div>
            </div>
        </div>

        <div class="white-box">

            <h3 class="box-title m-b-0">Create Job Provider Profile</h3>
            <p class="text-muted m-b-30 font-13"> Create your profile and start posting your jobs. </p>
              <hr>

            <form class="form" method="POST" id="form_create_profile" action="" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="" class="col-4 control-label col-form-label">Full Name</label>
                    <div class="col-8">
                        <input class="form-control"  id="fname" name="fname" type="text" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Email</label>
                    <div class="col-8">
                        <input class="form-control" id="email" name="email" type="text" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Address</label>
                    <div class="col-8">
                        <input class="form-control" type="text"id="address" name="address" type="text" placeholder="Address" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Phone</label>
                    <div class="col-8">
                        <input class="form-control" type="text" id="phone" name="phone" type="text" placeholder="Phone" >
                    </div>
                </div>


                <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                    Warning! Some messages shows here..
                </div>

                <div class="form-group m-b-0">
                    <div class="offset-sm-5 col-sm-10" style="margin-bottom: 30px;">
                        <button type="" class="btn btn-success btn-rounded btn-lg waves-effect waves-light m-r-10" id="create_profile_btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create Profile </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
</div>
<script src="<?php echo base_url("assets/js/app_js/company.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>


