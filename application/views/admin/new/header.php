<!-- .row -->
<title>Smart Job Portal | Admin View</title>
<link rel = "icon" href ="<?php echo base_url("assets/image/logo.png")?>"  type = "image/x-icon">
<link rel="stylesheet" href="<?php echo base_url("assets/js/data_tables/DataTables-1.10.12/css/dataTables.bootstrap.min.css")?>" type="text/css" media="all" />
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />
<!--    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="<?php echo base_url("assets/css/admin_new.css")?>" type="text/css" media="all" />
<style>

</style>
<div class="row whole_thing">
    <div class="row cb_billing_heading">
        <a class="logo" href="<?php echo base_url().'admin/dashboard'?>" style=" margin-left: 20px"><b><img src="<?php  echo base_url().'assets/image/logo.png'?>" alt="Logo" width="150px" style="margin-left: 50px; margin-top: 10px"></b><span class="hidden-xs" style=""></span></a>
        <div class="logged_in_user">
            <img src="<?php echo base_url().'assets/image/user.png'?>" alt="user-img" width="36" class="img-circle">
            <span class=""><?php echo $this->session->userdata('name'); ?></span>
            <span class="sign_out_span" style=""><a href="<?php echo base_url('index.php/login/logout') ?>" class=""><i class="fa fa-power-off" aria-hidden="true"></i></a></span>
        </div>
    </div>
