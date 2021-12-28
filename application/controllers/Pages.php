<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Pages extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Ticket_Model');
        $this->load->model('Department_Model');
        $this->load->model('User_Model');
        $this->load->model('Auth_Model');
        $this->load->library('session');
        
    }


    public function public_html(){

        $page = "index";

        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}

        $this->load->view('templates/loginHead');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/loginFooter');

    }

    public function index(){

        $page = "index";
        
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                      
           show_404();

    }

    $this->load->view('templates/loginHead');
    $this->load->view('pages/'.$page);
    $this->load->view('templates/loginFooter');

}

public function adminPanel(){

    if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{

        $page = "adminPanel";

        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                      
            show_404();
    
     }


            $this->load->view('templates/head');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');


    }


}


public function home(){

    if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{

       

    $page = "home";

    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();
    }
            //ME TRAIGO CANTIDAD DE TICKET CREADOS, FINALIZADOS, PENDIENTES.
            $dataFromModel["dataTicket"] = $this->Ticket_Model->ticketsCounts();

         
            if ($_SESSION['STATUS'] == 300) {

                //INFORMACIÓN DEL PANEL PRINCIPAL DE ADMINISTRADOR
                /////////////////////////////////////////////////////

                //NAVEGADOR: ÚLTIMA CONEXIÓN
                /////////////////////////////////////////////////////
                $dataFromModel['data_connection'] = $this->Auth_Model->findDataLastConnection($_SESSION['ID']);
                $dataFromModel['ip_address']    =  $dataFromModel['data_connection']['ip_address'];
                $dataFromModel['navigator']        =  $dataFromModel['data_connection']['navigator'];
                $dataFromModel['date_connection']  =  $dataFromModel['data_connection']['date_connection'];
                

                //ME TRAIGO TODOS LOS USUARIOS CONECTADOS
                $dataFromModel['data_connectionUser'] = $this->User_Model->usersConnected(); 
                //$dataFromModel['connected']  =  $dataFromModel['data_connectionUser']['connected'];    

                //ME TRAIGO TODOS LOS TICKETS FINALIZADOS
                $dataFromModel['ticketsData'] =  $this->Ticket_Model->getTicketStatus_3();

                //ME TRAIGO LOS DEPARTAMENTOS CREADOS
                $dataFromModel["departments"] = $this->Department_Model->departmentListCount();

                $page = "adminHome";

                $this->load->view('templates/head');
                $this->load->view('pages/'.$page,$dataFromModel);
                $this->load->view('templates/footer');


            }elseif ($_SESSION['STATUS'] == 100) {
              
                $this->load->view('templates/head');
                $this->load->view('pages/'.$page,$dataFromModel);
                $this->load->view('templates/footer');

            }
        
        
        }

}




public function myticket(){

    if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{

    $page = "myticket";

    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                      
        show_404();

 }
            //ME TRAIGO LOS ADMINISTRADORES DEL SISTEMA
            $dataFromModel['userData'] = $this->Ticket_Model->listAdminUser();

            //ME TRAIGO LAS CATEGORIAS
            $dataFromModel['department'] = $this->Ticket_Model->departmentListSistemas();

            $this->load->view('templates/head');
            $this->load->view('pages/'.$page,$dataFromModel);
            $this->load->view('templates/myticketFooter');

    }

}

public function ticketbox(){


    if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{

    

    if ($_SESSION['STATUS'] == 300) {


     $page = "ticketbox";

     $dataFromModel['ticketsData'] =  $this->Ticket_Model->getTicketStatus_3();
     $this->load->view('templates/head');
     $this->load->view('pages/'.$page,$dataFromModel);
     $this->load->view('templates/ticketBoxFooter');

    }elseif ($_SESSION['STATUS'] == 100) {

    $page = "ticketboxUser";
    
    $dataFromModel['ticketsData'] =  $this->Ticket_Model->getTicketStatusUser();
    $this->load->view('templates/head');
    $this->load->view('pages/'.$page,$dataFromModel);
    $this->load->view('templates/ticketBoxFooter');
  
    }

    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                      
        show_404();

 }
          
         

    }
    

}

public function userCount(){


   if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{


         if ($_SESSION['STATUS'] == 300) {

              $page = 'userCount';


            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}
          
            //ME TRAIGO LOS DEPARTAMENTOS PARA ASIGNARLOS AL CLIENTE
            $dataFromModel['department'] = $this->Ticket_Model->departmentList();
    
            $this->load->view('templates/head');
            $this->load->view('pages/'.$page,$dataFromModel);
            $this->load->view('templates/footer');



         }

    }

}



public function usersList(){


   if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{


         if ($_SESSION['STATUS'] == 300) {

              $page = 'usersList';


             if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}
          
            //ME TRAIGO TODOS LOS USUARIOS 
             $dataFromModel['users'] = $this->User_Model->usersList();
    
            $this->load->view('templates/head');
            $this->load->view('pages/'.$page,$dataFromModel);
            $this->load->view('templates/footer');



         }

    }

}






