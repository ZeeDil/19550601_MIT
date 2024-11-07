<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="sidebar">
    <ul class="sidebar--items">

        <li>
            <a href="<?php echo base_url().'index.php/admin/dashboard' ?>">
                <span class="icon"><i class="fa fa-home"></i></span>
                <div class="sidebar--item">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url().'index.php/admin/create_profile' ?>">
                <span class="icon"><i class="fa fa-user"></i></span>
                <div class="sidebar--item">Create Pofile</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url().'index.php/admin/create_company' ?>">
                <span class="icon"><i class="fa fa-industry"></i></span>
                <div class="sidebar--item">Create Company</div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url().'index.php/admin/create_job2' ?>">
                <span class="icon"><i class="fas fa-briefcase"></i></span>
                <div class="sidebar--item">Create Job Opportunity</div>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url().'index.php/admin/view_applicants' ?>">
                <span class="icon"><i class="fas fa-file"></i></span>
                <div class="sidebar--item">View Applicants</div>
            </a>
        </li>


    </ul>
    <ul class="sidebar--bottom--items">

        <li>
            <a href="<?php echo base_url().'index.php/login/logout' ?>">
                <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                <div class="sidebar--item">Logout</div>
            </a>
        </li>
    </ul>
</div>