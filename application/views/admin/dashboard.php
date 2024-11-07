<style>
    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }
    .button-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .button {
        flex-grow: 1;
        margin-right: 10px;
        text-align: center;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        height:100px;
    }
    .button:last-child {
        margin-right: 0;
    }
    .button i {
        font-size: 40px;
        margin-right: 10px;
    }
    .button:hover {
        background-color: #0056b3;
    }
</style>
<div class="main--container">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="section--title">
        <?php
        $data = $this->session->userdata('name');
        ?>

        <h3 class="title">Welcome back, <?php echo $data ?></h3>

    </div>

    <div class="container">
        <div class="button-row">
            <button class="button" onclick="load_profile();"><i class="fas fa-user"></i>Create Pofile</button>
            <button class="button" onclick="load_company();"><i class="fa fa-industry"></i>Create Company</button>
            <button class="button" onclick="load_jobs();"><i class="fas fa-briefcase"></i>Create Job</button>
            <button class="button" onclick="view_applicants();"><i class="fas fa-user"></i>View Applications</button>
        </div>
        <div class="button-row">
            <button class="button" onclick="view_applicants();"><i class="fas fa-user"></i>View Applications</button>
        </div>
    </div>

</div>
</section>
</body>
</html>
<script>
    function load_profile(){
        var redirect_url =   'http://localhost:8080/smart_jobportal/index.php/admin/create_profile';
        window.location.href = redirect_url;
    }

    function load_company(){
        var redirect_url =   'http://localhost:8080/smart_jobportal/index.php/admin/create_company';
        window.location.href = redirect_url;
    }

    function load_jobs(){
        var redirect_url =   'http://localhost:8080/smart_jobportal/index.php/admin/create_job';
        window.location.href = redirect_url;
    }

    function view_applicants(){
        var redirect_url =   'http://localhost:8080/smart_jobportal/index.php/admin/view_applicants';
        window.location.href = redirect_url;
    }
</script>