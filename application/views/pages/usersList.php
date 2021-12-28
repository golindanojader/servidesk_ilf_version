
  
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
              <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Listado</li>
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
      <div class="row">
        <div class="col-md-3">
   

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usuarios</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item ">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user-circle"></i> Activos
                    <span class="badge bg-success float-right">

                    <?php

                    $count = 0;
                    foreach($users as $row){

                      $count += 1;
                    }
                    echo  $count;
                    ?>
                    </span>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-user-circle"></i> Bloqueados
                    <span class="badge bg-danger float-right">
                    	33
                    </span>
                  </a>
                </li> -->
            
           
           
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card" style="display: none">
            <div class="card-header">
              <h3 class="card-title">Prioridad</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-danger"></i>
                    Alta
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-warning"></i> Media
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-primary"></i>
                   Baja
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Tickets Finalizados</h3>

     
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
         
        
                <!-- /.float-right -->
              </div>
              <div class="card-body" >

                <table class="table table-hover table-sm" id="ticketsBox">
                <thead class="thead-light">
                
                  
                    <th>Usuario</th>
                    <th>Nombre y Apellido</th>
                    <th>Departamento</th>
                    
                   
                
                  </thead>
                  <tbody class="table-bordered ">

                  <?php 
              
                  foreach ($users as $row => $value) {
                    echo '   
                  <tr>
                  
                    <td class="mailbox-name">'.$value['username'].'</a>
                    <td class="mailbox-name">'.$value['name'].' '.$value['lastname'].'</td>
                     <td class="mailbox-name">'.$value['department'].'</a>
                    </tr>

                    ';
                   
                  }
                  ?>
             
                
                
  
      
     
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

