<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->model("main_model");
        $this->load->helper('url');
        $this->load->model("admin_model");
    }

	public function index()
	{
        $data = array();
        $data['featured_jobs'] = $this->main_model->get_feature_jobs();
       // print_r($data['featured_jobs']); die();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
        }

        $this->load->view('template/header' , $data);
        $this->load->view('site/home');
        //$this->load->view('template/footer');
	}

    public function home_pg()
    {
        $data = array();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
            $all_categories = $this->main_model->get_all_job_categories();
            $data['cat'] = $all_categories;
            $data['featured_jobs'] = $this->main_model->get_feature_jobs();


            $this->load->view('template/header' , $data);
            $this->load->view('site/home');
            $this->load->view('template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);
        }

    }

    public function my_jobs()
    {
        $data = array();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
            $all_categories = $this->main_model->get_all_job_categories();
            $data['cat'] = $all_categories;


            $this->load->view('template/header' , $data);
            $this->load->view('site/featured_jobs');
            $this->load->view('template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);
        }

    }

    public function job_listing()
    {
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
        }
        $data = array();
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;

        $this->load->view('template/header' , $data);
        $this->load->view('site/featured_jobs');
        $this->load->view('template/footer');

    }

    public function fetch_job_controller()
    {
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
        }
        $data = array();

        $cat_id = $this->input->post('cat');
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;
        $data['cat_id'] = $cat_id;

        $output = '';
        $data = $this->main_model->fetch_jobs($this->input->post('limit'), $this->input->post('start'),$cat_id);
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $job_id  = $row->job_id;
                $job_title = $row->job_title;
                $job_code = $row->job_code;
                $job_vacancy = $row->job_vacancy;
                $job_description = $row->job_description;
                $job_category = $row->job_category;
                $job_type = $row->job_type;
                $job_nature = $row->job_nature;
                $job_district = $row->district;
                $salary_min = $row->salary_min;
                $salary_max = $row->salary_max;
                $salary_show = $salary_min.'K - '.$salary_max.'K';
                $expire_date = $row->expire_date;
                $company = $row->company_logo;
                $company_name =  $row->company_name;
                $img_url = base_url().'uploads/company_logo/'.$company;
                $job_single_url = base_url().'index.php/home/single_job?job_id='.$job_id;

                $date1 = strtotime($expire_date);

                if ($date1 === false) {
                    echo "Invalid date string";
                } else {
                    $formattedDate = date("Y-m-d", $date1);
                    $formated_ex_date =  $formattedDate;
                    $formated_cur_date = (date("Y-m-d"));
                }

               // $currentDate = date("d/m/Y");
                $datetime1 = new DateTime($formated_cur_date);
                $datetime2 = new DateTime($formated_ex_date);


                $interval = $datetime1->diff($datetime2);

                $output .='
                <!-- START -->
                <div class="container card-holder">
                  <!-- Card Start -->
                  <div class="card">
                    <!-- Put Image Here -->
                    <div class="card-body">  
                    <div class="card-company-fit">                          
                      
                    <div style="border-radius: 50%;height: 64px;width: 64px;">
                          <img
                              src="'.$img_url.'"
                              style="border-radius: 50%;height: 100%;width: 100%;"
                          />
                      </div>
                      
                      <div class="card-vote-on-job">
                        <div class="card-favorite-icon">
                            <i class="far fa-thumbs-up"></i>
                        </div>
                        <div class="card-hide-icon">
                            <i class="far fa-thumbs-down"></i>
                        </div>      
                      </div>
                      
                    </div>      
                      
                    <h5 class="card-title job-title">'.$job_title.'</h5>
                      
                    <div class="card-company-glassdoor">
                      <p class="card-company-name">'.$company_name.'</p>
                    </div>
                      
                      <!-- Company Rating -->
                      <div class="card-job-details">
                        <p class="card-company-location">
                          <i class="fa fa-map-marker" aria-hidden="true"></i> 
                          '.$job_district.'
                        </p>
                        
                      
                      <p class="card-role-type">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        '.$job_nature.'
                      </p>
                           
                      
                      <p class="card-job-duration">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> 
                        <span>'.$interval->days.' days left</span>
                      </p>
                        
                     
                      
                      <p class="card-salary-range">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        '.$salary_show.'
                      </p>
                        
                      </div>  
                      <div class="card-job-summary">
                            <p class="card-text">'.$job_description.'</p>
                      </div>
                      
                      <a href="'.$job_single_url.'" class="btn btn-primary">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        View Job
                      </a>
                      
                   
                    </div>
                  </div>                                
                </div>
                ';
            }
        }
        echo $output;
    }

    public function single_job()
    {
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
        }
        $job_id = $_GET['job_id'];

        $job_details = $this->main_model->get_job_details_by_jobid($job_id);

        $data = array();
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;
        $data['job_details'] = $job_details;

        $this->load->view('template/header' , $data);
        $this->load->view('site/job_single');
        $this->load->view('template/footer');

    }

    public function load_job_list(){
        $this->load->library('pagination');
        $data = array();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
        }

        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;

        $cat = $this->uri->segment(3);
        $locate = $this->uri->segment(4);

        $this->load->database();
        $category = $this->postClean($cat);
        $location = $this->postClean($locate);

        $category = 0;
        $location = 0;

        /*if($cat != 0){
            $category = $this->main_model->get_location_by_id($category);
        }
        if($locate != 0){
            $location = $this->main_model->get_location_by_id($location);
        }*/

