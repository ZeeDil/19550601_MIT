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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url().'assets/css/login_styles.css'?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Smart Jobs - Login </title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="<?php echo base_url("assets/image/logo.png")?>" alt="Logo">
    </div>
    <form class="login-form" method="post" action="" id="loginForm">
    <div class="input-group">
            <label for="email">Username</label>
            <input type="text" id="user_name" name="user_name" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="pw" required>
        </div>
        <div class="input-group">
            <button type="submit" id="login_button">Sign In</button>
        </div>
    </form>
    <div class="signup-link">
        <a href="<?php echo base_url().'index.php/login/sign_up'?>">Create New Account</a>
    </div>
    <div class="alert alert-info form-alertbox" role="alert" style="display:none;">
        Warning! Some messages shows here..
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {

    }); //end of document ready

    $('#login_button').on('click',function(){
        event.preventDefault();
        var formData = new FormData(loginForm);
        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>index.php/login/log',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
        }).always(function (data) {
            console.log(data.url);
            if (data.status == '1') {
                var redirect_url = data.url;
                window.location.replace(redirect_url);
                //showSuccessAlert(success_message);

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


