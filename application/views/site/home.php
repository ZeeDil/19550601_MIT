<style>
    .job_attributes{
        margin-bottom: 0.25rem;
        display: inline-block !Important;
        font-size: 12px;
        text-decoration: none!important;
    }
</style>
<div class="site-content">
    <!-- Home Jumbotron
    ================================================== -->
    <section class="intro">
        <div class="wrapintro">
            <h1>Are You Seeking A Job ?</h1>
            <h2 class="lead">"Smart jobs" will help you to find a better job for you. join with us to light up your feture.</h2>
            <a href="<?php echo base_url().'index.php/home/job_listing'?>" class="btn" style="margin-right: 10px;">find a job</a>
            <!-- <a target="_blank" href="" class="btn" style="background-color: skyblue;">XYZ</a> -->
        </div>
    </section>
    <!-- Container
    ================================================== -->
    <div class="container">
        <div class="main-content">
            <!-- Featured
            ================================================== -->
            <section class="featured-posts">
                <div class="section-title">
                    <h2><span>Featured Jobs</span></h2>
                </div>
                <div class="row listfeaturedtag">
                    <div class="card-container">
                        <?php foreach($featured_jobs as $item){
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
                            <img src="<?php echo $company_logo  ?>" alt="<?php echo $company_logo  ?>">
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


                    <div style="text-align:center; margin-top:60px;width: 100%;">
                        <h4 style="">Smart Job Portal <br> The best way to find your dream Job</h4>
                    </div>

                    <div class="search-bar" style="width:100%; margin-top:60px; border-radius: 12px;" >
                        <form id="search_form" class="example" style="margin-bottom: 30px;">
                            <h4 style="margin-bottom: 30px;">Find Your Dream Job Here </h4>
                            <input type="text" placeholder="Enter Job Title or Key Word" name="search">
                            <button type="submit" id="search_jobs"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <!-- list view start -->
                    <div style="margin-left: 45%; margin-top: 40px; margin-bottom: 40px;"> <h3>Latest Jobs</h3> </div>
<?php foreach($featured_jobs as $item){
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

                    <div class="job-card" style="width:100%">
                        <a href="<?php echo base_url().'index.php/home/single_job?job_id='.$job_id ?>">
                        <img src="<?php echo $company_logo  ?>" alt="Job Image"> </a>

                        <h4 class="title-job-h"><?php echo $job_title  ?></h4>
                        <p class="title-job-p"><?php echo $job_nature  ?></p>
                            <p class="title-job-p"><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $location  ?></p>
                            <p class="title-job-p"><?php echo $job_type  ?></p>

                    </div>
<?php }?>






                    <!-- list view end -->

                    <div class="beforefooter">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <h3>This is your Chance. Shine like a star, Find the best Job for you</h3>

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


                    <script>
                        var BASE_URL = "<?php echo base_url();?>";

                        $('#search_jobs').on('click', function(event) {
                            event.preventDefault();
                            var formData = new FormData($('#search_form')[0]); // Corrected form selector

                            $.ajax({
                                method: 'POST',
                                url: '<?= base_url() ?>index.php/home/serach_jobs',
                                dataType: 'json',
                                data: formData,
                                processData: false,
                                contentType: false,
                            }).always(function(data) {
                                if (data.status == '1') {
                                    console.log(data.status);
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    var error_message = data.msg;
                                    //showFailedAlert(error_message);
                                }
                            });
                        });

                    </script>