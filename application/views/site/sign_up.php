<style>
    .input-group select {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .input-group input {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .select option {
        padding: 3px;
        margin-top: 5px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 5px;
        border-radius: 5px;
    }

    .alert-success {
        background: #00c292;
        color: #fff;
        border-color: #00c292;
        padding: 5px;
        border-radius: 5px;
    }


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url().'assets/css/login_styles.css'?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Smart Jobs - Sign Up </title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="<?php echo base_url("assets/image/logo.png")?>" alt="Logo">
    </div>
    <form id="sign_up_form" method="post">
        <div class="input-group">
            <label for="email">User Name/ Email </label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="email">User Type</label>
            <select id="user_type"  name="user_type">
                <option value="">Select the User Type</option>
                <option value="job_seeker">Job Seeker</option>
                <option value="job_provider">Job Provider</option>
            </select>
        </div>

        <div class="input-group">
            <label for="email">Password</label>
            <input type="password" id="pw" name="pw" required>
        </div>

        <div class="input-group">
            <button id="signup_btn" type="submit">Sign Up</button>
        </div>
    </form>
    <div class="alert alert-info form-alertbox" role="alert" style="display:none;">
        Warning! Some messages shows here..
    </div>
    <div class="signup-link">
        <a href="<?php echo base_url().'index.php/login/login_page_load'?>">Already have an Account</a>
    </div>
</div>
</body>
</html>
<script>
    var BASE_URL = "<?php echo base_url();?>";
    $(document).ready(function () {

    }); //end of document ready
    $('#signup_btn').on('click', function() {
        event.preventDefault();
        var formData = new FormData(sign_up_form);
        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>index.php/login/signup_with_site',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
        }).always(function (data) {
            if (data.status == '1') {
                var success_message = data.msg;
                showSuccessAlert(success_message);
                var login_page = BASE_URL+'index.php/login/login_page_load';
                setTimeout(function () {
                    window.location.href = login_page;
                }, 1000);
            } else {
                var error_message = data.msg;
                showFailedAlert(error_message);
            }
        });
    });


    function showSuccessAlert(message) {
        $(".form-alertbox").html(message);
        $(".form-alertbox").addClass("alert-dismissible");
        $(".form-alertbox").removeClass('alert-warning alert-danger alert-info').addClass('alert-success');
        $(".form-alertbox").show();
        setTimeout(function () {
            $(".form-alertbox").slideUp();
        }, 3000);
    }

    function showFailedAlert(message) {
        $(".form-alertbox").html(message);
        $(".form-alertbox").addClass("alert-dismissible");
        $(".form-alertbox").removeClass('alert-success alert-warning alert-info').addClass('alert-danger');
        $(".form-alertbox").show();
        setTimeout(function () {
            $(".form-alertbox").slideUp();
        }, 3000);
    }
</script>


