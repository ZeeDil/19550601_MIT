<?php
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_job_oppertunity($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function create_company($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function create_jb_provider($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }


    public function all_job_categories(){
        $this->db->select('*');
        $this->db->from('job_categories');
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function all_job_districts(){
        $this->db->select('*');
        $this->db->from('job_district');
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function all_job_companies_by_id($id){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('company_admin', $id);
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function get_all_districts(){
        $this->db->select('*');
        $this->db->from('job_district');
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function get_last_inserted_job_id(){
        $this->db->select('job_id');
        $this->db->from('job_table');
        $this->db->order_by('job_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        If($query){
            $result = $query->row()->job_id;
        }
        return $result;
    }

    public function all_job_countries(){
        $this->db->select('*');
        $this->db->from('country');
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

public function check_provider_profile_duplicates($email){
    $this->db->select('job_provider_id');
    $this->db->from('job_provider');
    $this->db->where('email',$email);
    $query = $this->db->get();
   // print_r($this->db->last_query()); die();
    If($query){
        $result = $query->result();
    }
    return $result;
}

    public function get_all_cities(){
        $this->db->select('*');
        $this->db->from('cities');
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function get_jobs_of_the_provider($user_id){

        $this->load->database();
        $this->db->select('A.*');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id ', 'left');
        $this->db->join('user AS C' , 'B.company_admin = C.user_id  ', 'left');
        $this->db->where('A.status', 1);
        $this->db->where('C.user_id', $user_id);
        $query = $this->db->get();
        If($query){
            $result = $query->result();
        }
        return $result;
    }

    public function get_last_applied_users(){
        $datetime = date('Y-m-d H:i:s');
        $date = new DateTime($datetime);
        $date->modify('-24 hours');
        $newDatetime = $date->format('Y-m-d H:i:s');

        $this->load->database();
        $user_id = $_SESSION['id'];
        $currentTimestamp = time();
        $timestampMinus12Hours = $currentTimestamp - (12 * 3600);

        $this->db->select('A.*');
        $this->db->from('job_applicant AS A');
        $this->db->join('job_seeker AS B', 'A.applicant_user_id = B.user_id', 'left');
        $this->db->join('job_table AS C', 'A.job_id = C.job_id' , 'left');
        $this->db->join('company AS D', 'D.company_id  = C.job_company' , 'left');
        $this->db->where('D.company_admin', $user_id);
        $this->db->where('A.created_on >', $newDatetime);

        $result = $this->db->get()->num_rows();
//        print_r($this->db->last_query()); die();
        return $result;


    }



}
