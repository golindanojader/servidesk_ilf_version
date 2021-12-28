    
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
              <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Crear Usuario</li>
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
          <div class="col-lg-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 
         


            <button type="submit" class="btn btn-info btn-sm" title="Guardar Registro" id="saveNewUser" disabled>  <i class="fas fa-save" ></i></button>
             
            </a>|
              
         

              <a class="btn btn-info btn-sm tippy" title="Buscar Usuario" id="findUser" >
            
              <i class="fas fa-eye"></i>
            </a>|

             <a class="btn btn-info btn-sm" title="Cancelar" id="cancelUser">
              <i class="fas fa-times"></i>
            </a>|

             <a class="btn btn-info btn-sm createNewUser" title="Nuevo Usuario" id="createNewUser">
              <i class="fas fa-plus" ></i>
            </a>|

           

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  >
                <div class="card-body">

                  <div class="form-group">
                    <label for="">Departamento</label>
                      
                      <select name="departmentId" id="departmentId" class="form-control form-control-sm select_category_input" disabled>  
                               
                       
                      <?php
                          
                          foreach ($department as $row => $value) {
                            
                          echo '<option class="category" id="departmentId" name="departmentId" categoryValue="'.$value['departmentid'].'" value="'.$value['departmentid'].'" >'.$value['department'].'</option>';  
 
                          }
                          ?>

                      </select>

                  </div>

                  <div class="form-group">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control form-control-sm" id="nameUser" maxlength="50" disabled>
                  </div>
                  <div class="form-group">
                    <label for="">Apellido:</label>
                    <input type="text" class="form-control form-control-sm" id="lastNameUser" maxlength="50" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Usuario:</label>
                    <input type="text" class="form-control form-control-sm" id="userNameCount" maxlength="50" disabled="true">
                  </div>

                   <div class="form-group">
                    <label for="">Correo Electrónico: (Opcional)</label>
                    <input type="email" class="form-control form-control-sm" id="userEmail" maxlength="50" disabled="true" >
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="text" class="form-control form-control-sm" id="userPassword" maxlength="50" disabled="true">


                    <input type="button"  class="btn btn-info btn-sm mt-1" name="" value="Generar Contraseña" id="btnGeneratePass" value="" disabled>
                  </div>

 

                </div>
                <!-- /.card-body -->

              </form>
            </div>
            </div>

            <!-- """""""""""""""""""""""""""""""""""""" SECCION 2 """"""""""""""""""""""""""""""""""""""""" -->


             <div class="col-lg-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 
         


              <h5>Privilegios</h5>
           

            

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  >
                <div class="card-body">


                  <div class="container-fluid">

                    
                    <hr>
                  <div class="row">
              
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radioUser" id="radioUser" checked value="client" >
                          <label class="form-check-label">Cliente</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radioUser"  id="radioUser" value="admin" >
                          <label class="form-check-label">Administrador</label>
                        </div>

                      </div>
                    </div>
                  </div>
                
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