<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class  User_Controller extends CI_Controller{

   public function __construct(){

        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Department_Model');
        $this->load->helper('url');
        $this->load->library('session');
    }


public function CreateNewUser(){

   

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

          

            if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}

              

                if (strlen( $this->input->post('username')) > 50  || 
                    strlen( $this->input->post('password')) > 50) {

                       echo json_encode(200, true);
                    
                }else{

                    $user = $this->input->post('username');
                   
                    //VALIDAR USUARIO
                    $userCount = $this->Auth_Model->getUser($user);
                    // $userCount['username'] = $userCount['USERDATA']['username'];

                  
                         if ($userCount == NULL) {

                          
                            
                        //VALIDAR DEPARTAMENTO
                         $department = $this->Department_Model->FindDepartmentById( $this->input->post('department'));
                        

                            foreach ($department as  $value) {
                                    

                                    $departmentId = $value;
                             }

  
                      
                            switch ($this->input->post('status')) {
                                case 'admin':
                                    $status = 300;
                                    break;
                                
                                case 'client':
                                    $status = 100;
                                    break;
                            }

                                $name     = $this->input->post('name');
                                $lastName = $this->input->post('lastname');
                                $userName = $this->input->post('username');
                                $email    = $this->input->post('email');
                                $encrypt  = $this->hash->encrypt($this->input->post('password'));

                                if ($name         == NULL ||
                                    $lastName     == NULL || 
                                    $userName     == NULL || 
                                    $encrypt      == NULL ||
                                    $departmentId == NULL){

                                    echo json_encode(200);

                                    exit();
                                }

                                $dataController = array("name"         =>  $name, 
                                                        "lastname"     =>  $lastName,
                                                        "username"     =>  $userName,
                                                        "password"     =>  $encrypt,
                                                        "email"        =>  $email,
                                                        "status"       =>  $status,
                                                        "departmentid" =>  $departmentId);
                          
                                

                                 $dataFromModel = $this->User_Model->CreateNewUser($dataController);  
                        
                                echo json_encode($dataFromModel, true);
                           
                                 exit();

                              }else{

                               

                                echo json_encode(100 , true);


                             }

                             
         
        
            }

        }

    }







public function generatePass(){



$pool = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$range = mt_rand(1000000,9999999);
$strRange = substr(str_shuffle($pool),100,999);


echo json_encode($range, true);



}



public function updateUser(){


    if (!$this->session->has_userdata("is_logged_in")) { 


        redirect(base_url());
        
      }else{



              $dataController = $this->User_Model->updateUser();
  
  
            echo json_encode($dataController);


      }

}

public function deleteUser(){


    if (!$this->session->has_userdata("is_logged_in")) { 


        redirect(base_url());
        
      }else{



              $dataController = $this->User_Model->deleteUser();
  
  
            echo json_encode($dataController);


      }

}





}