/*        $config = array();
        $config["base_url"] = base_url() . "index.php/home/load_job_list/".$category."/".$location;
        $config["total_rows"] = $this->main_model->get_count($category,$location);
        $config["per_page"] = 2;
        $config["num_links"] = 2;
        $config["uri_segment"] = 6;

        $this->pagination->initialize($config);
        //$page = ($this->uri->segment(9)) ? $this->uri->segment(9) : 0;

        $data["links"] = $this->pagination->create_links();
        $data['jobs'] = $this->main_model->get_jobs($config["per_page"], $this->uri->segment(6), $category, $location);
*/
        $config = array();
        $config["base_url"] = base_url() . "index.php/home/load_job_list";
        $config["total_rows"] = $this->main_model->get_count();
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['authors'] = $this->main_model->get_jobs($config["per_page"], $page);



        $this->load->view('template/header' , $data);
        $this->load->view('site/featured_jobs');
        $this->load->view('template/footer');

    }

    function postClean($para) {
        $cleanPara = $this->security->xss_clean($para);     //XSS Filtering
        $sanitizePara = $this->security->sanitize_filename($cleanPara, TRUE); //sanitize them to prevent directory traversal and other security related issues
        return $sanitizePara;
    }

    public function Apply_the_job(){

        $job_id = $this->input->post('hidden_job_id');
        $user_name = $this->input->post('hidden_user_name');
        $name = $this->input->post('hidden_user_loggedname');

        $Job_provider_email = $this->main_model->get_job_provider_email_by_job_id($job_id);
       // $this->send_email_to_the_job_admin($Job_provider_email, $job_id);
        //print_r($Job_provider_email); die();

        if($user_name != "NA"){
            $user_status = $this->main_model->check_already_logged_in_user($user_name,$name);
            if($user_status == 1){ //1 - signed
                $status = $this->save_job_applicant($job_id,$user_status,$user_name);
                if($status){
                    $data = array(
                        'status' => 1,
                        'msg' => "Your job application is successful"
                    );
                    echo json_encode($data);
                }
            }else if($user_status == 2){  //2 - profile created
                $status = $this->save_job_applicant($job_id,$user_status,$user_name);
                if($status){
                    $data = array(
                        'status' => 2,
                        'msg' => "profile not created"
                    );
                    echo json_encode($data);
                }
            }
        }else{
            // 0 - user not signed in
            // redirect to login page
            $data = array(
                'status' => 3,
                'msg' => "not signed in"
            );

            echo json_encode($data);
        }
    }

    function save_job_applicant($job_id,$user_status,$user_name){

       // $Check_applied = $this->check_applied_b4($user_name);
        $currentTimestamp = time();
        $date_created = date('Y-m-d');
        $datetime = date('Y-m-d H:i:s');
        $this->load->database();
        $user_id = $this->main_model->get_user_id_by_username($user_name);

        $data = array(
            'job_id' => $job_id,
            'applicant_name'=>$user_name,
            'applicant_name'=> $user_name,
            'applicant_user_id'=>$user_id,
            'created_date'=>$date_created,
            'created_on' =>$datetime,
            'status'=>1
        );

        $this->db->insert('job_applicant',$data);
        return $this->db->insert_id();

    }

    Public function check_applied_b4($user_name){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('job_applicant');
        $this->db->where('applicant_name',$user_name);
        $result = $this->db->get()->num_rows();
        return $result;
    }

    public function create_profile()
    {
        $data = array();
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;

        $this->load->view('template/header' , $data);
        $this->load->view('site/profile');
        $this->load->view('template/footer');

    }

    public function create_profile_new()
    {
        $data = array();
        $user_id = $_GET['uid'];
        $profile_details = $this->main_model->get_all_profile_details($user_id);
//        print_r($profile_details); die();
//        $profile_stat = $profile_details[0]->profile_step;
        if(!empty($profile_details)){
            $profile_stat = $profile_details[0]->profile_step;
            $data['profile_info'] = $profile_details;
            $data['prof_status'] = $profile_stat;
        }else{
            $data['profile_info'] = "NA";
        }
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;
        $data['all_districts'] = $this->admin_model->get_all_districts();

        $this->load->view('template/header' , $data);
        $this->load->view('site/profile_view');
        $this->load->view('template/footer');

    }



    public function create_basic_profile()
    {

        $data = array();
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;

        $this->load->view('template/header' , $data);
        $this->load->view('site/basic_profile');
        $this->load->view('template/footer');

    }


    public function get_latest_profile_id(){
        $this->load->database();
        $this->db->select('jobseeker_id');
        $this->db->from('job_seeker');
        $this->db->order_by('jobseeker_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query){
            $result=$query->row()->jobseeker_id;
        }
        return $result;

    }

    public function save_basic_profile(){
        $id = $_SESSION['id'];
        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $today = date("Ymd");

        $name = $this->input->post('name');
        $nic = $this->input->post('nic');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $dob = $this->input->post('dob');

        $cur_id = (int)$this->get_latest_profile_id();
        $ref_no = $cur_id+1;

        $date_timestamp = strtotime($datetime);
        $file_name = $date_timestamp.'-pf_'.$ref_no;
        $file_name2 = $date_timestamp.'-cv_'.$ref_no;


        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('nic', 'NIC', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        //$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
            //echo json_encode(array("status" => 2, "msg" => "Some fields are empty"));
//            echo json_encode(array("status" => 2, "msg" => validation_errors('Error : ' )));
            return;
        } else {

            $config['file_name'] = $file_name;
            $config['upload_path'] = './uploads/profile_pic';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $config2['file_name'] = $file_name2;
            $config2['upload_path'] = './uploads/cv';
            $config2['allowed_types'] = 'pdf|doc|docx';
            $config2['max_size'] = 2048;

            //////////////////////////////////////

// First File Upload
            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('profile_img')) {
                // Handle upload failure
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                // Upload successful
                $upload_data = $this->upload->data();
                $file_name_of_second = $upload_data['file_name'];
                $extension = pathinfo($file_name_of_second, PATHINFO_EXTENSION);
                $file_name = $file_name . '.' . $extension;
            }

// Second File Upload
            $this->load->library('upload');
            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('upload_file_cv')) {
                // Handle upload failure
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                // Upload successful
                $upload_data2 = $this->upload->data();
                $file_name_of_second2 = $upload_data2['file_name'];
                $extension2 = pathinfo($file_name_of_second2, PATHINFO_EXTENSION);
                $file_name2 = $file_name2 . '.' . $extension2;
            }


            $data = array(
                'user_id' =>$id,
                'full_name' => $name,
                'nic' => $nic,
                'phone' => $phone,
                'email' =>$email,
                'gender' =>$gender,
                'nationality'=> $phone,
                'dob' => $dob,
                'expect_salary' => "NA",
                'profile_pic'=>$file_name,
                'cv'=>$file_name2,
                'created'=>$datetime,
                'function'=>1,
                'status' =>1
            );

            $insert_status = $this->main_model->create_basicprofile($data, 'job_seeker');

            if ($insert_status) {
                $update = $this->main_model->update_profile_status($id,1);
                echo json_encode(array("status" => 1, "msg" => "Created Successfully", "profile_id" =>$insert_status));
            } else {
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function validate_nic($nic)
    {
        // Define the regex patterns for old and new NIC formats
        $old_nic_pattern = '/^\d{9}[vVxX]$/';
        $new_nic_pattern = '/^\d{12}$/';

        // Check if the NIC matches either of the patterns
        if (preg_match($old_nic_pattern, $nic) || preg_match($new_nic_pattern, $nic)) {
            return TRUE;
        } else {
            // Set the error message
            $this->form_validation->set_message('validate_nic', 'The {field} field must contain a valid NIC number.');
            return FALSE;
        }
    }



    public function save_profile_ols(){
        $id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($id);

    $this->load->library('form_validation');
    $this->load->database();
    date_default_timezone_set('Asia/Colombo');
    $datetime = date('Y-m-d H:i:s');
    $today = date("Y-m-d");

    $maths = $this->input->post('maths');
    $english = $this->input->post('english');
    $science = $this->input->post('science');
    $history = $this->input->post('history');
    $language = $this->input->post('language');

        $this->form_validation->set_rules('maths', 'Mathamatics Result', 'trim|required');
        $this->form_validation->set_rules('english', 'English Result', 'trim|required');
        $this->form_validation->set_rules('science', 'Science Result', 'trim|required');
        $this->form_validation->set_rules('history', 'History Result', 'trim|required');
        $this->form_validation->set_rules('language', 'Language Result', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
        echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
        return;
    } else {
        $data = array(
            'profile_id'=> $profile_id,
            'maths' => $maths,
            'english' => $english,
            'science' => $science,
            'history' =>$history,
            'language' =>$language
        );
        $insert_status = $this->main_model->save_ol_result($data, 'jobseeker_ol');

        if ($insert_status) {
            echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
        } else {
            echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
            $error = $this->db->error();
            log_message('error', $error['message']);
        }
        }
    }

    public function save_profile_Als(){
        $id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($id);

        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $today = date("Y-m-d");

        $Stream = $this->input->post('Stream');
        $sub1 = $this->input->post('subject1');
        $sub2 = $this->input->post('subject2');
        $sub3 = $this->input->post('subject3');

        $subject1_result= $this->input->post('subject1_result');
        $subject2_result = $this->input->post('subject2_result');
        $subject3_result = $this->input->post('subject3_result');


        $this->form_validation->set_rules('Stream', 'Stream', 'trim|required');
        $this->form_validation->set_rules('subject1', 'Subject 1', 'trim|required');
        $this->form_validation->set_rules('subject1_result', 'Subject 1 Result', 'trim|required');
        $this->form_validation->set_rules('subject2', 'Subject 2', 'trim|required');
        $this->form_validation->set_rules('subject2_result', 'Subject 2 Result', 'trim|required');
        $this->form_validation->set_rules('subject3', 'Subject 3', 'trim|required');
        $this->form_validation->set_rules('subject3_result', 'Subject 3 Result', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
            return;
        } else {
            $data = array(
                'profile_id'=> $profile_id,
                'subject1' => $sub1,
                'subject1_result' => $subject1_result,
                'subject2' => $sub2,
                'subject2_result' =>$subject2_result,
                'subject3' => $sub3,
                'subject3_result' =>$subject3_result,
                'stream' =>$Stream,
            );
            //print_r($data); die();
            $insert_status = $this->main_model->save_ol_result($data, 'jobseeker_al');

            if ($insert_status) {
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            } else {
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function save_hnd(){
        $this->load->library('form_validation');
        $user_id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($user_id);
        $number = count($this->input->post('hnd_name'));

        $hnd_names = $this->input->post('hnd_name');
        $hnd_institutes = $this->input->post('hnd_institute');

        $this->form_validation->set_rules('hnd_name[]', 'HND Name', 'trim|required');
        $this->form_validation->set_rules('hnd_institute[]', 'Institute', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('Error :' )));
            return;
        }else{
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["hnd_name"][$i]) != '') {
                    $sql = "INSERT INTO jobseeker_hnd (profile_id,user_id,hnd_name,hnd_institute)  VALUES ('" . $profile_id . "','" . $user_id . "','" . $_POST["hnd_name"][$i] . "','" . $_POST["hnd_institute"][$i] . "')";
                    $insert_success = $this->db->query($sql);
                }
            }

        if($insert_success){
            echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
            echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
            $error = $this->db->error();
            log_message('error', $error['message']);
            }
        }
    }


    public function save_bachelor(){
        $this->load->library('form_validation');
        $user_id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($user_id);
        $number = count($this->input->post('degree_name'));

        $degree_name = $this->input->post('degree_name');
        $degree_institute = $this->input->post('degree_institute');

        $this->form_validation->set_rules('degree_name[]', 'Degree Name', 'trim|required');
        $this->form_validation->set_rules('degree_institute[]', 'Institute', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('Error :' )));
            return;
        }else{
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["degree_name"][$i]) != '') {
                    $sql = "INSERT INTO jobseeker_degree (profile_id,user_id,degree_name,degree_institute)  VALUES ('" . $profile_id . "','" . $user_id . "','" . $_POST["degree_name"][$i] . "','" . $_POST["degree_institute"][$i] . "')";
                    $insert_success = $this->db->query($sql);
                }
            }

            if($insert_success){
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function save_master(){
        $this->load->library('form_validation');
        $user_id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($user_id);
        $number = count($this->input->post('masters_name'));

        $masters_name = $this->input->post('masters_name');
        $masters_degree_institute = $this->input->post('masters_degree_institute');

        $this->form_validation->set_rules('masters_name[]', 'Maters Title', 'trim|required');
        $this->form_validation->set_rules('masters_degree_institute[]', 'Institute', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('Error :' )));
            return;
        }else{
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["masters_name"][$i]) != '') {
                    $sql = "INSERT INTO  jobseeker_masters (profile_id,user_id,master_name,master_institiute)  VALUES ('" . $profile_id . "','" . $user_id . "','" . $_POST["masters_name"][$i] . "','" . $_POST["masters_degree_institute"][$i] . "')";
                    $insert_success = $this->db->query($sql);
                }
            }

            if($insert_success){
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function save_phd(){
        $this->load->library('form_validation');
        $user_id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($user_id);
        $number = count($this->input->post('phd_name'));

        $phd_name = $this->input->post('phd_name');
        $phd_degree_institute = $this->input->post('phd_degree_institute');

        $this->form_validation->set_rules('phd_name[]', 'Title', 'trim|required');
        $this->form_validation->set_rules('phd_degree_institute[]', 'Institute', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('Error :' )));
            return;
        }else{
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["phd_name"][$i]) != '') {
                    $sql = "INSERT INTO  jobseeker_phd (profile_id,user_id,phd_name,phd_institute)  VALUES ('" . $profile_id . "','" . $user_id . "','" . $_POST["phd_name"][$i] . "','" . $_POST["phd_degree_institute"][$i] . "')";
                    $insert_success = $this->db->query($sql);
                }
            }

            if($insert_success){
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function save_qualification(){
        $this->load->library('form_validation');
        $user_id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($user_id);
        $number = count($this->input->post('designation'));

        $designation = $this->input->post('designation');
        $company_name = $this->input->post('company_name');
        $duration = $this->input->post('duration');

        $this->form_validation->set_rules('designation[]', 'Designation', 'trim|required');
        $this->form_validation->set_rules('company_name[]', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('duration[]', 'Duration', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('Error :' )));
            return;
        }else{
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["designation"][$i]) != '') {
                    $sql = "INSERT INTO  seeker_qualification (profile_id,user_id,designation,company,duration)  VALUES ('" . $profile_id . "','" . $user_id . "','" . $_POST["designation"][$i] . "','" . $_POST["company_name"][$i] . "','" . $_POST["duration"][$i] . "')";
                    $insert_success = $this->db->query($sql);
                }
            }
            if($insert_success){
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }

        }

    }

    public function save_preferences(){
        $id = $_SESSION['id'];
        $profile_id = $this->main_model->get_profileid_by_user_id($id);
        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $today = date("Ymd");

        $job_type = $this->input->post('job_type');
        $job_nature = $this->input->post('job_nature');
        $jb_district = $this->input->post('jb_district');
        $exp_salary = $this->input->post('exp_salary');


        $this->form_validation->set_rules('job_type', 'Job Type', 'trim|required');
        $this->form_validation->set_rules('job_nature', 'Job Nature', 'trim|required');
        $this->form_validation->set_rules('jb_district', 'District', 'trim|required');
        $this->form_validation->set_rules('exp_salary', 'Salary', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
            return;
        } else {
            $data = array(
                'user_id'=>$id,
                'profile_id'=>$profile_id,
                'job_type'=>$job_type,
                'job_nature'=>$job_nature,
                'jb_district'=>$jb_district,
                'exp_salary'=>$exp_salary,
                'status'=>1
            );
            $insert_status = $this->main_model->insert_preference($data, 'jobseeker_preference');

            if ($insert_status) {
                $update = $this->main_model->update_profile_status($id,1);
                echo json_encode(array("status" => 1, "msg" => "Created Successfully", "profile_id" =>$insert_status));
            } else {
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function serach_jobs(){
        $this->load->database();
        $keyword = $this->input->post('search');


        $this->db->select('A.* , B.company_logo, C.district');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('job_district AS C' , 'A.job_district = C.district_id ' , 'left');
        $this->db->like('A.job_title', $keyword);
        $query = $this->db->get();
        $data['search_result'] =  $query->result('array');


        $this->load->view('template/header' , $data);
        $this->load->view('site/search');
        $this->load->view('template/footer');

    }


    //Add complaint function

    public function add_complaint(){
        $data = array();
        $all_categories = $this->main_model->get_all_job_categories();
        $data['cat'] = $all_categories;

        $this->load->view('template/header' , $data);
        $this->load->view('site/complaint');
        $this->load->view('template/footer');
    }

    public function submitcomplain(){

        $name = $this->input->post('user');
        $com = $this->input->post('com');
        $datetime = date('Y-m-d H:i:s');

        $data = array(
            'name'=>$name,
            'com'=>$com,
            'time'=>$datetime
        );


        $result = $this->db->insert('complaint', $data);
        if($result){
            echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
        }

    }

    public function send_email_to_the_job_admin($Job_provider_email, $job_id){
        $config['mailtype'] = 'html';
        $config['charset']  = 'iso-8859-1';
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'frenzy.lanka.info';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '5';
        $config['smtp_user']    = 'hnbshop@kapruka.com';
        $config['smtp_pass']    = 'Gbsd$#323Fs^';
        $config['priority'] = 3;
        $config['wordwrap'] = TRUE;

        $your_message = 'New Application has been sent for the Job oppertunity - '.$job_id;

        $html_content = '<p  border ="0" width ="95%"> Dear Admin, <br><br>'.$your_message.'.';

        $this->email->initialize($config);
        $this->email->from('hnbshop@kapruka.com','Smart Job portal');
        $this->email->to($Job_provider_email);
        $this->email->subject('New Job application - '.$job_id);
        $this->email->message($html_content);

        if ($this->email->send()) {
            //echo 'Email sent successfully';
        } else {
            show_error($this->email->print_debugger());
        }

    }



}
