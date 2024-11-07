<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="container">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <h2><i class="fa fa-list-alt" aria-hidden="true"></i> CREATE JOB OPPERTUNITIES</h2>
            </div>
            <div class="filter_and_sort">
                <div class="links" style="float:right;">
                    <a  href="<?php echo base_url().'admin/dashboard';?>">Home</a><span> / </span>
                    <a  href="" style="color:#313644;">Create Jobs</a>
                </div>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title m-b-0">Create Jobs</h3>
            <p class="text-muted m-b-30 font-13"><i class="fa fa-hand-o-down"></i>  Create Job Oppertunities</p>
            <hr>

            <form class="form" method="POST" id="job_create_form" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="" class="col-4 control-label col-form-label">Job Title</label>
                    <div class="col-8">
                        <input class="form-control"  type="text" id="jb_title" name="jb_title" placeholder="Required" title="Please fill out this field">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Job Description</label>
                    <div class="col-8">
                        <textarea class="form-control" id="jb_description" name="jb_description"  placeholder="Job Description"></textarea>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Company</label>
                    <div class="col-8">
                            <select class="form-control"id="jb_company" name="jb_company">
                                <option value="">Select Company</option>
                                <?php foreach($all_companies as $item){
                                    $company_id = $item->company_id;
                                    $company_name = $item->company_name;?>
                                    <option value="<?php echo $company_id ?>"><?php echo $company_name ?></option>
                                <?php }?>
                            </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Location (District)</label>
                    <div class="col-8">
                            <select id="jb_district" name="jb_district" class="form-control">
                                <option value="">Select District</option>
                                <?php foreach($all_districts as $item){
                                    $d_id = $item->district_id ;
                                    $d_name = $item->district;?>
                                    <option value="<?php echo $d_id ?>"><?php echo $d_name ?></option>
                                <?php }?>
                            </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Category</label>
                    <div class="col-8">
                        <input class="form-control"  type="text" id="jb_cat" name="jb_cat" placeholder="" title="">

                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Type</label>
                    <div class="col-8">
                        <select class="form-control" id="jb_type" name="jb_type">
                            <option value="">Select the Job Type</option>
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                            <option value="contract">Contarct</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Nature</label>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="" class="jb_nature" name="jb_nature" value="remote">
                                <label for="remote">Remote</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="css" class="jb_nature" name="jb_nature" value="onsite">
                                  <label for="onsite">On site</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="" class="jb_nature" name="jb_nature" value="hybrid">
                                  <label for="hybrid">Hybrid</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exp_date" class="col-4 control-label col-form-label">Job Expiry Date</label>
                    <?php
                    $cur_date = date('Y-m-d');
                    ?>
                    <div class="col-8">
                        <input class="form-control" type="date" id="job_exp" name="job_exp" min="<?php echo $cur_date ?>" pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Number of Vacancies</label>
                    <div class="col-8">
                        <input class="form-control" id="no_of_vacancies" name="no_of_vacancies" type="number" min="1" placeholder="Number of Vacancies">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Salary Range(LKR)</label>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <span> From : </span><input id="sal_from" type="number" min="1" name="sal_from" class="sal_input"><span> K</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <span> To : </span><input id="sal_to" type="number" min="1" name="sal_to" class="sal_input"><span> K</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="return_qty" class="col-4 control-label col-form-label">Job Advertisement</label>
                    <div class="col-8">
                        <input class="form-control" type="file" id="jb_img" name="jb_img" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="row mb-3">
                        <label for="" class="col-4 control-label col-form-label">Additional Information</label>
                        <div class="col-8">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="ol" name="ol">
                                    <label class="form-check-label" for="ol">Require Ordinary Level</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="al" name="al">
                                    <label class="form-check-label" for="al">Require Advanced Level</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="hnd" name="hnd">
                                    <label class="form-check-label" for="hnd">HND Level</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="degree" name="degree">
                                    <label class="form-check-label" for="degree">Bachelor's degree</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="masters" name="masters">
                                    <label class="form-check-label" for="masters">Master's degree</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="phd" name="phd">
                                    <label class="form-check-label" for="phd">PhD or Higher</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exp_years">Experience In Years</label>
                            <input type="text" class="form-control" id="exp_years" name="exp_years" placeholder="Enter years of experience">
                        </div>
                    </div>
                </div>

                <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                    Warning! Some messages shows here..
                </div>

                <div class="form-group m-b-0">
                    <div class="offset-sm-5 col-sm-10" style="margin-bottom: 30px;">
                        <button type="" class="btn btn-success btn-rounded btn-lg waves-effect waves-light m-r-10" id="save_jobs_button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Create Job Oppertunity </button>
                    </div>
                </div>
            </form>

            <div class="table">
                <table id="jobs_table" class="" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Job Title</th>
                        <th>Job Description</th>
                        <th>Job Type</th>
                        <th>Job Nature</th>
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
<script src="<?php echo base_url("assets/js/app_js/create_job.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>


