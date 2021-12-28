<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class User_Model extends CI_Model{

    public function __construct(){

        parent::__construct();
        $this->load->library('session');
        $this->load->library('hash');
        
    }



    public function CreateNewUser($dataModel){

        

    	 $dataFromController = array(  "name"         => $dataModel['name'],
                                       "lastname"     => $dataModel['lastname'],
                                       "username"     => $dataModel['username'],
                                       "email"        => $dataModel['email'],
                                       "password"     => $dataModel['password'],
                                       "status"       => $dataModel['status'],
                                       "departmentid" => $dataModel['departmentid'],                             
                                       "intents"      => 0,
                                       "created_on"   =>date('Y-m-d H:i:s'));

            return   $this->db->insert('user',$dataFromController);


    }


        public function usersList(){
        
         $this->db->select('A.user_id');
         $this->db->select('A.username');
         $this->db->select('A.name');
         $this->db->select('A.lastname');
         $this->db->select('A.email');
         $this->db->select('A.status');
         $this->db->select('B.department');
         $this->db->from('user A');
         $this->db->join('department B','A.departmentid = B.departmentid');
         $this->db->where('A.enabled', 1);
         $query = $this->db->get();
         return $query->result_array();


    }


    public function usersConnected(){

        $this->db->select('connected');
        $this->db->from('connected_user');
        $this->db->where('connected', 1);
        $query = $this->db->get();
        return $query->result_array();
    
    
    
    }

    public function updateUser(){

        $encrypt = $this->hash->encrypt($this->input->post('password'));

		$userid         = 		         $this->input->post('user_id');

		$data 			= array('username'      =>$this->input->post('username'),
                                'name'          =>$this->input->post('name'),
                                'lastname'      =>$this->input->post('lastname'),
                                'email'         =>$this->input->post('email'),
                                'status'        =>$this->input->post('radioUser'),
                                'password'      => $encrypt,
                                'intents'       => 0);

		$this->db->where('user_id',$userid);
		return $this->db->update('user', $data);

    }


    public function deleteUser(){



		$userid =  $this->input->post('user_id');

		$data 	= array('enabled' => 0);

		$this->db->where('user_id',$userid);
		return $this->db->update('user', $data);

    }


    

}