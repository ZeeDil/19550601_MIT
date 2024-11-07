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

    .button1{
        margin-bottom: 20px;
    }

    .checkbox-container {
        display: flex;
        gap: 10px; /* Optional: adds space between each checkbox and label */
    }

    #job_additional_info_section{
        border-top: none;
    }

    /* Add padding or margin to separate rows */
    .row {
        margin-bottom: 15px; /* or padding-bottom: 15px; */
    }

    /* Ensure checkbox labels display on new lines */
    .checkbox-container label {
        display: block;
        margin-bottom: 5px;
    }

    /* Ensure proper spacing for form groups */
    .form-group {
        margin-bottom: 15px;
    }

    /* Optional: styles for the button */
    .button1 {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button1:hover {
        background-color: #0056b3;
    }
</style>

<link href="<?php echo base_url().'assets/css/admin/form_styles.css'?>" rel="stylesheet">

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<div class="main--container">
    <div class="wrapper">
        <main>
            <div class="info">
                <h3>Create Job Advertisement</h3>
                <p>Insert the information related to your job vacancy</p>
            </div>
            <form id="job_create_form" class="">
                <fieldset class="contact-info">
                    <div class="container">
                        <legend>Job Information</legend>
                        <p>
                            <label for="name">Job Title</label>
                            <input type="text" id="jb_title" name="jb_title" placeholder="Required" title="Please fill out this field">
                        </p>
                        <p>
                            <label for="email">Job Description</label>
                            <textarea id="jb_description" name="jb_description"></textarea>
                        </p>
                        <p>
                            <label for="address">Company</label>
                            <select id="jb_company" name="jb_company">
                                <option value="">Select Company</option>
                                <?php foreach($all_companies as $item){
                                    $company_id = $item->company_id;
                                    $company_name = $item->company_name;?>
                                    <option value="<?php echo $company_id ?>"><?php echo $company_name ?></option>
                                <?php }?>
                            </select>
                        </p>
                        <p style="display:none">
                            <label for="address">Job Country</label>
                            <select id="jb_country" name="jb_country">
                                <option value="">Select Country</option>
                                <?php foreach($all_countries as $item){
                                    $country_code = $item->code;
                                    $country_name = $item->countryname;?>
                                    <option value="<?php echo $country_code ?>"><?php echo $country_name ?></option>
                                <?php }?>
                            </select>
                        </p>

                        <p>
                            <label for="city">Job District</label>
                            <select id="jb_district" name="jb_district">
                                <option value="">Select District</option>
                                <?php foreach($all_districts as $item){
                                    $d_id = $item->district_id ;
                                    $d_name = $item->district;?>
                                    <option value="<?php echo $d_id ?>"><?php echo $d_name ?></option>
                                <?php }?>
                            </select>
                        </p>
                        <p>
                            <label for="state">Job Category</label>
                            <select id="jb_cat" name="jb_cat">
                                <option value="">Select Job category</option>
                                <?php foreach($all_categories AS $item){
                                    $cat_id = $item->job_cat_id;
                                    $cat_name = $item->job_cartegory;
                                    ?>
                                    <option value="<?php echo $cat_id ?>"><?php echo $cat_name ?></option>
                                <?php }?>
                            </select>
                        </p>
                        <p>
                            <label for="zipcode">Job Type</label>
                            <select id="jb_type" name="jb_type">
                                <option value="">Select the Job Type</option>
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                                <option value="contract">Contarct</option>
                            </select>
                        </p>
                    </div>
                </fieldset>

                <fieldset class="newsletter">
                    <div class="container">
                        <legend>More about the job</legend>
                        <p>What is the Job Nature</p>

                        <div class="checkboxes">
                            <p>
                                <input type="radio" id="" class="jb_nature" name="jb_nature" value="remote">
                                <label for="remote">Remote</label>
                            </p>
                            <p>
                                <input type="radio" id="css" class="jb_nature" name="jb_nature" value="onsite">
                                  <label for="onsite">On site</label>
                            </p>
                            <p>
                                <input type="radio" id="" class="jb_nature" name="jb_nature" value="hybrid">
                                  <label for="hybrid">Hybrid</label>
                            </p>
                        </div>

                        <p>Job Expiry Date</p>
                        <?php
                        $cur_date = date('Y-m-d');

                        ?>
                            <p>
                                <input type="date" id="job_exp" name="job_exp" min="<?php echo $cur_date ?>" pattern="\d{4}-\d{2}-\d{2}">
                            </p>

                        <p>

                        <p>
                            <label for="name">Number of Vacancies</label>
                            <input id="no_of_vacancies" name="no_of_vacancies" type="number" min="1" placeholder="Number of Vacancies">
                        </p>


                        <p><label for="salary">Salary Range(LKR)</label><br></p>

                        <div class="row">
                            <div class="column_sal">
                                <span> From : </span><input id="sal_from" type="number" min="1" name="sal_from" class="sal_input"><span> K</span>
                            </div>

                            <div class="column_sal">
                                <span> To : </span><input id="sal_to" type="number" min="1" name="sal_to" class="sal_input"><span> K</span>
                            </div>
                        </div>

                        <div class="input-box">
                            <label for="img">Job Advertisement:</label>
                            <input type="file" id="jb_img" name="jb_img" >
                        </div>
                        </p>

                    </div>
                </fieldset>
            </form>

            <div class="footer">
                <button class="button button1" id="save_jobs_button"><i class="fa fa-save"></i> Save Job</button>
<!--                <button class="button button2"><i class="fa fa-edit"></i> Edit Job</button>-->
            </div>

            <div class="alert alert-info form-alertbox" role="alert" style="display: none ;">
                Warning! Some messages shows here..
            </div>

            <div id="additional_job_info">
                <h2>Additional Information - Job Opportunity</h2>
                <p>Add these additional Information in order to find the best candidate for this opportunity</p>

                <form id="job_additional_info_section">
                    <div class="row">
                        <div class="checkbox-container">
                            <label><input type="checkbox" name="ol"> Require Ordinary Level</label><br>
                            <label><input type="checkbox" name="al"> Require Advanced Level</label><br>
                            <label><input type="checkbox" name="hnd"> HND Level</label><br>
                            <label><input type="checkbox" name="degree"> Bachelor's degree</label><br>
                            <label><input type="checkbox" name="masters"> Master's degree</label><br>
                            <label><input type="checkbox" name="phd"> PhD or Higher</label>
                        </div>
                    </div>

<!--                    <div class="row">-->
<!--                        <div class="form-group">-->
<!--                            <label for="formGroupExampleInput">Example label</label>-->
<!--                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row">
                        <div class="form-group">
                            <label for="exp_years">Experience In Years</label>
                            <input type="text" id="exp_years" name="exp_years" placeholder="" title="Experience in years">
                        </div>
                    </div>

                    <div class="row">
                        <button class="button button1" id="save_add_job"><i class="fa fa-save"></i> Save Additional Information</button>
                    </div>
                </form>
            </div>

        </main>
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

<script src="<?php echo base_url("assets/js/data_tables/data_table.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/js/dataTables.bootstrap.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/data_tables/1.5.6.dataTables.buttons.min.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url("assets/js/tinymce.min.js"); ?><!--"></script>-->

<script src="<?php echo base_url("assets/js/app_js/create_job.js")?>"></script>

<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>-->

</body>
</html>
