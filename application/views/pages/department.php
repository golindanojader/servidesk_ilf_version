    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>



<?php $this->load->view('templates/navbar');?>
<?php $this->load->view('templates/leftbar');?>
	
	 <div class="content-wrapper">
	 	<div><input class="url" type="hidden" value="<?=BASE_URL?>" disabled></div>

  <section class="content-header">
      <div class="container-fluid">
        <div class="row">

           <div class="col-sm-8">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Departamentos</a></li>
              
            </ol>
          </div>
          <div class="col-sm-4">
     
          <div><input class="url" type="hidden" value="<?=BASE_URL?>" disabled></div>
          <div><input class="userId" type="hidden" value="<?=$_SESSION['ID']?>" disabled></div>
          <div><input class="userName" type="hidden" value="<?=$_SESSION['USERNAME']?>" disabled></div>
          
          </div>


      
          <?php if ($this->session->is_logged_in==true) {

        }?>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-lg-4">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 
         


            <button type="submit" class="btn btn-info btn-sm" title="Guardar Registro" id="saveNewDepartment" disabled>  <i class="fas fa-save" ></i></button>
             
            </a>|
              
         



             <a class="btn btn-info btn-sm" title="Cancelar" id="cancelDepartment">
              <i class="fas fa-times"></i>
            </a>|

             <a class="btn btn-info btn-sm " title="Crear Departamento" id="createNewDepartment">
              <i class="fas fa-plus" ></i>
            </a>|

           

            

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form">
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">
                     <label for="">Departamento:</label>

                     <input type="text" class="form-control form-control-sm" id="departmentName" disabled>
                  
                    </div>
                    

                  </div>


                </div>
                <!-- /.card-body -->

              </form>
            </div>
            </div>

            <!-- """""""""""""""""""""""""""""""""""""" SECCION 2 """"""""""""""""""""""""""""""""""""""""" -->


             <div class="col-lg-8">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 
         


              <h5>Departamentos</h5>
           

            

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  >
                <div class="card-body">


                  <div class="container-fluid">

                    
              
                 
                      <!-- checkbox -->

                      <table class="table" id="departmentBox">
                      
                        <thead>
                          <tr>
                            <th>Departamento</th>
                           
                           

                          </tr>
                        </thead>
                        <tbody>
                          

                          <?php
                          
                          foreach ($department as $row => $value) {
                            
                          echo '<tr><td><a  class="btn btn-sm btn-default btn-block" href = "'.base_url().$value["departmentid"].'"> '.$value["department"].'</td></tr>';  
                               
                            
                          }
                          ?>

                           
                         
                        </tbody>
                      </table>
                  
                  
                
                <hr>
            
                </div>

                </div>
                <!-- /.card-body -->

              </form>
            </div>
            </div>
            </div>
            </div>
        </section>
         </div>