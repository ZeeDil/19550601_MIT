<div class="site-content">
    <div class="container">
        <!-- Content
    ================================================== -->
        <div class="main-content">
            <!-- Begin Article
            ================================================== -->
            <div class="row">
                <!-- Sidebar -->
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
                <?php
                $company_country = base_url().'assets/image/country_flags/flags-medium/'.strtolower($job_details->job_country).'.png';
                ?>
                <!-- Post -->
                <div class="col-sm-8">
                    <div class="row">
                        <div id="company_country" >
                            <img src="<?php echo $company_country?>" style="display:none"/>
                        </div>
                        <p>
                            <span class="extra_features_job_id"> <i class="fa fa-external-link" aria-hidden="true"></i> Ref No : <?php echo $job_details->job_code?></span>
                            <span class="extra_features_closing_date"><i class="fa fa-calendar" aria-hidden="true"></i> Closing On : <?php echo $job_details->expire_date?></span>

                        </p>
                    </div>

                    <hr>
                    <div class="mainheading">
                        <!-- Post Title -->
                        <h1 class="posttitle" style="margin-top: 20px;"><?php echo $job_details->job_title?></h1>
                    </div>
                    <!-- Post Featured Image -->
                    <?php
                    $image_link = base_url().'uploads/job_add/'.$job_details->job_image;
                    $company_logo = base_url().'uploads/company_logo/'.$job_details->company_logo;
                    $company_country = base_url().'assets/image/country_flags/flags-medium/'.strtolower($job_details->job_country).'.png';
                    $salary_min = $job_details->salary_min;
                    $salary_max = $job_details->salary_max;
                    $salary_show = $salary_min.'K - '.$salary_max.'K';
                    ?>
                    <img class="featured-image img-fluid" src="<?php echo $image_link ?>" alt="job_ad">
                    <!-- End Featured Image -->
                    <!-- Post Content -->
                    <div class="article-post">
                       <p><?php echo $job_details->job_description ?></p>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Post Date -->
                    <div class="row">
                        <div id="company_logo" >
                            <img src="<?php echo $company_logo?>" style="margin:10px; border:1px solid #CCCCCC; border-radius: 50%;height: 50px;width: auto;"/>
                        </div>

                        <div id="company_address">
                            <p><?php echo $job_details->company_name.', '.$job_details->address.'.'?> <br><?php echo $job_details->countryname.'.'?></p>
                        </div>
                    </div>
                    <?php
                    if ($this->session->userdata('is_login')) {
                        $username = $_SESSION['user_name'];
                        $name = $_SESSION['name'];
                    }else{
                        $username = "NA";
                        $name = "NA";
                    }
                    ?>

                    <div class="row">
                        <p>
                            <span class="extra_features"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $job_details->district?></span>
                            <span class="extra_features"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $job_details->job_nature?></span>
                            <span class="extra_features"><i class="fa fa-money" aria-hidden="true"></i> <?php echo $salary_show?></span>
                            <span class="extra_features"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $job_details->job_type?></span>
                        </p>
                    </div>
                    <form id="job_id_un_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="hidden_job_id" name="hidden_job_id" value="<?php echo  $job_details->job_id ?>">
                        <input type="hidden" id="hidden_user_name" name="hidden_user_name" value="<?php echo  $username ?>">
                        <input type="hidden" id="hidden_user_loggedname" name="hidden_user_loggedname" value="<?php echo $name?>">

                        <button id="myButton" class="apply-btn"> Apply Now</button>
                    </form>

                </div>
                <!-- End Post -->
            </div>
            <!-- End Article
            ================================================== -->
        </div>
    </div>

    <script src="<?php echo base_url("assets/js/app_js/single_job.js")?>"></script>
