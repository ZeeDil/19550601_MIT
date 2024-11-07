<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>assets/admin/css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    <title>Smart Job Portal</title>
</head>
<body class="body">
<section class="header">
    <div class="logo">
        <i class="ri-menu-line menu"></i>
            <a href="<?php echo base_url().'index.php/admin/dashboard'?>"><img src="<?php echo base_url("assets/image/logo.png")?>" alt="logo" style=""></a>
    </div>
    <div class="header--items">
        <i class="ri-search-2-line"></i>
<!--        <div class="dark--theme--btn">-->
<!--            <i class="ri-moon-line moon"></i>-->
<!--            <i class="ri-sun-line sun"></i>-->
<!--        </div>-->
        <i class="ri-notification-2-line"></i>
        <?php if (isset($_SESSION['is_login'])) { ?>
            <p class=""><?php echo $logged_in_name?></p>
            <a href="<?php echo base_url() . 'index.php/login/logout'?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <?php }?>

<!--        <i class="ri-wechat-2-line chat"></i>-->
        <div class="profile">
            <img src="<?php echo base_url().'index.php/admin/dashboard'?>"><img src="<?php echo base_url("assets/image/user.png")?>" alt="user">
        </div>
    </div>
</section>
<section class="main">