public function department(){


   if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{


         if ($_SESSION['STATUS'] == 300) {

              $page = 'department';


             if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}
          
            //ME TRAIGO LOS DEPARTAMENTOS (LO SOLICITO DE TICKET MODEL PARA NO TENER QUE CREAR OTRA CONSULTA)
             $dataFromModel['department'] = $this->Ticket_Model->departmentList();
    
             $this->load->view('templates/head');
             $this->load->view('pages/'.$page, $dataFromModel);
             $this->load->view('templates/footer');

         }

    }

}


public function adjust(){

    if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{

        if ($_SESSION['STATUS'] == 300) {   

            $page = "adjust";

            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}

            $dataFromModel['department']     = $this->Department_Model->departmentListCount();
            $dataFromModel['users']          = $this->User_Model      ->usersList();
            $dataFromModel['level_1']        = $this->Department_Model->getDepartmentLevels1();
            $dataFromModel['level_2']        = $this->Department_Model->getDepartmentLevels2();

      

            $this->load->view('templates/head');
            $this->load->view('pages/'.$page,$dataFromModel);
            $this->load->view('templates/footer');


        }else{

            redirect(base_url());

        }

    }


}



public function departmentCategories($param = null){



     if (!$this->session->has_userdata("is_logged_in")) {

        redirect(base_url());
    }else{


         if ($_SESSION['STATUS'] == 300) {

            $page = 'departmentCategories';

            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}

                if ($param == null) {


                   $this->load->view('templates/head');
                   $this->load->view('pages/'.$page);
                   $this->load->view('templates/footer');

                }else{
                            

                             $department["department"] = $this->Department_Model->FindDepartmentById($param);
                            //  NOMBRE DEL DEPARTAMENTO
                             $department["departmentName"]  =  $department["department"]["department"];
                             $department["departmentid"]    =  $department["department"]["departmentid"];
                        
                            // CATEGORIAS Y SUBCATEGORIAS DEL DEPARTAMENTO
                              $department["category"] = $this->Department_Model->DepartmentCategories($param);

                                if ($department["department"]) {
                                $this->load->view('templates/head');
                                $this->load->view('pages/'.$page, $department);
                                $this->load->view('templates/footer');

                            }

                      }

                 }    

             }

         }


         public function getInformationLevel_2(){


            if (!$this->session->has_userdata("is_logged_in")) { 

                redirect(base_url());

            }else { 

                if (isset($_GET["level_category_id_1"]) == null) {

                    redirect(base_url());
                }else {

                    $page = "getInformationLevel_2";

                      if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {show_404();}
                    
                    
                      $level_2["levelInformation"] = $this->Department_Model->getLevel_2Information();
                     

                      if ($level_2["levelInformation"]) {

            
                        
                            $this->load->view('templates/head');
                            $this->load->view('pages/'.$page,$level_2);
                            $this->load->view('templates/footer');
                    
                        }else{

                            $level_1["level_1"] = $this->Department_Model->getLevel_1Information();
                            $page = "auxgetInformationLevel_2";

                            $level_1["level_name"]    =  $level_1["level_1"]["level_1"];
                           
                            $this->load->view('templates/head');
                            $this->load->view('pages/'.$page, $level_1);
                            $this->load->view('templates/footer');

                        }

                     
                     }
                
              
                }


         }


         public function uploadImage(){


            if (($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/gif")) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/".$_FILES['file']['name'])) {
                echo 'si';
            } else {
                echo 'no';
             }
         }
        
        }


public function logout(){


        ////////////////////////////////////////////////////////////////////
        //GUARDAR DATOS DE CONEXION AL FINALIZAR LA SESSION 
        //EN ESTE PUNTO SE ALMACENA LOS DATOS DE ÚLTIMA ENTRADA DE CONEXIÓN
        ////////////////////////////////////////////////////////////////////
         $userid          = $_SESSION['ID']; 

        ////////////////////////////////////////////////////////////////////
        //VALIDAR QUE EL USUARIO EXISTA EN LA TABLA DE CONEXIÓN
        ////////////////////////////////////////////////////////////////////
        $userDataConnection = $this->Auth_Model->findDataLastConnection($userid); 

        $dataConnection = array("date_connection" => date('Y-m-d H:i:s'),
                                "ip_address"      => $this->input->ip_address(),
                                "navigator"       => $_SERVER["HTTP_USER_AGENT"],
                                "user_id"         =>  $userid);

   if ($userDataConnection == NULL) {
       //INSERTAMOS LOS VALORES YA QUE EL USUARIO SE ESTÁ LOGEANDO POR PRIMERA VEZ

             $userDataConnection = $this->Auth_Model->createDataConnection($dataConnection);

   }else{

       
             $userDataConnection = $this->Auth_Model->updateDataConnection($dataConnection);

    }

            unset($dataConnection);


            //INDICAMOS QUE EL USUARIO YA NO SE ENCUENTRA CONECTADO 
            /////////////////////////////////////////////////////////////
            $userDataConnectionUser = array("connected" => 0,
                                            "user_id"   =>  $userid);

            $this->Auth_Model->updateDataConnectionUser($userDataConnectionUser);

            unset($userDataConnectionUser);
            


    $this->session->unset_userdata('ID');
    $this->session->unset_userdata('USERNAME');
    $this->session->unset_userdata('NAME');
    $this->session->unset_userdata('LASTNAME');
    $this->session->unset_userdata('is_logged_in');
    $this->session->unset_userdata('DEPARTMENT');
    redirect(base_url());

    }

}