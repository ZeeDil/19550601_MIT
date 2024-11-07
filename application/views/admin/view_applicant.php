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

    .select_job select{
        border: 1px solid #D8DCE0;
        border-radius: 5px;
    }

    .select_job{
        margin-top: 20px;
    }

    .alert-info{
        width: 100%;
        background-color: #8DC3F9;
        padding: 15px;
        border: 1px solid #65ADF4;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .alert-danger{
        width: 100%;
        background-color: #F7BBAE;
        padding: 15px;
        border: 1px solid #EE775D;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }

</style>
<div class="main--container">
    <div class="target-vs-sales--container">
        <div class="section--title">
            <section class="container job_create_form_area">
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
                <h3 class="title">View Applicants</h3>

                <div class="row select_job">
                    <select id="jb_company" name="jb_company" class="form-control">
                        <option value="0">Select Job ID to Filter Applicants</option>
                        <?php foreach($jobs_of_the_user as $item){
                            $job_id = $item->job_id;
                            $job_code = $item->job_code;
                            $job_title = $item->job_title;
                            $show_job = $job_code.' - '.$job_title;
                            ?>
                            <option value="<?php echo $job_id ?>"><?php echo $show_job ?></option>
                        <?php }?>
                    </select>
                </div>


                <div class="table">
                    <div class="section--title">

                    </div>
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


            </section>
        </div>
        <div class="alert alert-info form-alertbox" role="alert" style="display: none;">
            Warning! Some messages shows here..
        </div>
    </div>
</div>


<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>

<script src="<?php echo base_url("assets/js/app_js/view_applicant.js")?>"></script>

<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>-->

</body>
</html>

