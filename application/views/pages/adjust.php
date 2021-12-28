<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('templates/navbar');
$this->load->view('templates/leftbar');
?>





<div class="content-wrapper">
	 	<div><input class="url" type="hidden" value="<?=BASE_URL?>" disabled></div>

  <section class="content-header">
      <div class="container-fluid">
        <div class="row">

           <div class="col-sm-8">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Ajustes</a></li>
              
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
                

                <h6>Departamentos</h6>
           
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">
                   
                    <table id="" class="table table-bordered table-striped" >
                    
                         <thead>
                             <tr> 
                                 <th>Item</th>
                                 <th>Departamento</th>
                                 <th>Modificar</th>
                                 <th>Borrar</th>
                                 </tr>
                                </thead>
                                <tbody>

                    <?php

                    $row = 0;
                    
                    foreach ($department as  $row => $value) {

                       $row =  $row + 1; 

                           echo '
                           
                                <tr>
                                   
                                    <td>'.$row.'</td>

                                
                                    <td>
                                    <form class="sendData"  method="post">
                                    <input type="text" class="form-control form-control-sm" name="department" value="'.$value["department"].'">

                                    

                                    <input style="display:none" type="text" class="form-control" name="departmentid" value="'.$value["departmentid"].'">
                                    
                                    </td>
                                    <td><button type="submit" class="btn btn-info btn-sm btn-block"><i class="fa fa-save"></i></button></td>


                                    <td><button type="button" class="btn btn-warning delete btn-sm btn-block" delete="'.$value["departmentid"].'" departmentName ="'.$value["department"].'"><i class="fa fa-trash"></i></button></td>
                                    </form>
                                    </tr>';
                        
                       
                    }


                    
                    ?>
                 
                    </tbody>
                  
                    </table>

               
                    </div>
                    

                  </div>


                </div>
               
                <!-- /.card-body -->

          
            </div>
            </div>

            <div class="col-lg-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 

                <h6>Usuarios</h6>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">


                    <table id="dataTableUsers" class="table table-bordered table-striped" >
                         
                         <thead>
                             <tr>
                                 <th>Usuario</th>
                                 <th>Ver</th>
                                 </tr>
                                </thead>
                                <tbody>

                    <?php
                    
                        foreach ($users as $key => $value) {

                          $client = null;
                          $admin = null;

                          switch ($value["status"]) {
                            case 100:
                              $client = "checked";
                              break;

                              case 300:
                                $admin = "checked";
                                break;
                            
                            
                          }

                          

                               echo '
                           
                                    <tr>
                                        <td>'.$value["username"].'</td>
                                        <td><a href = "#row'.$key.'" data-toggle="modal"><button class="btn btn-info btn-block btn-sm">Ver</button></a>
     
                                    <div class="modal fade" id="row'.$key.'" tabindex="-1" role="dialog">
                                    <div class="modal-dialog ">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <form class="sendDataUser"  method="post">
                                     

                                      <div class="invoice p-3 mb-3">
                                      <!-- title row -->
                                      <div class="row">

                                      
                                      <label class="text-muted">Usuario</label>

                                      <input style="display:none" type= "text" class="form-control"   name = "user_id" value = "'.$value["user_id"].'" required >



                                      <input type= "text" class="form-control"   name = "username" value = "'.$value["username"].'" required >

                                      <label class="text-muted">Nombre</label>
                                      <input type= "text" class="form-control"   name = "name" value = "'.$value["name"].'" required >

                                      <label class="text-muted">Apellido</label>
                                      <input type= "text" class="form-control"   name = "lastname" value = "'.$value["lastname"].'" required >

                                      <label class="text-muted">Correo</label>
                                      <input type= "text" class="form-control"   name = "email" value = "'.$value["email"].'"  >

                                      <label class="text-muted">Contraseña</label>
                                      <input type= "text" class="form-control"   name = "password"  required >

                                      <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radioUser" id="radioUser" '.$client.' value="100" >
                                        <label class="form-check-label">Cliente</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radioUser"  id="radioUser" '.$admin.' value="300" >
                                        <label class="form-check-label">Administrador</label>
                                      </div>
                                      <button type="submit" class="btn btn-success btn-sm mt-5"><i class="fa fa-save "></i></button>

                                      <button type="button" class="btn btn-warning btn-sm mt-5 user_id" user_id="'.$value["user_id"].'"><i class="fa fa-eye"></i></button>
                                      </div>
              
                          

                                     

                                      
                                     
                                     
                                      <!-- /.col -->
                                      </div>
                                      <!-- info row -->
                                      </div>
                                      <!-- /.row -->
                                      </form>
                                    
                        
                                      <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
           
                                         
                                        </div>

                                        
                                        <!-- /.col -->
                                  
                
                                    </div>
                                      </div>
                                   
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                             </div>
                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </td>
                                    </tr>

                                   ';
                            
                           
                        }


                    
                    ?>
                 
                    </tbody>
                    </table>
                 

               
                    </div>
                    

                  </div>


                </div>
                <!-- /.card-body -->

             
            </div>
            </div>


            </div>

             
        <div class="row">

        <div class="col-lg-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 

                <h6>Categorías</h6>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">


                    <table id="" class="table table-bordered table-striped" >
                         
                         <thead>
                             <tr>
                                 <th>Descripción</th>
                                 <th>Guardar</th>
                                 <th>Borrar</th>
                                 </tr>
                                </thead>
                                <tbody>

                    <?php
                    
                        foreach ($level_1 as $key => $value) {

                               echo '
                           
                                    <tr>
                                       
                                        <form class="sendDataCategories"  method="post">
                                        <td>
                                        <input  type="text" class="form-control form-control-sm" name="level_category_id_1" value="'.$value["level_category_id_1"].'" style = "display:none">

                                        <input type="text" class="form-control form-control-sm" name ="level_1" value="'.$value["level_1"].'">
                                        </td>
                                        
                                        <td><button type="submit" class="btn btn-info btn-block btn-sm"><i class="fa fa-save"></i></button></td>

                                        <td><button type="button" class="btn btn-warning btn-block btn-sm   deleteCategorie" level_category_id_1 ="'.$value["level_category_id_1"].'" level_1="'.$value["level_1"].'"><i class="fa fa-trash"></i></button></td>


                                        </form>
                                    </tr>

                                   ';
                            
                           
                        }


                    
                    ?>
                 
                    </tbody>
                    </table>
                 

               
                    </div>
                    

                  </div>


                </div>
                <!-- /.card-body -->

            </div>
            </div>


            
        <div class="col-lg-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 

                <h6>Sub categorías</h6>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">


                    <table id="" class="table table-bordered table-striped" >

                         <thead>
                             <tr>
                                 <th>Descripción</th>
                                 <th>Ver</th>
                                 <th>Borrar</th>
                                 </tr>
                                </thead>
                                <tbody>

                    <?php
                    
                        foreach ($level_2 as $key => $value) {

                               echo '
                           
                               <tr>
                                       
                               <form class="sendDataSubCategories2"  method="post">
                               <td>
                               <input  type="text" class="form-control form-control-sm" name="level_category_id_2" value="'.$value["level_category_id_2"].'" style = "display:none">

                               <input type="text" class="form-control form-control-sm" name ="level_2" value="'.$value["level_2"].'">
                               </td>
                               
                               <td><button type="submit" class="btn btn-info btn-block btn-sm"><i class="fa fa-save"></i></button></td>

                               <td><button type="button" class="btn btn-warning btn-block btn-sm   deleteSubCategorie" level_category_id_2 ="'.$value["level_category_id_2"].'" level_2="'.$value["level_2"].'"><i class="fa fa-trash"></i></button></td>


                               </form>
                           </tr>

                                   ';
                            
                           
                        }


                    
                    ?>
                 
                    </tbody>
                    </table>
                 

               
                    </div>
                    

                  </div>


                </div>
                <!-- /.card-body -->

             
            </div>
            </div>
        
        
        
        </div>
            </div>
            
            </div>
            
        </section>


        


         </div>