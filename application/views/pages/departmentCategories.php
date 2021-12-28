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
     
          <div><input class="url"      type="hidden" value="<?=BASE_URL?>" disabled></div>
          <div><input class="userId"   type="hidden" value="<?=$_SESSION['ID']?>" disabled></div>
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
                 

             <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg" title="Crear categoría" id="createNewCategory">
              <i class="fas fa-plus" ></i>
            </a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form">
                <div class="card-body">

                  <div class="form-group">
                    <div class="form-group">
                     <label for="">Departamento:</label>

                     <input type="text" class="form-control form-control-sm" value="<?=$departmentName;?>" disabled>
                     <input type="hidden" class="form-control form-control-sm departmentid" value="<?=$departmentid;?>" disabled>
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
                 
         


              <h5>Categorías creadas</h5>
           

            

              </div>
              <!-- /.card-header -->
              <!-- form start -->
          
                <div class="card-body">


                  <div class="container-fluid">



				  <table class="table table-hover" >
                <thead>
             
                  
                    <th>Categoría</th>
                  

                  </thead>
                  <tbody>


                    <?php
                    
                        foreach ($category as $row => $value) {

                          
                          

                            echo '<tr><td>
                                  
                                    <form class="form-inline mt-2 mt-md-0 method="get" action='.base_url().'getInformationLevel_2'.'> 

                                    <input type="hidden" class="hidden" level_1="'.$value['level_category_id_1'].'" name="level_category_id_1" value='.$value['level_category_id_1'].'> 

                                    <input type="hidden" class="hidden" departmentid="'.$departmentid.'" name="departmentid" value='.$departmentid.'>  
                                  
                                    <button type="submit" class="btn btn-sm btn-default btn-block">'.$value['level_1'].'</button>

                                  </form>
                                  
                                  </tr></td>';
                        
                        }
                    
                    ?>
         
             
      
  
      
     
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

<!--------------------------------------- MODAL 1------------------------------------------------------>

		 <!-- <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
         
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> -->



		<!-- <div class="row">

		<div class="col-11"> 
		<input type="text" class="form-control form-control-sm "  style="margin-left: 15px" placeholder="Ingrese Título de la categoría">
		</div>		 -->

			<!-- INPUT DINAMICO -->
			<!-- <div id="lista" class="mt-4">
			<div class="lista-desc float-clear" style="clear:both" >
				<ul class="list-group" >

				<li class="list-group-item" style="background: none; border: 0px; width: 900px "> 
					
					<div class="float-left" style="margin-right: 40px; ">
						<input type="checkbox" name="item_index[]"  />
					</div>


					<div class="float-left">
						<input class="form-control form-control-sm valorClase" type="text"  valor = "''" name="field_name[]" id="field_name"  
						placeholder="Descripción" required style=" width: 650px;">
					</div> 


					</li> 
				</ul> 
			</div>

			</div>


			</div> -->


			
      <!-- <div class="btn-action float-clear" style="margin-left: 73px;">

        <button class="btn btn-success btn-sm " type="button"  name="agregar_registros" id="agregar_registros" value="Agregar"  onClick="AgregarMas();" /> <i class="fa fa-plus"></i></button>

        <button class="btn btn-danger btn-sm" type="button"  name="borrar_registros"  onClick="BorrarRegistro();" /><i class="fa fa-times"></i></button>


        <button type="submit"  class="btn btn-primary btn-sm" ><i class="fa fa-save"></i></button>

      </div>



            </div>
            <div class="modal-footer justify-content-between">
             
            </div>
          </div> -->
          <!-- /.modal-content -->
        <!-- </div> -->
        <!-- /.modal-dialog -->
      <!-- </div> -->


<!---------------------------------------------------------------------------------------------------------->



