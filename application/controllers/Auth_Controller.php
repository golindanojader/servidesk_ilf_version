<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//DEFINE MESSAGE CLASS
class  Auth_Controller extends CI_Controller{

   public function __construct(){

        parent::__construct();
        $this->load->model('Auth_Model');
        $this->load->helper('url');
        $this->load->library('hash');  
        $this->load->library('session');
    }


    public function ValidateSession(){
        
        if(!$this->input->is_ajax_request()){

            redirect(base_url());

        }else{

            if (isset($_POST["userName"]) && $_POST["userName"] !="" && 
                isset($_POST["userPass"]) && $_POST["userPass"] !=""){

                    // VALIDAR CANTIDAD DE CARACTERES
                    if (strlen($_POST["userName"]) > 50 || strlen($_POST["userPass"]) > 50) {
                        
                        return json_encode(3);

                    }else{
          

                    $userStrtolower = strtolower($_POST["userName"]);
                    $pass = $this->security->xss_clean(addslashes(strip_tags($_POST["userPass"])));
                    $validateUserFromModel = $this->Auth_Model->getUser($userStrtolower);
                    $encrypt = $this->hash->encrypt($pass);

                    


            if (!$validateUserFromModel) {
                
                echo json_encode(3);//Este usuario no se encuentra registrado, intente nuevamente.'
                exit();

            }


            if ($validateUserFromModel) {


                if ($validateUserFromModel -> INTENTS >= 2) {
               
                echo json_encode(0);//'Su cuenta esta temporalmente bloqueda, consulte el administrador del sistema.
            
                exit();
            }

            

            if ($validateUserFromModel->PASSWORD !=  $encrypt ) {

                $intents =  $validateUserFromModel->INTENTS + 1;
             
                $userData = array("INTENTS"=>$intents , "USERNAME"=>$userStrtolower);
              
                json_encode($dataFromController = $this->Auth_Model->intents($userData), true);

                echo json_encode(2); // echo json_encode('Contraseña incorrecta, intente nuevamente.');

               

               exit();
              }
               
           
            $departmentUserId = $validateUserFromModel->DEPARTMENTID;
            $userData = array("INTENTS"=> 0, "USERNAME"=>$userStrtolower);
            $validateDepartment = $this->Auth_Model->departmentUser($departmentUserId); 
            json_encode($dataFromController = $this->Auth_Model->intents($userData), true);


            $_SESSION['ID']           =  $validateUserFromModel->USER_ID;   
            $_SESSION['STATUS']       =  $validateUserFromModel  -> STATUS;    
            $_SESSION['USERNAME']     =  $validateUserFromModel->USERNAME;
            $_SESSION['NAME']         =  $validateUserFromModel -> NAME;
            $_SESSION['LASTNAME']     =  $validateUserFromModel ->LASTNAME;
            $_SESSION['is_logged_in'] = TRUE;
            $_SESSION['DEPARTMENT']   =  $validateDepartment  -> DEPARTMENT;

                ////////////////////////////////////////////////////////////////////
                //----------------------------------------------------------------
                //EN ESTE PUNTO SE ALMACENA EL DATO PARA DETERMINAR SÍ EL USUARIO
                //SE ENCUENTRA LOGEADO EN EL SISTEMA
                ////////////////////////////////////////////////////////////////////

                $userid          = $_SESSION['ID']; 

                ////////////////////////////////////////////////////////////////////
                //VALIDAR QUE EL USUARIO EXISTA EN LA TABLA DE CONNECTED_USER
                ////////////////////////////////////////////////////////////////////
                 $userDataConnection = $this->Auth_Model->findDataLastConnectionUser($userid); 
      
                 $dataConnection = array("connected" => 1,
                                         "user_id"   =>  $userid);
      
                if ($userDataConnection == NULL) {
                
                  //INSERTAMOS LOS VALORES YA QUE EL USUARIO SE ESTÁ LOGEANDO POR PRIMERA VEZ
       
                  $userDataConnection = $this->Auth_Model->createDataConnectionUser($dataConnection);
      
                }else{
      
             
                   $userDataConnection = $this->Auth_Model->updateDataConnectionUser($dataConnection);
      
                  }
      
                  unset($dataConnection);

                   echo json_encode(1);

         

           
           
    
       
                   }
            
               }

            
            
        }

    }

}

}
