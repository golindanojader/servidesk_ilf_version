<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Auth_Model extends CI_Model{

public function __construct(){

    parent::__construct();
    $this->load->library('session');
    
}
    

public function getUser($user = FALSE){

if ($user) {
    
    $this->db->where('USERNAME',$user);
    $this->db->where('enabled',1);
    $query = $this->db->get('user');
    return $query->row();
}

}


 public function intents($userData){

    $this->db->set('INTENTS', $userData["INTENTS"]);
    $this->db->where('USERNAME', $userData["USERNAME"]);
    $this->db->update('USER');

 }


 public function departmentUser($idUser){

    $this->db->select('DEPARTMENT');
    $this->db->from('department');
    $this->db->where('DEPARTMENTID', $idUser);
    $query = $this->db->get();
    return $query->row();



 }

////////////////////////////////////////////////
//TABLA DE ENTRADA DE CONEXIÓN
/////////////////////////////////////////////// 
public function findDataLastConnection($userid){

    $this->db->select('user_id');
    $this->db->select('date_connection');
    $this->db->select('navigator');
    $this->db->select('ip_address');
    $this->db->from('data_connection');
    $this->db->where('user_id', $userid);
    $query = $this->db->get();
    return $query->row_array();

}

public function findDataLastConnectionUser($userid){

    $this->db->select('user_id');
    $this->db->from('connected_user');
    $this->db->where('user_id', $userid);
    $query = $this->db->get();
    return $query->row_array();

    
}






public function createDataConnection($dataConnection){

    $this->db->insert('data_connection',$dataConnection);

}

public function createDataConnectionUser($dataConnection){

    $this->db->insert('connected_user',$dataConnection);

}


public function updateDataConnection($dataConnection){

    $this->db->set('date_connection', $dataConnection["date_connection"]);
    $this->db->set('ip_address', $dataConnection["ip_address"]);
    $this->db->set('navigator', $dataConnection["navigator"]);
    $this->db->where('user_id', $dataConnection["user_id"]);
    $this->db->update('data_connection');

}


public function updateDataConnectionUser($dataConnectionUser){

  $this->db->set('connected', $dataConnectionUser["connected"]);
  $this->db->where('user_id', $dataConnectionUser["user_id"]);
  $this->db->update('connected_user');

}






}
