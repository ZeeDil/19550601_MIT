<style>
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
<div class="container ">
    <?php $this->load->view('admin/new/new_side_menu2'); ?>
    <div class="main_content">
        <div class="menu_item_name_and_filter ">
            <div class="menu_item_name">
                <?php
                $data = $this->session->userdata('name');
                ?>
                <h3 class="title">Welcome back, <?php echo $data ?></h3>
            </div>

        </div>

        <div class="white-box">
            <div class="container">
                <div class="button-row">
                    <button class="button" onclick="load_profile();"><i class="fa fa-user"></i>Create Pofile</button>
                    <button class="button" onclick="load_company();"><i class="fa fa-industry"></i>Create Company</button>
                    <button class="button" onclick="load_jobs();"><i class="fa fa-briefcase"></i>Create Job</button>
                    <button class="button" onclick="view_applicants();"><i class="fa fa-users"></i>View Applications</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<script>
    function load_profile(){
        var redirect_url =  '<?= base_url() ?>index.php/admin/new_profile';
        window.location.href = redirect_url;
    }

    function load_company(){
        var redirect_url =   '<?= base_url() ?>index.php/admin/new_profile';
        window.location.href = redirect_url;
    }

    function load_jobs(){
        var redirect_url =   '<?= base_url() ?>index.php/admin/new_create_job';
        window.location.href = redirect_url;
    }

    function view_applicants(){
        var redirect_url =   '<?= base_url() ?>index.php/admin/new_view_applicants';
        window.location.href = redirect_url;
    }
</script>


