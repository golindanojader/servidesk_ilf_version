<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//DEFINE MESSAGE CLASS

class  Department_Controller extends CI_Controller{

   public function __construct(){

        parent::__construct();
         $this->load->model('Department_Model');
        $this->load->helper('url');
        $this->load->library('session');
    }



public function CreateNewDepartment(){


        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

        	 if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}


        	  $department = $this->security->xss_clean(addslashes(strip_tags($this->input->post('department',TRUE))));

        	  $dataCotroller = $this->Department_Model->CreateNewDepartment();

        	  echo json_encode($dataCotroller);


        }

}



public function FindDepartment(){

      $petiton = false;

        if (!$this->session->has_userdata("is_logged_in")) {
      
            redirect(BASE_URL());

        }else{

             if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}

              
             $department = $this->security->xss_clean(addslashes(strip_tags($this->input->post('department',TRUE))));

             // TRAIGO TODOS LOS DEPARTAMENTOS
             $dataCotroller = $this->Department_Model->FindDepartment();

             
            
              foreach ($dataCotroller as $row => $value) {  

                //CONVIERTO EN MAYUSCULA Y ELIMINO LOS ESPACIOS EN BLANCO PARA VALIDAR CADA CARACTER 
                if (strtoupper(str_replace(' ', '', $value["department"])) == strtoupper($this->input->post('department',TRUE))) {
                        
                 $petiton = true;
                        
                }

              }

                 echo json_encode($petiton);
             
        }


}

public function saveLevel_1(){


  if (!$this->session->has_userdata("is_logged_in")) {
    
    redirect(BASE_URL());

 }else{


  if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
      
      $dataCotroller = $this->Department_Model->saveLevel_1();

        echo json_encode($dataCotroller);


    }


}


  public function saveLevel_2(){


    if (!$this->session->has_userdata("is_logged_in")) {
      
      redirect(BASE_URL());

   }else{


    if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
        
        $dataCotroller = $this->Department_Model->saveLevel_2();

          echo json_encode($dataCotroller);


  }


}


public function deleteLevel_2(){

  if (!$this->session->has_userdata("is_logged_in")) {
      
    redirect(BASE_URL());

 }else{


  if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
      
      $dataCotroller = $this->Department_Model->deleteLevel_2();

        echo json_encode($dataCotroller);

  }

}

public function updateLevel_2(){


      if (!$this->session->has_userdata("is_logged_in")) {
          
        redirect(BASE_URL());

      }else{


      if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}
          
          $dataController = $this->Department_Model->updateLevel_2();

          echo json_encode($dataController);


    }


  }



     public function getInformationLevel_2(){


            if (!$this->session->has_userdata("is_logged_in")) { 

                redirect(base_url());

            }else { 

                if (isset($_GET["level_category_id_1"]) == null) {

                    redirect(base_url());
                }else {

                      if (!file_exists(APPPATH.'views/pages/index.php')) {show_404();}

                      $level_2["levelInformation"] = $this->Department_Model->getLevel_2Information();

                     
                   }
                
                }

              }


      public function enabledLevel_category_2(){

        if (!$this->session->has_userdata("is_logged_in")) { 

          redirect(base_url());

        }else { 

          if (!$this->input->is_ajax_request()) { redirect(BASE_URL());}

          $level_category_id_2 = $this->input->post('level_category_id_2');

          $dataController['level_category_2'] =  $this->Department_Model->enabledLevel_category_2();

          $enabled['enabled'] =  $dataController['level_category_2']['enabled'];
       
             if( $enabled['enabled'] == 0){

              $dataController = 1;
        
             $messagge = $this->Department_Model->changeEnabledLevel_category_2($level_category_id_2, $dataController);

      
             }else{

            

              $dataController = 0;
              $this->Department_Model->changeEnabledLevel_category_2($level_category_id_2, $dataController);



           }


      }

    }

        public function updateDepartment(){


          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                  $dataController = $this->Department_Model->updateDepartment();
      
      
                echo json_encode($dataController);

          }

          
        }


        public function deleteDepartment(){


          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                  $dataController = $this->Department_Model->deleteDepartment();
      
      
                echo json_encode($dataController);

    
          }

          
        }


        public function updateCategorie(){

          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                  $dataController = $this->Department_Model->updateCategorie();
      
                // $values = array("level_1"             =>$this->input->post("level_1"),
                //                 "level_category_id_1" => $this->input->post("level_category_id_1"));
                echo json_encode($dataController);

    
          }



        }



        public function deleteCategorie(){

          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                   $dataController = $this->Department_Model->deleteCategorie();
      
                // $values = array("level_category_id_1"             =>$this->input->post("level_category_id_1"),
                //                 "enabeld"             => 0);
                echo json_encode($dataController);

    
          }



        }


        public function updateSubCategories(){

          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                  $dataController = $this->Department_Model->updateSubCategories();
      
                // $values = array("level_1"             =>$this->input->post("level_1"),
                //                 "level_category_id_1" => $this->input->post("level_category_id_1"));
                echo json_encode($dataController);

    
          }



        }
        

       
        public function deleteSubCategorie(){

          if (!$this->session->has_userdata("is_logged_in")) { 


            redirect(base_url());
            
          }else{



                   $dataController = $this->Department_Model->deleteSubCategorie();
      
                // $values = array("level_category_id_1"             =>$this->input->post("level_category_id_1"),
                //                 "enabeld"             => 0);
                echo json_encode($dataController);

    
          }



        }
        

}