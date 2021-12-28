<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
     
          <div><input class="url"         type="hidden" value="<?=BASE_URL?>" disabled></div>
          <div><input class="userId"      type="hidden" value="<?=$_SESSION['ID']?>" disabled></div>
          <div><input class="userName"    type="hidden" value="<?=$_SESSION['USERNAME']?>" disabled></div>
          <div><input class="level_category_id_1" type="hidden" value="<?=$_GET['level_category_id_1']?>" disabled></div>
          <div><input class="departmentid" type="hidden" value="<?=$_GET['departmentid']?>" disabled></div>
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



            <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                 
                 <?= $level_name; ?>
           
              </div>
              <!-- /.card-header -->
              <!-- form start -->
          
                <div class="card-body">


                  <div class="container-fluid">

                  <input type="text" class="form-control input_description" placeholder="Ingrese descripcion de la sub categoría">
                
                  <button type="button" class="btn btn-info mt-2 btn-save_desciption"><i class="fa fa-save"></i></button>
                           
                           
                            <table class = "table table-hover mt-2" id = "level_2_table">

                              <thead>
                              <th>Descripción</th>
                             
                              </thead>


                            <tbody>

                     
                          
                            <tr><td>

                                        
                    
                    
                            </td> 
                        
                        </td>
                        
                    </tr>                                  
                                        
                           
                                                            
                            </tbody>

                            
                            </table>


                </div>

                </div>
                <!-- /.card-body -->

            
            </div>

			
            </div>




            </div>
            </div>
        </section>
         </div>