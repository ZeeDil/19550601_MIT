<style>
    .card {
        margin: 8px;
        width: 100%;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }

    .card:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    .card-holder {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
    }

    .card-company-name {
        margin-right: 0.5rem;
    }

    .card-company-location {
        margin-bottom: -.125rem;
        margin-right: 1rem;
    }

    .card-role-type {
        margin-bottom: -.125rem;

        margin-right: .75rem;
    }

    .card-listing-date {
        margin-bottom: -.125rem;

        margin-right: .75rem;
    }

    .skills-container {
        margin-bottom: 1rem;
    }
    .card-favorite-icon{
        /* Center the content */
        align-items: center;
        display: flex;
        justify-content: center;

        /* Colors */
        background-color: rgba(0, 0, 0, .3);
        color: #FFF;

        /* Rounded border */
        border-radius: 9999px;
        height: 32px;
        width: 32px;

        margin: 4px;
    }

    .card-vote-on-job {
        align-items: center;
        display: flex;
        justify-content: center;
        margin-left: auto;
    }

    .card-hide-icon {
        /* Center the content */
        align-items: center;
        display: flex;
        justify-content: center;

        /* Colors */
        background-color: rgba(0, 0, 0, .3);
        color: #FFF;

        /* Rounded border */
        border-radius: 9999px;
        height: 32px;
        width: 32px;

        margin: 4px;
    }

    .card-hide-icon:hover {
        background-color: rgba(0, 0, 0, .5);
    }

    .card-favorite-icon:hover {
        background-color: rgba(0, 0, 0, .5);
    }

    .card-report-job {}

    .card-salary-range {

        margin-right: .75rem;
        margin-bottom: -.125rem;
    }

    .card-job-duration {

        margin-right: .75rem;
        margin-bottom: -.125rem;
    }

    .glassdoor-rating {
        /* Reset styles for button */
        background-color: transparent;
        border: transparent;
        margin: 0 2px;
        padding: 0;
        color: #0caa41;

        /* Used to position the hover state */
        position: relative;
    }

    .card-company-glassdoor {
        display: flex;
        margin-top: -0.5rem;
        margin-bottom: -0.5rem;
    }

    .card-job-details {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }


    .btn-success {
        color: #fff !important;
        background-color: #218838 !important;
        border-color: #1e7e34 !important;



    }

    .btn-success:hover {
        color: #fff !important;
        background-color: #28a745 !important;
        border-color: #28a745 !important;
    }

    .btn-primary {
        color: #fff !important;
        background-color: #0069d9 !important;
        border-color: #0062cc !important;
    }

    .btn-primary:hover {
        color: #fff !important;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }

    .card-company-fit {
        display: flex;
    }

    .job-title {
        font-size: 2rem !important;
        line-height: 1;
    }

    .card-job-summary {
        display: flex;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    @-webkit-keyframes placeHolderShimmer {
        0% {
            background-position: -468px 0;
        }
        100% {
            background-position: 468px 0;
        }
    }

    @keyframes placeHolderShimmer {
        0% {
            background-position: -468px 0;
        }
        100% {
            background-position: 468px 0;
        }
    }

    .content-placeholder {
        display: inline-block;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-name: placeHolderShimmer;
        animation-name: placeHolderShimmer;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        background: #f6f7f8;
        background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
        background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        -webkit-background-size: 800px 104px;
        background-size: 800px 104px;
        height: inherit;
        position: relative;
    }

    .post_data
    {
        padding:24px;
        border:1px solid #f9f9f9;
        border-radius: 5px;
        margin-bottom: 24px;
        box-shadow: 10px 10px 5px #eeeeee;
    }
</style>
<div class="site-content">
    <div class="container">
        <div class="main-content">
            <!-- Category Archive
            ================================================== -->
            <section class="recent-posts row">
                <div class="col-sm-4">
                    <div class="sidebar">
                        <div class="sidebar-section">
                            <h5><span>Job Categories</span></h5>
                            <ul style="list-none;">
                                <?php foreach($cat as $item){
                                    $cat_id = $item->job_cat_id;
                                    $cat_name = $item->job_cartegory;
                                    ?>
                                    <li><a href=""><?php echo $cat_name ?></a></li>
                                <?php }?>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="section-title">
                        <h2 style="margin-top: 5px;"><span>Jobs searched</span></h2>
                    </div>
                    <div class="card-container">
                        <?php foreach($search_result as $item){
                            $image = $item->company_logo;
                            $company_logo = base_url().'uploads/company_logo/'.$image;
                            $job_title = $item->job_title;
                            $job_description = $item->job_description;
                            $job_nature = $item->job_nature;
                            $job_type = $item->job_type;
                            $salary = $item->salary_min.'K - '.$item->salary_max.'K';
                            $expiredate = $item->expire_date;
                            $location = $item->district;
                            $job_id = $item->job_id;
                            ?>
                            <div class="card" style="height: 450px;;">
                                <a style="text-decoration: none!important;" href="<?php echo base_url().'index.php/home/single_job?job_id='.$job_id ?>" >
                                    <img src="<?php echo $company_logo  ?>" alt="Image">
                                    <h3 style="margin-top: 20px;"><?php echo $job_title  ?></h3>
                                    <p><?php echo $job_description  ?></p>
                                    <label class="job_attributes"><i class="fa fa-industry" aria-hidden="true"></i> <?php echo $job_type  ?></label><br>
                                    <label class="job_attributes"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $job_nature  ?></label><br>
                                    <label class="job_attributes"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $location  ?> </label><br>
                                    <label class="job_attributes"><i class="fa fa-money fa-fw" aria-hidden="true"></i><?php echo $salary  ?></label><br>
                                    <label class="job_attributes"><i class="fa fa-calendar" aria-hidden="true"></i> Closing date - <span><?php echo $expiredate  ?></span></label>
                                </a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /.container -->
    <!-- Before Footer
    ================================================== -->
    <div class="beforefooter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>This is your Chance. Shine like a star,Join with us, push that button !</h3>

                    <a class="btn btn-primary btn-lg" href="#">Join with us today</a>
                </div>
                <div class="col-md-4 text-right footersocial">
                    <h5>Connect with Us</h5>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-google"></i>
                    <i class="fa fa-github"></i>
                </div>
            </div>
        </div>
    </div>

<!--    <script src="--><?php //echo base_url("assets/js/app_js/featured.js")?><!--"></script>-->