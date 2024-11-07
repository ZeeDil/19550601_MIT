<div class="container ">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <h2><i class="fa fa-list-alt" aria-hidden="true"></i> VIEW APPLICANTS</h2>
            </div>
            <div class="filter_and_sort">
                <div class="links" style="float:right;">
                    <a  href="<?php echo base_url().'admin/dashboard';?>">Home</a><span> / </span>
                    <a  href="" style="color:#313644;">View Applications</a>
                </div>
            </div>
        </div>

        <div class="white-box">

            <div class="alert_box">
                <?php
                $last_applied_user_count;
                if($last_applied_user_count > 0){
                    if($last_applied_user_count == 1){
                        $IS = 'is';
                    }else{
                        $IS = 'are';
                    }
                    $alert_class_name = "alert alert-info";
                    $msg = 'There '.$IS.' '.$last_applied_user_count.' new applicants applied within last 24 Hours, for the Jobs You have posted!';
                }else{
                    $alert_class_name = "alert alert-danger";
                    $msg = 'There are no new applicants applied within last 24 Hours, for the Jobs You have posted!';
                }
                ?>
                <div class="section--title">
                    <div class="<?php echo $alert_class_name ?>" role="alert">
                        <?php echo $msg ?>
                    </div>
                </div>
            </div>
            <h3 class="box-title m-b-0">View Applications</h3>
            <p class="text-muted m-b-30 font-13"><i class="fa fa-hand-o-down"></i>  Filter Candidates applied by Job ID</p>


            <div class="form-group row">
                <div class="row select_job">
                    <select id="jb_company" name="jb_company" class="form-control" style="width: 50%;margin-left: 20px;">
                        <option value="0">Select Job ID to Filter Applicants</option>
                        <?php foreach($jobs_of_the_user as $item){
                            $job_id = $item->job_id;
                            $job_code = $item->job_code;?>
                            <option value="<?php echo $job_id ?>"><?php echo $job_code ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="table">
                <table id="applicant_table" class="" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Applicant Name</th>
                        <th>Job Reference ID</th>
                        <th>Actions</th>
                        <th></th>
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
<script src="<?php echo base_url("assets/js/app_js/view_applicant.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>


