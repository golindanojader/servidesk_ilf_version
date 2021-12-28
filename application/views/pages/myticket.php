<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>



<?php $this->load->view('templates/navbar');?>

 
<?php $this->load->view('templates/leftbar');?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">

           <div class="col-sm-8">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item active">Ticket de Soporte</li>
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

  
<form method="post" enctype="multipart/form-data" id="saveForm" >
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-xl-12">
              
            <div class="card card-info">
              <div class="card-header">
                 
            <!-- <a class="btn btn-info btn-sm"  id="editTicket"  href="">
              <i class="fas fa-edit"></i>
            </a>| -->
            <button type="button" class="btn btn-info btn-sm" title="Guardar Ticket" id="saveNewTicket">  
            <i class="fas fa-save" ></i></button>
            </a>|
              
         

              <a class="btn btn-info btn-sm tippy" title="Buscar Ticket" href = 'ticketbox' >
              <!-- NOTA: VALIDAR EL REDICCIONAMIENTO A LA PAGINA DE LISTADO DE TICKETS -->
              
              <i class="fas fa-eye"></i>
            </a>|

             <a class="btn btn-info btn-sm" title="Cancelar ticket" id="cancelTikect">
              <i class="fas fa-times"></i>
            </a>|

             <a class="btn btn-info btn-sm" title="Nuevo Ticket" id="createNewTicket" >
              <i class="fas fa-plus" ></i>
            </a>|

             <!-- <a class="btn btn-info btn-sm tippy" title="Variante" id="variant">
              <i class="fas fa-clone"></i>
            </a>| -->

            

              </div>
              <!-- /.card-header -->
              <div class="card-body formAtributes">
             
                  <div class="row">
                    <div class="col-xl-6">

                      <div style="font-size: 13px;">

                        <h6 class="text-muted">Datos generales</h6>
                        <hr>                   

              
                  <div class="row ">
                    <label for="inputEmail3" class="col-xl-3 col-form-label">Ticket ID:</label>
                    <div class="col-xl-5">
                      <input type="text" class="form-control form-control-sm" id="ticketid" name="ticketid" disabled="true" >
                    </div>
                  </div>

                  <div class=" row mt-2 ">

                  
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Descripción:</label>
                    <div class="col-xl-9 div_input_description">
                      

                      <textarea  class="form-control form-control-sm input_description" name="input_description" id="input_description" cols="20" rows="5" maxlength="200"></textarea>
                    </div>
                  </div>
                  
                <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Usuario:</label>
                    <div class="col-xl-9">
                    <input type="hidden" class="form-control form-control-sm" disabled="true" value="<?=strtoupper($_SESSION['ID'])?>" id="user_id" name="user_id">
                      <input type="text" class="form-control form-control-sm" disabled="true" placeholder="<?=strtoupper($_SESSION['USERNAME'])?>" name="<?=strtoupper($_SESSION['ID'])?>">
                    </div>
                  </div>  

                    <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Departamento:</label>
                    <div class="col-xl-9">
                      <input type="text" class="form-control form-control-sm" disabled="true" name="department" placeholder="<?=strtoupper($_SESSION['DEPARTMENT'])?>">
                    </div>
                  </div> 

  


                  <div class=" row mt-2">
                  
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Categoria:</label>
                    <div class="col-xl-9">
                      <select name="categoryid" id="select_category_input" class="form-control form-control-sm select_category_input" required disabled>

                      <option class="category" id="category"  value="0">Seleccione categoria</option>
                  
                       
                      <?php
                          
                          foreach ($department as $row => $value) {
                            
                          echo '<option class="category" id="category" name="categoryid" categoryValue="'.$value['departmentid'].'" value="'.$value['department'].'" >'.$value['department'].'</option>';  
 
                          }
                          ?>

                      </select>
                    </div>
                  </div>




                  <h6 class="text-muted mt-5">Estado de Solicitud</h6>
                  <hr>
                  <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Estado:</label>
                    <div class="col-xl-9">
                      <select name="status" id="select_option_status" class="form-control form-control-sm select_option_status">
                        
                         <option  name = "status" value="2" selected>Nuevo</option>
                        
                         
                      </select>
                    </div>
                  </div>


                  <div class=" row mt-2">
                  <label for="inputPassword3" class="col-xl-3 col-form-label">(jpg,png,pdf,docx)
                  </label>
                  
                  <div class="col-xl-9">
                  <input class="form-control" type="file" id="file"  name = "file" />

                 

     </div>
                  </div>

                       
                 

              

                   <div class=" row mt-2">
                    
                   <label for="inputPassword3" class="col-xl-3 col-form-label">Prioridad:</label>
                    <div class="col-xl-9">
                     <select id="select_option_urgency" class=" form-control form-control-sm select_option_urgency" name="priority" disabled>
                       <option name="priority" value="30">Alta</option>
                       <option name="priority" value="20">Media</option>
                       <option name="priority" value="10">Baja</option>
                     </select>
                    </div>
                    

                


                  </div>


                   <h6 class="text-muted mt-5">Rangos de fechas</h6>
                    <hr>




                        <div class="row mt-2" >
                    

                    <label for="inputPassword3" class="col-xl-3 col-form-label">Creado:</label>
                    <div class="col-xl-4">
                      <input id="input_date" type="text" class="form-control form-control-sm" disabled="true" placeholder="">
                    </div>
                    

                 
                    <div class="col-xl-4">
                      <input id="input_hour" type="text" class="form-control form-control-sm" disabled="true" placeholder="">
                    </div>


                  </div>
                       
                 

        


                   <div class=" row mt-2">
                    

                    <label for="inputPassword3" class="col-xl-3 col-form-label">Estatus:</label>
                   
                    <div class="col-xl-1" >
                      <span class="form-control bg-warning form-control-sm mt-2" style="width: 10px; height: 20px"></span>
                    </div>

                

                  </div>


                  </div>
 
              

              </div>









              <div class="col-xl-6">

                      <div style="font-size: 13px;">

                        <h6 class="text-muted">Subcategoría</h6>
                        <hr>

                        
                     
                      <!-- checkbox -->
           
             
                <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Subcategoria 1:</label>
                    <div class="col-xl-9">
                      <select name="level_1" id="level_1" class="form-control form-control-sm select_option_status" required>
                      <option value="" level_category_id_1></option>
                      </select>
                    </div>
                  </div>

                  <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Subcategoria 2:</label>
                    <div class="col-xl-9">
                      <select name="level_2" id="level_2" class="form-control form-control-sm select_option_status">
                        <option value="" level_category_id_2></option>
                       
                         
                      </select>
                    </div>
                  </div>
                  

                    <!-- <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Nivel 3:</label>
                    <div class="col-xl-9">
                      <select name="" id="level_3" class="form-control form-control-sm select_option_status" >
                        
                         
                         
                      </select>
                    </div>
                  </div> -->

              


              

                  <!-- <div class=" row mt-2">
                    <label for="inputPassword3" class="col-xl-3 col-form-label">Solución:</label>
                      <div class="input-group input-group-sm col-xl-9">
                 <textarea class="form-control select_option_status" name="" id="" cols="0" rows="10" ></textarea>
                
                </div>
                  </div> -->


              



         


              <!-- /.card-body -->
            </div>




            <!-- /.card -->
          </div>


          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

