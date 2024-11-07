<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('loginmodel');
//        $this->load->model('cart_model');
	}

	public function index()
	{
		$this->load->view('admin_views/login_view');
	}

	//Admin login functions

	public function log()
    {
        $this->load->library('form_validation');
        $url = "NA";
        $un = $this->input->post('user_name');
        $pw = $this->input->post('pw');

        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('pw', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE){
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color:#F64D27;"><i class="fa fa-exclamation" aria-hidden="true"></i> ', '</span><br>')));
            return;
        }else{
            $query = $this->loginmodel->validate_user($un,$pw);

            $admin_url_1 = base_url().'index.php/admin/create_profile';
            $admin_url_2 = base_url().'index.php/admin/new_dashboard';

            $seeker_url_1 = base_url().'index.php/home/home_pg';
            //$seeker_url_2 = base_url().'index.php/home/';

            if ($query) {
                $id = $query[0]->user_id;
                $type = $query[0]->usertype;
                $name = $query[0]->name;
                $user_name = $query[0]->user_name;
                $usertype = $query[0]->usertype;

                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'user_type' => $type,
                    'user_name' => $user_name,
                    'user_cat' => $usertype,
                    'is_login' => TRUE
                );

                //print_r($data); die();

                $this->session->set_userdata($data);

                if($usertype == "job_provider"){
                    $check_profile = $this->loginmodel->check_created_job_provider_profiles($id);
                    if($check_profile == 0){
                        echo json_encode(array("status" => 1, "profile_status" => 0 , "name"=>$name , "url"=>$admin_url_1 , "data"=>$data));
                    }else if($check_profile != 0){
                        echo json_encode(array("status" => 1, "profile_status" => 0 , "name"=>$name , "url"=>$admin_url_2 , "data"=>$data));
                    }
                }else if($usertype == "job_seeker"){
                    $check_profile = $this->loginmodel->check_created_job_job_seeker($id);
                    if($check_profile == 0){
                        echo json_encode(array("status" => 1, "profile_status" => 0 , "name"=>$name , "url"=>$seeker_url_1 , "data"=>$data));
                    }else if($check_profile == 1){
                        $profile_detail = $this->loginmodel->get_created_job_provider_profiles_details($id);
                        $profile_step = $profile_detail[0]->profile_step;
                        echo json_encode(array("status" => 1, "profile_status" => 0 , "name"=>$name , "url"=>$seeker_url_1 , "data"=>$data , "profile_step"=>$profile_step));
                    }
                }

            } else {
                $this->session->sess_destroy();
//                $data['page'] = 'logout';
//                $data['message'] = "Please enter the Correct Username and Password";
//                $this->load->view('site/login', $data);
                $fail_url = base_url().'index.php/login/logout';
                echo json_encode(array("status" => 2 , "url"=>$fail_url , "msg"=>"Please enter correct values"));
            }

        }
    }

	public function logout(){
        $data = array();
        $user_type = $this->session->userdata('user_type');
        if($user_type == 1 || $user_type == 2){
            $data['title'] = "Samart Job Portal - Admin Panel";
        }if($user_type == 3){
            $data['title'] = "Samart Job Portal";
        }
		$this->session->sess_destroy();

		$data['page'] = 'logout';
		$data['message'] = "You have successfully logged out";
		$this->load->view('site/login', $data);
	}
	//End of Admin Login function

	//User Login Functions

    public function login_page_load(){
        //$cat_from_db = json_encode($this->product_model->get_all_categories());
        //$data['cat_from_db'] = $cat_from_db;
        $data =array();
        $data['message'] = '';
        $this->load->view('site/login', $data);

    }

    public function sign_up(){
        //$cat_from_db = json_encode($this->product_model->get_all_categories());
        //$data['cat_from_db'] = $cat_from_db;
        $data =array();
        $data['message'] = '';
        $this->load->view('site/sign_up', $data);

    }

    public function signup_with_site(){
        $this->load->library('form_validation');
        $datetime = date('Y-m-d H:i:s');
        $un = $this->input->post('email');

        $checked =   $this->check_email($un);

        if($checked == 1){
            echo json_encode(array("status" => 2, "msg" => "Email Already registered"));
            return;
        }else{
            //        if (!empty($_POST["email"]) || !empty($_POST["pw"] )) {

            $pw = $this->input->post('pw');
            $user_type = $this->input->post('user_type');

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('pw', 'Password', 'trim|required');
            $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');

            if($this->form_validation->run() == FALSE){
                echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color:#F64D27;"><i class="fa fa-exclamation" aria-hidden="true"></i> ', '</span><br>')));
                return;
            }else{
                $data = array(
                    'name' => $un,
                    'user_name' => $un,
                    'user_type'=>3,
                    'usertype'=>$user_type,
                    'profile_status'=>1,
                    'password'=> md5($pw),
                    'created_date'=>$datetime,
                    'status'=> 1
                );

                $insert_user = $this->db->insert("user", $data);
                if($insert_user){
                    echo json_encode(array("status" => 1, "msg" => "user Created Successfully"));
                }else{
                    echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                }
            }
//        }else{
//            echo json_encode(array("status" => 2, "msg" => "Please fill all the fields"));
//        }
        }

    }

    function check_email($un){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name',$un);

        $result = $this->db->get()->num_rows();;

        return $result;
    }

    public function login_to_site(){
        if (!empty($_POST["user_name"]) || !empty($_POST["pw"] )) {
            $un = $this->input->post('user_name');
            $pw = $this->input->post('pw');

            $query = $this->loginmodel->validate_user($un,$pw);


            if($query){
                $type = $query[0]->user_type;
                If($type == 5){
                    $user_id  = $query[0]->user_id;
                    $data = array();

                    $data = array(
                        'id' => $user_id,
                        'name' => $query[0]->name,
                        'email' =>$query[0]->email,
                        'user_type' =>$query[0]->user_type,
                        'is_login' => TRUE
                    );
                    $this->session->set_userdata($data);

//                    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
//$redirect = base_url('/index.php/admin/dashboard');
//print_r($redirect); die();
//                    $this->load->view('templates/header');
//                    $this->load->view('site/home', $data1);
//                    $this->load->view('templates/footer');
                    redirect(base_url() . '/index.php/admin/dashboard', 'refresh');

                }

            }else{
                echo "fff";
                $this->session->sess_destroy();
                $data = array();
                //$data['page'] = 'logout';
                $data['message'] = 'Invalid Credentials';

                $this->load->view('templates/header');
                $this->load->view("login/login_pg", $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->sess_destroy();
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = ' ';

            $this->load->view('templates/header');
            $this->load->view("login/login_pg", $data);
            $this->load->view('templates/footer');
        }
    }










}
