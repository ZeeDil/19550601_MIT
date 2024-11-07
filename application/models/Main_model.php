<?php
class Main_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function get_all_job_categories(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('job_categories');
        $query= $this->db->get();
        if($query){
            $result = $query->result();
        }
        return $result;
    }

    public function create_basicprofile($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function save_ol_result($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function save_AL_result($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insert_preference($data, $table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function update_profile_status($id, $step){
        $data = array(
            'profile_step'=>$step
        );
        $result = $this->db->where('user_id', $id)
            ->update('job_seeker', $data);
        return $result;
    }

    public function get_all_profile_details($user_id){
        $this->db->select('*');
        $this->db->from('job_seeker');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        if($query){
            $result = $query->result();
        }
        return $result;
    }

    //-----------------------------------------



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


    public function get_count() {
        $category = 0;
        $location = 0;
        if($category != 0){
            $this->db->where('job_category' ,$category );
        }
        if($location != 0){
            $this->db->where('job_district' ,$location );
        }
        $result = $this->db->get('job_table')->num_rows();
        return $result;
    }

    public function get_jobs($limit, $start) {
        $category=0;
        $location = 0;
        $this->db->limit($limit, $start);
        $this->db->select('A.* , B.company_logo, C.district');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('job_district AS C' , 'A.job_district = C.district_id ' , 'left');
        $this->db->order_by('A.job_id', 'DESC');
        if($category != 0){
            $this->db->where('A.job_category' ,$category );
        }
        if($location != 0){
            $this->db->where('A.job_district' ,$location );
        }
        $query = $this->db->get();
        return $query->result();
    }

    function fetch_jobs($limit, $start, $cat_id)
    {
        $currentDate = date("Y-m-d");
        $category=0;
        $location = 0;
        $this->db->limit($limit, $start);
        $this->db->select('A.* , B.company_logo, B.company_name, C.district');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('job_district AS C' , 'A.job_district = C.district_id ' , 'left');
        $this->db->order_by('A.job_id', 'DESC');
        $this->db->where('expire_date >=' ,$currentDate );

        if($cat_id != 0){
            $this->db->where('A.job_category' ,$cat_id );
        }
        if($location != 0){
            $this->db->where('A.job_district' ,$location );
        }
        $query = $this->db->get();
        //print_r($this->db->last_query()); die();
        return $query;
    }

    function get_job_details_by_jobid($job_id){
        $this->db->select('A.* , B.*, C.*, D.countryname');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('job_district AS C' , 'A.job_district = C.district_id ' , 'left');
        $this->db->join('country AS D' , 'A.job_country = D.code ' , 'left');
        $this->db->where('A.job_id' ,$job_id);
        $query = $this->db->get();
        if($query){
           $result =  $query->row();
        }else{
            $result = 0;
        }
        return $result;
    }

    public function check_already_logged_in_user($user_name,$name){
        //check in user table
        $this->db->select('profile_status');
        $this->db->from('user');
        $this->db->where('user_name',$user_name);
        $query = $this->db->get();
        if($query){
            $result = $query->row()->profile_status	;
        }
        return $result;
    }

    public function get_user_id_by_username($user_name){
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where('user_name',$user_name);
        $query = $this->db->get();
        if($query){
            $result = $query->row()->user_id;
        }
        return $result;
    }

    public function save_hnd_val($profile_id,$hnd,$hnd_institute){
        $data = array(
            'profile_id'=>$profile_id,
            'hnd_name' => $hnd,
            'hnd_institute' => $hnd_institute
        );
        $result = $this->db->insert('jobseeker_hnd', $data);
        return $result;
    }

    public function get_feature_jobs_old(){
        $this->db->select('A.* , B.company_logo, C.name_en');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('cities AS C' , 'A.job_city = C.id ' , 'left');
        $this->db->order_by('A.job_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        if($query){
            $result = $query->result();
        }
        return $result;
    }

    public function get_feature_jobs(){
        $this->db->select('A.* , B.company_logo, C.district');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B' , 'A.job_company = B.company_id' , 'left');
        $this->db->join('job_district AS C' , 'A.job_district = C.district_id ' , 'left');
        $this->db->order_by('A.job_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();

        if($query){
            $result = $query->result();
        }
        return $result;
    }

    public function update_profile_step($id, $status){
        $data = array(
            'profile_step' =>$status
        );
        $result = $this->db->where('user_id', $id)
            ->update('job_seeker', $data);
        return $result;
    }

    public function get_profileid_by_user_id($id){
        $this->db->select('jobseeker_id');
        $this->db->from('job_seeker');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        if($query){
            $result = $query->row()->jobseeker_id;
        }
        return $result;
    }

    public function get_job_provider_email_by_job_id($job_id){
        $this->db->select('D.email');
        $this->db->from('job_table AS A');
        $this->db->join('company AS B','A.job_company = B.company_id ', 'left');
        $this->db->join('user AS C','C.user_id  = B.company_admin  ', 'left');
        $this->db->join('job_provider AS D','C.user_id  = D.user_id  ', 'left');
        $this->db->where('A.job_id ',$job_id);
        $query = $this->db->get();
        if($query){
            $result = $query->row()->email;
        }
        return $result;
    }




}
