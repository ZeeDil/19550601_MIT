<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model("admin_model");
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}



    //////////////////////////////////new UI - Dilshan 20/05/24 -----//////////////////////////////////////////

    public function new_dashboard(){
        $data = array();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
            $this->load->view('admin/new/header' , $data);
            $this->load->view('admin/new/dashboard_new');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function new_profile(){
        if (isset($_SESSION['is_login'])) {
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['logged_in_name'] = $_SESSION['name'];

            $this->load->view('admin/new/header' , $data);
            $this->load->view('admin/new/create_profile');

        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function new_company(){
        if (isset($_SESSION['is_login'])) {
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_districts'] = $this->admin_model->all_job_districts();
            $data['logged_in_name'] = $_SESSION['name'];

            $this->load->view('admin/new/header' , $data);
            $this->load->view('admin/new/create_company');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function new_create_job(){
        if (isset($_SESSION['is_login'])) {
            $id = $_SESSION['id'];
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_companies'] = $this->admin_model->all_job_companies_by_id($id);
            $data['all_cities'] = $this->admin_model->get_all_cities();
            $data['all_districts'] = $this->admin_model->all_job_districts();
            $data['logged_in_name'] = $_SESSION['name'];
            $dat['complaints'] = $this->getcomplaints();

            $this->load->view('admin/new/header' , $data);
            $this->load->view('admin/new/create_job');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function new_view_applicants(){
        if (isset($_SESSION['is_login'])) {
            $datetime = date('Y-m-d H:i:s');
            $id = $_SESSION['id'];
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_districts'] = $this->admin_model->all_job_districts();
            $data['logged_in_name'] = $_SESSION['name'];
            $data['id'] = $id;
            $data['jobs_of_the_user'] =  $this->admin_model->get_jobs_of_the_provider($id);
            $data['last_applied_user_count'] =  $this->admin_model->get_last_applied_users($id);

            $this->load->view('admin/new/header' , $data);
            $this->load->view('admin/new/view_applicants');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function test(){
        $this->load->view('admin/new/test');
    }

//////////////////////////////////new UI - Dilshan 20/05/24 End -----//////////////////////////////////////////

    public function dashboard(){
        $data = array();
        if (isset($_SESSION['is_login'])) {
            $data['logged_in_name'] = $_SESSION['name'];
            $this->load->view('admin/template/header' , $data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/dashboard');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }

//        $this->load->view('admin/template/footer');
    }

    public function create_job(){
        if (isset($_SESSION['is_login'])) {
        $id = $_SESSION['id'];
        $data['all_categories'] = $this->admin_model->all_job_categories();
        $data['all_companies'] = $this->admin_model->all_job_companies_by_id($id);
        $data['all_cities'] = $this->admin_model->get_all_cities();
        $data['logged_in_name'] = $_SESSION['name'];
        $dat['complaints'] = $this->getcomplaints();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/create_job');
//        $this->load->view('admin/template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function getcomplaints(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('complaint');
        $query= $this->db->get();
        if($query){
            $result = $query->result();
        }
        return $result;
    }

    public function create_company(){
        if (isset($_SESSION['is_login'])) {
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_districts'] = $this->admin_model->all_job_districts();
            $data['logged_in_name'] = $_SESSION['name'];

            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/create_company');
//        $this->load->view('admin/template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function view_applicants(){
        if (isset($_SESSION['is_login'])) {
            $datetime = date('Y-m-d H:i:s');
            $id = $_SESSION['id'];
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_districts'] = $this->admin_model->all_job_districts();
            $data['logged_in_name'] = $_SESSION['name'];
            $data['id'] = $id;
            $data['jobs_of_the_user'] =  $this->admin_model->get_jobs_of_the_provider($id);
            $data['last_applied_user_count'] =  $this->admin_model->get_last_applied_users($id);

            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/view_applicant');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }



//    functions codes

    public function save_job(){
        $id = $_SESSION['id'];
        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $today = date("Ymd");

        $job_title = $this->input->post('jb_title');
        $job_vacancy = $this->input->post('no_of_vacancies');
        $job_description = $this->input->post('jb_description');
        $job_type = $this->input->post('jb_type');
        $job_company = $this->input->post('jb_company');
        $job_nature = $this->input->post('jb_nature');
        $job_exp = $this->input->post('job_exp');
        $job_cat = $this->input->post('jb_cat');
        $job_district = $this->input->post('jb_district');
        $sal_from = $this->input->post('sal_from');
        $sal_to = $this->input->post('sal_to');

        $last_inserted_jobid = (int)$this->admin_model->get_last_inserted_job_id();
        $new_num = $last_inserted_jobid+1;
        $job_code = 'JOB_0000'.$new_num;
        $date_timestamp = strtotime($datetime);
        $file_name = $date_timestamp.'-ad_'.$new_num;


        $this->form_validation->set_rules('jb_title', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('no_of_vacancies', 'Number of Vacancies', 'trim|required');
        $this->form_validation->set_rules('jb_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('jb_type', 'Job Type', 'trim|required');
        $this->form_validation->set_rules('jb_nature', 'Job Nature', 'trim|required');
        $this->form_validation->set_rules('jb_district', 'District', 'trim|required');
        $this->form_validation->set_rules('job_exp', 'Job Expire date', 'trim|required');
        $this->form_validation->set_rules('jb_cat', 'Job Category', 'trim|required');
        $this->form_validation->set_rules('jb_company', 'Company', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
            //echo json_encode(array("status" => 2, "msg" => "Some fields are empty"));
//            echo json_encode(array("status" => 2, "msg" => validation_errors('Error : ' )));
            return;
        } else {

            $config['file_name'] = $file_name;
            $config['upload_path'] = './uploads/job_add';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('jb_img')) {
                // Handle upload failure
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                // Upload successful
                $upload_data = $this->upload->data();
                $file_name_of_second = $upload_data['file_name'];
                $extension = pathinfo($file_name_of_second, PATHINFO_EXTENSION);
                $file_name = $file_name . '.' . $extension;

                // You can access file information in $data array
                // Insert database record, if needed
                // Redirect or display a success message
            }

            $data = array(
                'job_title' => $job_title,
                'job_code' => $job_code,
                'job_vacancy' => $job_vacancy,
                'job_description' => $job_description,
                'job_category'=>$job_cat,
                'job_image' =>$file_name,
                'job_type' => $job_type,
                'job_nature' => $job_nature,
                'job_company'=>$job_company,
                'job_district' => $job_district,
                'job_country'=> "LK",
                'expire_date' => $job_exp,
                'salary_min' =>$sal_from,
                'salary_max'=>$sal_to,
                'status'=>1,
                'created_date'=>$datetime
            );
            $insert_status = $this->admin_model->create_job_oppertunity($data, 'job_table');

            $ol = $this->input->post('ol') ? 1 : 0;
            $al = $this->input->post('al') ? 1 : 0;
            $hnd = $this->input->post('hnd') ? 1 : 0;
            $degree = $this->input->post('degree') ? 1 : 0;
            $masters = $this->input->post('masters') ? 1 : 0;
            $phd = $this->input->post('phd') ? 1 : 0;
            $expyears= $this->input->post('exp_years');

            $additional_array = array(
                'job_id'=>$insert_status,
                'ol'=>$ol,
                'Al'=>$al,
                'HND_level'=>$hnd,
                'Degree_level'=>$degree,
                'master_level'=>$masters,
                'phd_level'=>$phd,
                'experience_years'=>$expyears
            );

            if($insert_status){
                $additional = $this->save_Additional_job_requirements($additional_array);
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function save_Additional_job_requirements($additional_array){
        $this->db->insert("job_preferences", $additional_array);
        //return $this->db->insert_id();
    }

    public function save_job2(){
        $id = $_SESSION['id'];
        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $today = date("Ymd");

        $job_title = $this->input->post('jb_title');
        $job_vacancy = $this->input->post('no_of_vacancies');
        $job_description = $this->input->post('jb_description');
        $job_type = $this->input->post('jb_type');
        $job_company = $this->input->post('jb_company');
        $job_nature = $this->input->post('jb_nature');
        $job_exp = $this->input->post('job_exp');
        $job_cat = $this->input->post('jb_cat');
        $jb_city = $this->input->post('jb_city');
        $sal_from = $this->input->post('sal_from');
        $sal_to = $this->input->post('sal_to');
        $job_country = "LK";

        $last_inserted_jobid = (int)$this->admin_model->get_last_inserted_job_id();
        $new_num = $last_inserted_jobid+1;
        $job_code = 'JOB_0000'.$new_num;
        $date_timestamp = strtotime($datetime);
        $file_name = $date_timestamp.'-ad_'.$new_num;

        $this->form_validation->set_rules('jb_title', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('no_of_vacancies', 'Number of Vacancies', 'trim|required');
        $this->form_validation->set_rules('jb_description', 'Job Description', 'trim|required');
        $this->form_validation->set_rules('jb_type', 'Job Type', 'trim|required');
        $this->form_validation->set_rules('jb_nature', 'Job Nature', 'trim|required');
        //$this->form_validation->set_rules('jb_district', 'District', 'trim|required');
        $this->form_validation->set_rules('job_exp', 'Job Expire date', 'trim|required');
        $this->form_validation->set_rules('jb_cat', 'Job Category', 'trim|required');
        $this->form_validation->set_rules('jb_company', 'Company', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg" style="color: red;">', '</span></br>')));
            //echo json_encode(array("status" => 2, "msg" => "Some fields are empty"));
//            echo json_encode(array("status" => 2, "msg" => validation_errors('Error : ' )));
            return;
        } else {

            $config['file_name'] = $file_name;
            $config['upload_path'] = './uploads/job_add';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('jb_img')) {
                // Handle upload failure
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                // Upload successful
                $upload_data = $this->upload->data();
                $file_name_of_second = $upload_data['file_name'];
                $extension = pathinfo($file_name_of_second, PATHINFO_EXTENSION);
                $file_name = $file_name . '.' . $extension;

                // You can access file information in $data array
                // Insert database record, if needed
                // Redirect or display a success message
            }

            $data = array(
                'job_title' => $job_title,
                'job_code' => $job_code,
                'job_vacancy' => $job_vacancy,
                'job_description' => $job_description,
                'job_category'=>$job_cat,
                'job_image' =>$file_name,
                'job_type' => $job_type,
                'job_nature' => $job_nature,
                'job_company'=>$job_company,
                'job_city' => $jb_city,
                'job_country'=> $job_country,
                'expire_date' => $job_exp,
                'salary_min' =>$sal_from,
                'salary_max'=>$sal_to,
                'status'=>1,
                'created_date'=>$datetime
            );
            $insert_status = $this->admin_model->create_job_oppertunity($data, 'job_table');
            if($insert_status){
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }


    public function jobs_jtable(){
//        $from = $_POST['from_date'];
//        $to = $_POST['to_date'];
//        $country = $_POST['country'];

        $this->load->database();
        $this->db->select('job_id');
        $this->db->from('job_table');
        $this->db->where('status', 1);
//        if((!empty($from)) && (!empty($to))){
//            $this->db->where('created_date >=', $from);
//            $this->db->where('created_date <=', $to);
//        }
        $this->db->order_by('job_id', 'DESC');
        $result = FALSE;
        $totalData = $this->db->count_all_results();
        if (!empty($query)) {
            $result = $query->result();
        }
        $totalFiltered = $totalData;
        $table_data = array();
        $q = '';
        if (!empty($totalData)) {
            $columns = array(
                // datatable column index  => database column name
                0 => 'job_id',
                1 => 'job_title',
                2 => 'job_description',
                3 => 'job_type',
                4 => 'job_nature',
                5 => 'status'
            );
            // filter
            $search = $this->input->post_get('search');
            $order = $this->input->post_get('order');
            $start = $this->input->post_get('start');
            $limit = $this->input->post_get('length');

            $this->db->select('*');
            $this->db->from('job_table');
            $this->db->order_by('job_id', 'DESC');
//            if((!empty($from)) && (!empty($to))){
//                $this->db->where('created_date >=', $from);
//                $this->db->where('created_date <=', $to);
//            }
            $this->db->where('status', 1);

            // if there is a search parameter, ['search']['value'] contains search parameter
            if (!empty($search['value'])) {
                $escaped_str = $this->db->escape_like_str($search['value']);
                $custom_like_query = "(job_title like '%" . $escaped_str . "%' OR job_description like '%" . $escaped_str . "%' OR job_type like '%" . $escaped_str . "%' OR job_nature like '%" . $escaped_str . "%')";
                $this->db->where($custom_like_query, null, FALSE);

            }
            $this->db->order_by($columns[$order[0]['column']], $order[0]['dir']);
            if (!empty($limit)) {
                $this->db->limit($limit, $start);
            }
            $query = $this->db->get();
             // print_r($this->db->last_query()); die();
            $result = FALSE;
            if (!empty($query)) {
                $result = $query->result();
            }
            if (!empty($search['value'])) {
                $totalFiltered = $query->num_rows();
            }

            if (!empty($result)) {
                foreach ($result as $row) {
                    $a = array();
                    $a[] = $row->job_id;
                    $a[] = $row->job_title;
                    $a[] = $row->job_description;
                    $a[] = $row->job_type;
                    $a[] = $row->job_nature;

                    $table_data[] = $a;
                }
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post_get('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $table_data
        );
//        return $result;
        echo json_encode($json_data);  // send data as json format
    }


    public function jobs_jtable_new(){
        $user_logged_in = $_SESSION['id'];
//        $from = $_POST['from_date'];
//        $to = $_POST['to_date'];
//        $country = $_POST['country'];

        $this->load->database();
        $this->db->select('A.job_id');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id ', 'left');
        $this->db->join('user AS C' , 'B.company_admin = C.user_id  ', 'left');
        $this->db->where('A.status', 1);
        $this->db->where('C.user_id', $user_logged_in);
//        if((!empty($from)) && (!empty($to))){
//            $this->db->where('created_date >=', $from);
//            $this->db->where('created_date <=', $to);
//        }
        $this->db->order_by('A.job_id', 'DESC');
        $result = FALSE;
        $totalData = $this->db->count_all_results();
        if (!empty($query)) {
            $result = $query->result();
        }
        $totalFiltered = $totalData;
        $table_data = array();
        $q = '';
        if (!empty($totalData)) {
            $columns = array(
                // datatable column index  => database column name
                0 => 'job_id',
                1 => 'job_title',
                2 => 'company_name',
                3 => 'job_type',
                4 => 'job_nature',
                5 => 'status'
            );
            // filter
            $search = $this->input->post_get('search');
            $order = $this->input->post_get('order');
            $start = $this->input->post_get('start');
            $limit = $this->input->post_get('length');

            $this->db->select('A.*, B.*');
            $this->db->from('job_table AS A');
            $this->db->order_by('A.job_id', 'DESC');
            $this->db->join('company AS B' , 'A.job_company = B.company_id ', 'left');
            $this->db->join('user AS C' , 'B.company_admin = C.user_id  ', 'left');
//            if((!empty($from)) && (!empty($to))){
//                $this->db->where('created_date >=', $from);
//                $this->db->where('created_date <=', $to);
//            }
            $this->db->where('A.status', 1);
            $this->db->where('C.user_id', $user_logged_in);

            // if there is a search parameter, ['search']['value'] contains search parameter
            if (!empty($search['value'])) {
                $escaped_str = $this->db->escape_like_str($search['value']);
                $custom_like_query = "(A.job_title like '%" . $escaped_str . "%' OR A.job_description like '%" . $escaped_str . "%' OR A.job_type like '%" . $escaped_str . "%' OR B.company_name like '%" . $escaped_str . "%' OR A.job_nature like '%" . $escaped_str . "%')";
                $this->db->where($custom_like_query, null, FALSE);

            }
            $this->db->order_by($columns[$order[0]['column']], $order[0]['dir']);
            if (!empty($limit)) {
                $this->db->limit($limit, $start);
            }
            $query = $this->db->get();
             //print_r($this->db->last_query()); die();
            $result = FALSE;
            if (!empty($query)) {
                $result = $query->result();
            }
            if (!empty($search['value'])) {
                $totalFiltered = $query->num_rows();
            }

            if (!empty($result)) {
                foreach ($result as $row) {
                    $a = array();
                    $a[] = $row->job_id;
                    $a[] = $row->job_title;
                    $a[] = $row->company_name;
                    $a[] = $row->job_type;
                    $a[] = $row->job_nature;

                    $table_data[] = $a;
                }
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post_get('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $table_data
        );
//        return $result;
        echo json_encode($json_data);  // send data as json format
    }

    //company functions

    public function save_company(){
        $this->load->library('form_validation');
        $id = $_SESSION['id'];
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');

        $company_name = $this->input->post('company_name');
        $file_name1 = preg_replace('/[^a-zA-Z0-9]/', '_', $company_name);
        $file_name = $file_name1.'_logo';
        $com_address = $this->input->post('com_address');
        $com_city = $this->input->post('com_city');
        $jb_cat =  $this->input->post('jb_cat');
        if(!empty($com_city)){
            $city = $com_city;
        }else{
            $city = "";
        }
        ;
        $com_phone = $this->input->post('com_phone');
        $com_email = $this->input->post('com_email');

        $this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
        $this->form_validation->set_rules('com_address', 'Comapny Address', 'trim|required');
        $this->form_validation->set_rules('com_phone', 'Company Phone', 'trim|required');
        $this->form_validation->set_rules('com_email', 'Company Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg">', '</span><br>')));
            //echo json_encode(array("status" => 2, "msg" => "Some fields are empty"));
//            echo json_encode(array("status" => 2, "msg" => validation_errors('Error : ' )));
            return;
        } else {
            $config['file_name'] = $file_name;
            $config['upload_path'] = './uploads/company_logo';
            $config['allowed_types'] = 'jpg|png|jpeg';
            //$config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('com_logo')) {
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

            $data = array(
                'category' => $jb_cat,
                'company_code' => "ABC",
                'company_name' => $company_name,
                'company_email' => $com_email,
                'company_phone'=>$com_phone,
                'address' =>$com_address,
                'location' =>$city,
                'company_logo' => $file_name,
                'company_admin'=> $id,
                'created' => $datetime,
                'status' => 1
            );
            $insert_status = $this->admin_model->create_company($data, 'company');
            if($insert_status){
               // print_r("1"); die();
                echo json_encode(array("status" => 1, "msg" => "Created Successfully"));
            }else{
                //print_r("2"); die();
                echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                $error = $this->db->error();
                log_message('error', $error['message']);
            }
        }
    }

    public function create_profile(){
        if (isset($_SESSION['is_login'])) {
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['logged_in_name'] = $_SESSION['name'];

            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/create_profile');
//        $this->load->view('admin/template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function create_job_provider_profile(){
        $this->load->library('form_validation');
        $this->load->database();
        date_default_timezone_set('Asia/Colombo');
        $datetime = date('Y-m-d H:i:s');
        $id = $_SESSION['id'];

        $name = $this->input->post('fname');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');


        $duplicate =  $this->admin_model->check_provider_profile_duplicates($email);
//        print_r($duplicate); die();
        if(!empty($duplicate)){
            echo json_encode(array("status" => 2, "msg" => "There is an existing account with this email."));
        }else{

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', ' Phone', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(array("status" => 2, "msg" => validation_errors('<span class="error-msg">', '</span><br>')));
                //echo json_encode(array("status" => 2, "msg" => "Some fields are empty"));
//            echo json_encode(array("status" => 2, "msg" => validation_errors('Error : ' )));
                return;
            } else {
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address'=>$address,
                    'user_id' =>$id,
                    'created' =>$datetime,
                    'status' => 1
                );
                $insert_status = $this->admin_model->create_jb_provider($data, 'job_provider');
                if($insert_status){
                    echo json_encode(array("status" => 1, "msg" => "Profile Created Successfully"));
                }else{
                    echo json_encode(array("status" => 2, "msg" => "Cannot Save"));
                    $error = $this->db->error();
                    log_message('error', $error['message']);
                }
            }

        }
    }


    function check_email($email){
        $this->db->select('*');
        $this->db->from('job_provider');
        $this->db->where('email',$email);

        $result = $this->db->get()->num_rows();;

        return $result;
    }

    public function create_job2(){
        if (isset($_SESSION['is_login'])) {
            $id = $_SESSION['id'];
            $data['all_categories'] = $this->admin_model->all_job_categories();
            $data['all_countries'] = $this->admin_model->all_job_countries();
            $data['all_companies'] = $this->admin_model->all_job_companies_by_id($id);
            $data['all_districts'] = $this->admin_model->get_all_districts();
            $data['logged_in_name'] = $_SESSION['name'];

            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/create_job_new');
//        $this->load->view('admin/template/footer');
        }else{
            $data = array();
            //$data['page'] = 'logout';
            $data['message'] = '';

            $this->load->view('site/login', $data);

        }
    }

    public function company_jtable(){
        $user_id = $_SESSION['id'];
        $this->load->database();
        $this->db->select('company_id');
        $this->db->from('company');
        $this->db->where('status', 1);
        $this->db->where('company_admin', $user_id);
        $this->db->where('status', 1);
        $this->db->order_by('company_id', 'DESC');
//        if((!empty($from)) && (!empty($to))){
//            $this->db->where('created_date >=', $from);
//            $this->db->where('created_date <=', $to);
//        }

        $result = FALSE;
        $totalData = $this->db->count_all_results();
        if (!empty($query)) {
            $result = $query->result();
        }
        $totalFiltered = $totalData;
        $table_data = array();
        $q = '';
        if (!empty($totalData)) {
            $columns = array(
                // datatable column index  => database column name
                0 => 'company_id',
                1 => 'company_name',
                2 => 'company_email',
                3 => 'company_phone',
                4 => 'status'
            );
            // filter
            $search = $this->input->post_get('search');
            $order = $this->input->post_get('order');
            $start = $this->input->post_get('start');
            $limit = $this->input->post_get('length');

            $this->db->select('*');
            $this->db->from('company');
            $this->db->where('status', 1);
            $this->db->where('company_admin', $user_id);
            $this->db->order_by('company_id', 'DESC');
            $this->db->where('status', 1);
//            if((!empty($from)) && (!empty($to))){
//                $this->db->where('created_date >=', $from);
//                $this->db->where('created_date <=', $to);
//            }
            // if there is a search parameter, ['search']['value'] contains search parameter
            if (!empty($search['value'])) {
                $escaped_str = $this->db->escape_like_str($search['value']);
                $custom_like_query = "(company_email like '%" . $escaped_str . "%' OR company_name like '%" . $escaped_str . "%' OR company_id like '%" . $escaped_str . "%' OR company_phone like '%" . $escaped_str . "%')";
                $this->db->where($custom_like_query, null, FALSE);

            }
            $this->db->order_by($columns[$order[0]['column']], $order[0]['dir']);
            if (!empty($limit)) {
                $this->db->limit($limit, $start);
            }
            $query = $this->db->get();
            //print_r($this->db->last_query()); die();
            $result = FALSE;
            if (!empty($query)) {
                $result = $query->result();
            }
            if (!empty($search['value'])) {
                $totalFiltered = $query->num_rows();
            }

            if (!empty($result)) {
                foreach ($result as $row) {
                    $a = array();
                    $a[] = $row->company_id;
                    $a[] = $row->company_name;
                    $a[] = $row->company_email;
                    $a[] = $row->company_phone;
                    $a[] = $row->status;
                    $table_data[] = $a;
                }
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post_get('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $table_data
        );
//        return $result;
        echo json_encode($json_data);  // send data as json format
    }

    public function applicant_jtable(){
        $job_id = $this->input->post('jod_id');
        $user_id = $_SESSION['id'];

        $this->load->database();
        $this->db->select('A.applicant_id');
        $this->db->from('job_applicant AS A');
        $this->db->join('job_seeker AS B', 'A.applicant_user_id = B.user_id', 'left');
        $this->db->join('job_table AS C', 'A.job_id = C.job_id' , 'left');
        $this->db->join('company AS D', 'D.company_id  = C.job_company' , 'left');
        $this->db->where('D.company_admin', $user_id);
        if($job_id != 0){
            $this->db->where('A.job_id', $job_id);
        }
        $this->db->order_by('A.applicant_id', 'DESC');
        $result = FALSE;
        $totalData = $this->db->count_all_results();
        if (!empty($query)) {
            $result = $query->result();
        }
        $totalFiltered = $totalData;
        $table_data = array();
        $q = '';
        if (!empty($totalData)) {
            $columns = array(
                // datatable column index  => database column name
                0 => 'applicant_id',
                1 => 'full_name',
                2 => 'job_code',
                3 => 'cv'
            );
            // filter
            $search = $this->input->post_get('search');
            $order = $this->input->post_get('order');
            $start = $this->input->post_get('start');
            $limit = $this->input->post_get('length');

            $this->db->select('A.applicant_id,B.full_name,C.job_code, B.cv');
            $this->db->from('job_applicant AS A');
            $this->db->join('job_seeker AS B', 'A.applicant_user_id = B.user_id', 'left');
            $this->db->join('job_table AS C', 'A.job_id = C.job_id' , 'left');
            $this->db->join('company AS D', 'D.company_id  = C.job_company' , 'left');
            $this->db->where('D.company_admin', $user_id);

            if($job_id != 0){
                $this->db->where('A.job_id', $job_id);
            }
            $this->db->order_by('A.applicant_id', 'DESC');
            // if there is a search parameter, ['search']['value'] contains search parameter
            if (!empty($search['value'])) {
                $escaped_str = $this->db->escape_like_str($search['value']);
                $custom_like_query = "(applicant_id like '%" . $escaped_str . "%' OR full_name like '%" . $escaped_str . "%' OR job_code like '%" . $escaped_str . "%' OR job_code like '%" . $escaped_str . "%')";
                $this->db->where($custom_like_query, null, FALSE);
            }
            $this->db->order_by($columns[$order[0]['column']], $order[0]['dir']);

            if (!empty($limit)) {
                $this->db->limit($limit, $start);
            }
            $query = $this->db->get();
            $result = FALSE;
            if (!empty($query)) {
                $result = $query->result();
            }
            if (!empty($search['value'])) {
                $totalFiltered = $query->num_rows();
            }

            if (!empty($result)) {
                $full_name = "NA";
                foreach ($result as $row) {
                    $a = array();
                    $a[] = $row->applicant_id;
                    if(!empty($row->full_name)){
                        $full_name = $row->full_name;
                    }

                    $a[] = $full_name;
                    $a[] = $row->job_code;


                    if(!empty($row->cv)){
                        $cv = $row->cv;
                        $path = base_url().'uploads/cv/'.$cv;
                        $link = '<a href="'.$path.'" download="filename.pdf" class="download-button">Download CV</a>';
                    }else{
                        $link = "Pending Profile Creation";
                    }
                    $a[] = $link;
                    $table_data[] = $a;
                }
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post_get('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $table_data   // total data array
        );
//        return $result;
        echo json_encode($json_data);  // send data as json format

    }

public function delete_priviledge_by_ID(){

    $p_id = (int) $this->input->post('p_id');
    $this->load->database();
    $this->db->set('status', -1);
    $this->db->where('company_id ',$p_id );
    $flag = $this->db->update('company');

    if ($flag) {
        echo json_encode(array("status" => 1, "msg" => "Successfully deleted"));
    } else {
        echo json_encode(array("status" => 2, "msg" => "Cannot delete"));
    }
    return $flag;
}

public function delete_job_by_ID(){
    $p_id = (int) $this->input->post('p_id');
    $this->load->database();
    $this->db->set('status', -1);
    $this->db->where('job_id',$p_id );
    $flag = $this->db->update('job_table');

    if ($flag) {
        echo json_encode(array("status" => 1, "msg" => "Successfully deleted"));
    } else {
        echo json_encode(array("status" => 2, "msg" => "Cannot delete"));
    }
    return $flag;
}

public function get_category_by_job_id(){
    $com_id = $this->input->post('cat');

    $this->db->select('category');
    $this->db->from('company');
    $this->db->where('company_id ', $com_id);
    $query = $this->db->get();
    $result1 = $query->row()->category;

    $val = $this->get_category_by__id($result1);

    If($query){
        $result2 = $val;
    }
    echo json_encode(array("status" => 1, "category" => $result2));
}

    public function get_category_by__id($result1){
        $this->db->select('job_cartegory');
        $this->db->from('job_categories');
        $this->db->where('job_cat_id', $result1);
        $query = $this->db->get();
        $result = $query->row()->job_cartegory;

        return $result;


    }



}
