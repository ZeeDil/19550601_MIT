<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                        <div class="sidebar-section" style="display: none">
                            <h5><span>News letter</span></h5>

                            <!-- Signup Form -->
                            <link href="https://cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                            <div id="mc_embed_signup">
                                <form   method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <h2 style="font-weight:  ;">Sign up to get our weekly free guide to selling digital downloads</h2>
                                        <div class="mc-field-group">
                                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="E-mail Address">
                                        </div>


                                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                            <input type="text" name="b_8aeb20a530e124561927d3bd8_8c3d2d214b" tabindex="-1" value="">
                                        </div>
                                        <div class="clear">
                                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                            <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[3]='MMERGE3';ftypes[3]='text';fnames[1]='MMERGE1';ftypes[1]='text';fnames[2]='MMERGE2';ftypes[2]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                            <!--End mc_embed_signup-->
                        </div>
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
                if ($this->session->userdata('is_login')) {
                    $username = $_SESSION['user_name'];
                    $name = $_SESSION['name'];
                }else{
                    $username = "NA";
                    $name = "NA";
                }
                ?>

                <!-- Post -->
                <div class="col-sm-8">
                    <form action="<?php base_url().'index.php/home/submitcomplain'?>" method="post" id="com_form">
                        <div class="form-group">
                            <label for="email">User:</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $name ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Complaint:</label>
                            <input type="text" class="form-control" id="com" name="com">
                        </div>

                        <button type="submit" id="complaint_btn" class="btn btn-default">Submit</button>
                    </form>




                </div>
                <!-- End Post -->
            </div>
            <!-- End Article
            ================================================== -->
        </div>
    </div>

    <script>
        $('#complaint_btn').on('click',function(){
            event.preventDefault();
            var formData = new FormData(com_form);
            $.ajax({
                method: 'POST',
                url: 'http://localhost:8080/smart_jobportal/index.php/home/submitcomplain',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
            }).always(function (data) {
                if (data.status == '1') {
                    var success_message = data.msg;

                } else {
                    var error_message = data.msg;
                }
            });
        });
    </script>


    <script src="<?php echo base_url("assets/js/app_js/single_job.js")?>"></script>
