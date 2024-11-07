$(document).ready(function () {


}); //end of document ready

// $('#myButton').on('click', function(){
//     event.preventDefault();
//     Swal.fire("SweetAlert2 is working!");
// });


$('#myButton').on('click', function(){
    event.preventDefault();
    var site_url = window.location.href;
    var indexPhpPosition = site_url.indexOf("index.php");
    var newUrl = site_url.substring(0, indexPhpPosition + 9); // Adding 9 to include "index.php" length

    var formData = new FormData(job_id_un_form);
    $.ajax({
        method: 'POST',
        url: 'apply_the_job',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
    }).always(function (data) {
        console.log(data);
        if (data.status == '2') {
            var message = data.msg;
            Swal.fire({
                icon: "success",
                title: "Your job application is successful",
                text: ""
            });
        }else if (data.status == '1'){
            var profile_url = newUrl+'/home/create_profile';
            Swal.fire({
                icon: "success",
                title: "Your job application is successful",
                text: "Ckick the below link to create a profile in Smart Job Portal",
                footer: '<a href="http://localhost:8080/smart_jobportal/index.php/home/create_profile">Create your Profile?</a>'
            });

        }else if (data.status == '3'){
            var message = data.msg;
            var signup = "/login/sign_up"
            var signup_url = newUrl+signup;
            console.log(signup_url);
            Swal.fire("You havent signup with Smart Job portal. ");
            setTimeout(function () {
                window.location.replace(signup_url);
            }, 2500);

        }
    });
});

