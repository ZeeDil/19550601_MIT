<?php

class loginmodel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
        $this->load->library('encryption');

	}

	function get_user_by_mail($user_name,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$user_name );
		$this->db->where('password',$password);
		$query = $this->db->get();
		 //print_r($this->db->last_query()); die();
		if($query){
			return $query->result();
		}else{
			return "invalid";
		}
	}


    //-- check valid user admin
    function validate_user($un,$pw){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_name', $un);
        $this->db->where('password', md5($pw));
        $this->db->limit(1);
        $query = $this->db->get();
        //print_r($this->db->last_query()); die();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

    //-- check valid user admin
    function validate_site_user($un,$pw){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $un);
        $this->db->where('password', md5($pw));
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

    function check_created_job_provider_profiles($id){
        $this->db->select('*');
        $this->db->from('job_provider');
        $this->db->where('user_id',$id );
        $query = $this->db->get();
        //print_r($this->db->last_query()); die();
        $num = $query->num_rows();
        //print_r($num); die();
        return $num;

    }

    function check_created_job_job_seeker($id){
        $this->db->select('*');
        $this->db->from('job_seeker');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
       // print_r($this->db->last_query()); die();
        $num = $query->num_rows();
        //print_r($num); die();
        return $num;

    }

    function get_created_job_provider_profiles_details($id){
        $this->db->select('*');
        $this->db->from('job_seeker');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }else{
            return -1;
        }
    }

    function postClean($para) {
		$cleanPara = $this->security->xss_clean($para);     //XSS Filtering
		$sanitizePara = $this->security->sanitize_filename($cleanPara, TRUE); //sanitize them to prevent directory traversal and other security related issues
		return $sanitizePara;
	}


	public function check_login_function(){
        if ($this->session->userdata('is_login') == FALSE) {
            $data = array(
                'id' => "NA",
                'name' => "NA",
                'user_priority' => 0,
                'account_no' => 0,
                'is_login' => FALSE
            );
            $this->session->set_userdata($data);
        } else {
            $data = array(
                'id' => "Id123",
                'name' => "Name",
                'user_priority' => 1,
                'account_no' => "123456",
                'is_login' => TRUE
            );
            $this->session->set_userdata($data);
        }
    }




}
