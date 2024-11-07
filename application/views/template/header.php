<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url("assets/image/logo.png")?>">
    <title>Smart Job Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css?v5'?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

</head>
<body class="layout-default">
<!-- Begin Menu Navigation
================================================== -->
<header class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsWow" aria-controls="navbarsWow" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="<?php base_url()?>">
            <img src="<?php echo base_url("assets/image/logo.png")?>" style="width: 150px;">
        </a>
        <!-- End Logo -->

        <!-- Begin Menu -->
        <div class="collapse navbar-collapse" id="navbarsWow">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>./index.php/home/job_listing?cat=0">Seek Jobs</a>
                </li>

<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="--><?php //echo base_url()?><!--./index.php/home/add_complaint">Add Complaint</a>-->
<!--                </li>-->



                <?php if (isset($_SESSION['is_login']) AND ($_SESSION['user_cat'] == "job_seeker") ) {
                    $user_id = $_SESSION['id'];
                    $profile_link = base_url().'index.php/home/create_profile_new?uid='.$user_id;
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $profile_link ?>">Create Profile</a>
                </li>
                <?php }?>

                <?php if (isset($_SESSION['is_login']) AND ($_SESSION['user_cat'] == "job_seeker") ) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>./index.php/home/my_jobs">Jobs For Me</a>
                </li>
                    <?php }?>

                <li class="nav-item">
                    <?php if (isset($_SESSION['is_login'])) {
                        $name = $_SESSION['name'];
                        ?>
                        <a class="nav-link highlight"><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo $name?></a>
                    <?php } else { ?>
                        <a class="nav-link highlight" href="<?php echo base_url().'index.php/login/login_page_load'?>">Sign In/ Sign Up</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                <?php if (isset($_SESSION['is_login'])) { ?>
                    <a href="<?php echo base_url().'index.php/login/logout'?>" id="signout" style="padding: 5px; margin: 5px;"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                <?php }?>
                </li>
            </ul>
            <!-- End Menu -->
        </div>
    </div>
</header>
