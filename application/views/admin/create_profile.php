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
<link href="<?php echo base_url().'assets/css/admin/create_profile.css?v1'?>" rel="stylesheet">
<div class="main--container">
    <div class="wrapper">
        <main>
            <div class="info">
                <h3>Create Job Provider Profile</h3>
                <p>Create your profile and start posting your jobs.</p>
            </div>
            <form action="#" method="POST" id="form_create_profile">
                <fieldset class="contact-info">
                    <div class="container">
                        <legend>Basic Information</legend>
                        <p>
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="fname" placeholder="Required" title="Full Name">
                        </p>
                        <p>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Required" title="Email" value="<?php echo ($_SESSION['user_name']) ?>">
                        </p>
                        <p>
                            <label for="address"> Address</label>
                            <input type="text" id="address" name="address">
                        </p>
                        <p>
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone">
                        </p>
                    </div>
                </fieldset>

                <fieldset class="newsletter">
                    <div class="container">

                        <p>Sign Up with the portal and follow the steps</p>

                        <div class="checkboxes">
                            <p>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                <label for="html_news">Sign Up </label>
                            </p>
                            <p>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                <label for="css_news">Create Job Provider Profile</label>
                            </p>
                            <p>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                <label for="js_news">Create Your Company</label>
                            </p>
                            <p>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                <label for="js_news">Post Your Job Ad</label>
                            </p>
                            <p>
                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                <label for="js_news">Find the best employee</label>
                            </p>
                        </div>

                        <div class="radio-btn">
                            <div class="alert alert-info form-alertbox" role="alert" style="display: none;">
                                Warning! Some messages shows here..
                            </div>
                        </div>


                    </div>
                </fieldset>
            </form>
            <div class="footer">
                <button id="create_profile_btn" type="">Create Profile</button>
                <p></p>
            </div>

        </main>
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

<script src="<?php echo base_url("assets/js/app_js/create_profile.js")?>"></script>

<!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>-->

</body>
</html>