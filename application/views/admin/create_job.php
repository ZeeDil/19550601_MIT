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
                <h3 class="title">Create Job</h3>

                <?php


                ?>
                <form id="job_create_form" class="form_inputs">
                    <div class="input-box">
                        <label>Job Title</label>
                        <input id="jb_title" name="jb_title" type="text" placeholder="Insert Job Title">
                    </div>
                    <div class="input-box">
                        <label>Job Description</label>
                        <input id="jb_description" name="jb_description" type="text" placeholder="Job Description">
                    </div>

                    <div class="input-box">
                        <label>No of Vacancies</label>
                        <input id="no_of_vacancies" name="no_of_vacancies" type="number" placeholder="Number of Vacancies">
                    </div>

                    <div class="input-box">
                        <label>City</label>
                        <select id="jb_city" name="jb_city">
                            <option value="0">Select the City</option>
                            <?php foreach($all_cities as $item){
                                $city_id = $item->id;
                                $city = $item->name_en;
                              ?>
                                <option value="<?php echo $city_id ?>"><?php echo $city ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="input-box">
                        <label>Company</label>
                        <select id="jb_company" name="jb_company">
                            <option value="0">Select Company</option>
                            <?php foreach($all_companies as $item){
                                $company_id = $item->company_id;
                                $company_name = $item->company_name;?>
                                <option value="<?php echo $company_id ?>"><?php echo $company_name ?></option>
                            <?php }?>
                        </select>
                    </div>


                    <div class="input-box-radio">
                        <label>Job Nature</label><br>
                          <input type="radio" id="" class="jb_nature" name="jb_nature" value="remote">
                          <label for="remote">Remote</label><br>
                          <input type="radio" id="css" class="jb_nature" name="jb_nature" value="onsite">
                          <label for="onsite">On site</label><br>
                          <input type="radio" id="" class="jb_nature" name="jb_nature" value="hybrid">
                          <label for="hybrid">Hybrid</label>
                    </div>
                    <div class="input-box">
                        <label>Job Type</label>
                        <select id="jb_type" name="jb_type">
                            <option value="">Select the Job Type</option>
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                            <option value="contract">Contarct</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label>Sa</label>
                        <input id="jb_description" name="jb_description" type="text" placeholder="Job Description">
                    </div>

                    <div class="input-box">
                        <label>Job Description</label>
                        <input id="jb_description" name="jb_description" type="text" placeholder="Job Description">
                    </div>

                    <div class="input-box">
                        <label>Job Category</label>
                        <select id="jb_cat" name="jb_cat">
                            <option value="">Select Job category</option>
                            <?php foreach($all_categories AS $item){
                                    $cat_id = $item->job_cat_id;
                                    $cat_name = $item->job_cartegory;
                                ?>
                                <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="img">Job Advertisement:</label>
                        <input type="file" id="jb_img" name="jb_img" >
                    </div>

                    <div class="input-box">
                        <label for="">Job Expiry Date:</label>
                        <input type="date" id="job_exp" name="job_exp">
                    </div>

                    <hr>
                    <div id="submit_button_area">
                        <button class="button button1" id="save_jobs_button"><i class="fa fa-save"></i> Save Job</button>
<!--                        <button class="button button2"><i class="fa fa-edit"></i> Edit Job</button>-->
                    </div>
                </form>
            </section>
        </div>
        <div class="alert alert-info form-alertbox" role="alert" style="display: none;">
            Warning! Some messages shows here..
        </div>
    </div>
    <hr>

    <div class="table">
        <div class="section--title">
            <h3 class="title">Created Jobs</h3>
            <div></div>
        </div>
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

<script src="<?php echo base_url("assets/js/app_js/create_job.js")?>"></script>

<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>-->

</body>
</html>