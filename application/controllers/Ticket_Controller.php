<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Ticket_Controller extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('Ticket_Model');
        $this->load->helper('url');
        $this->load->library('session');
        
    }

    //*******************************************************************************/
    // VALIDA QUE EL USUARIO NO TENGA TICKETS PENDIENTE POR ENVIAR
    //*******************************************************************************/

    public function viewTicketByStatus_1(){

        
        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

            // BUSCA TICKET PENDIENTE POR ENVIAR
            //*************************************************/
            $dataFromModel = $this->Ticket_Model->ValidateTicketByStatus();  

            if ($dataFromModel) {
            //CAPTURA LA FECHA Y HORA DE LA CREACION DEL TICKET
            //************************************************ */
            $dateTicket = $dataFromModel->CREATED;
            $ticketDate = date("d-m-Y", strtotime($dateTicket));
            $tiketHour = date("h:i:s A", strtotime($dateTicket));

             $ticketNum = array("ticket"=>$dataFromModel->TICKETNUM, 
                                "date"=> $ticketDate, 
                                "hour"=> $tiketHour);

            
            echo json_encode($ticketNum);
          
            }else{
            //EL 3 INDICA QUE NO HAY TICKET PENDIENTE POR ENVIAR
            //************************************************ */
             $ticketNum = 3;
             
             echo json_encode($ticketNum);
            
            }
           

         }


    }


    public function CreateNewTicket(){

        //************************************************************************/
        //CONSULTAR AL MODELO EL ÚLTIMA NÚMERO DE TICKET CREADO Y LE SUMAMOS 1
        //************************************************************************/
        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

            if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
                
               
            $dataFromModel = $this->Ticket_Model->ValidateTicket();  
            $ticketNum =   $dataFromModel->TICKETNUM;

            //INDICAMOS QUE SI LA CONSULTA VIENE VACIA NOS INGRESE EL PRIMER NÚMERO
            if ($ticketNum == NULL) {

                echo json_encode("NULO DESDE EL MODELO");
            
            }else{
                
                $ticketNum = $ticketNum + 1;
                echo json_encode($ticketNum);
        
            }

            exit();
         
        
            }
        
    }

    public function saveTickeId(){

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

        if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
        
        // GUARDO EL NUMERO DE TICKET 
        $ticketId = $this->security->xss_clean(addslashes(strip_tags($this->input->post('TICKETNUM',TRUE))));
        
        $dataController = $this->Ticket_Model->saveTicketId();

        // UNA VEZ GUARDADO EL TICKET LO CONSULTO PARA ALMACENAR LA FECHA DE CREACION
        $ticketByUser = $this->Ticket_Model->getTicketByUser();
        
        // GUARDO LA FECHA DE CREACION DEL TICKET
         $ticketCreationDate = $this->Ticket_Model->saveCreationDateTicket($ticketByUser->TICKETID);
       
         // CONSULTO EL ULTIMO NUMERO DE TICKET PARA TRAERME LA FECHA
         $ticketDate = $this ->Ticket_Model->ticketDate();

         
         
         $tiketDateFromModel = $ticketDate->CREATED;

         $ticketDate = date("d-m-Y", strtotime($tiketDateFromModel));
         $tiketHour = date("h:i:s A", strtotime($tiketDateFromModel));

         $date = array ("fecha"=>$ticketDate , "hora"=>$tiketHour);
         echo json_encode($date);
            
        }

    }


    public function get_category_level_1(){

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

            

            if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}

            

            //ME TRAIGO EL NIVEL 1 
             $ticketId = $this->security->xss_clean(addslashes(strip_tags($this->input->post('categoryid',TRUE))));

             $level = $this->Ticket_Model->get_category_level_1();

             
             if (!$level) {

                echo json_encode(null);

               
             }else{

                echo json_encode($level);
             }

            
      


        }



    }


    public function get_category_level_2(){

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

            if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
            //ME TRAIGO EL NIVEL 2

            $level_category_id_1 = $this->security->xss_clean(addslashes(strip_tags($this->input->post('level_category_id_1',TRUE))));
            $categoryid = $this->security->xss_clean(addslashes(strip_tags($this->input->post('departmentid',TRUE))));
            $category_level = $this->Ticket_Model->get_category_level_2();
            echo json_encode($category_level);

        }

    }


    public function get_category_level_3(){

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{


            
            $level_category_id_1 = $this->security->xss_clean(addslashes(strip_tags($this->input->post('level_category_id_1',TRUE))));
            $level_category_id_1 = $this->security->xss_clean(addslashes(strip_tags($this->input->post('level_category_id_2',TRUE))));
            $categoryid = $this->security->xss_clean(addslashes(strip_tags($this->input->post('categoryid',TRUE))));


             $category_level = $this->Ticket_Model->get_category_level_3();

             echo json_encode($category_level);



        }



    }

    
    public function getTicketStatus_1(){
        
        if (!$this->session->has_userdata("is_logged_in")) {
            
            redirect(base_url());

        }else{

            if(!$this->input->is_ajax_request()){ redirect(base_url());}
           
           
       

           $ticketStatus_1 = $this->Ticket_Model->getTicketStatus_1();
         

           if ($ticketStatus_1!="") {
                
               echo json_encode($ticketStatus_1);

             }

        }

    }

    public function saveInformationTicket(){

        if (!$this->session->has_userdata("is_logged_in")) {
            
            redirect(base_url());

        }else{

        if(!$this->input->is_ajax_request()){ redirect(base_url());}

        

            /* Getting file name */
         
            /* Location */
            $config['upload_path'] = "public_html/dist/img/img";
           
        
            /* Valid extensions */
            $config['allowed_types'] = array("jpg","jpeg","png","pdf","docx","doc");
            $this->load->library('upload', $config); 
            
            if($this->upload->do_upload('file'))  
             {  
       
            $data = array('upload_data' => $this->upload->data());
           
            $image = $data['upload_data']['file_name'];

           
                  $ticketInformation = $this->Ticket_Model->saveInformationTicket($image);

  
           
          }else{

            $image = null;
                
                  $ticketInformation = $this->Ticket_Model->saveInformationTicket($image);

           
          }

        
        }
    }




    public function changeStatusTicket(){


        
        if (!$this->session->has_userdata("is_logged_in")) {
            
            redirect(base_url());

        }else{

        if(!$this->input->is_ajax_request()){ redirect(base_url());}


        $ticketInformation = $this->Ticket_Model->changeStatusTicket();
                             $this->Ticket_Model->closeTicketByDate(); 

        echo "ok";


    }
    


}
}