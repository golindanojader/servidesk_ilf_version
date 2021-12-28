
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($_SESSION['STATUS'] != 300) {
  redirect(BASE_URL()."home");
}
?>


  <!-- Preloader -->
<!--   <div class="preloader flex-column justify-content-center align-items-center">
    
    <img src="<?=base_url()?>public_html/dist/img/Logo.png" class="img-fluid"  alt="AdminLTELogo" height="460" width="460">
  </div> -->

  <?php $this->load->view('templates/navbar');?>

  <?php $this->load->view('templates/leftbar');?>
  <!-- Content Wrapper. Contains page content -->
<input type="hidden" class="url" value="<?=base_url()?>">
  <div class="wrapper">

  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">

           <div class="col-sm-8">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item active">Bandeja de entrada</li>
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
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">

            <div class="card">
                    <div class="card-header">
          <h3 class="card-title">Bandeja de entrada</h3>

     
        </div>
            
          <div class="card-body p-0">
         <table id="ticketTableInfo" class= "table  table-striped projects   table-hover">

        <thead>

          <tr>
          <th style="width: 10%" >Tickect id</th>
          <th style="width: 20%">Usuario</th>
          <th style="width: 25%">Departamento</th>
          <th style="width: 50%">Categoría</th>
          <th style="width: 10%">Prioridad</th>
          <th style="width: 10%">Estado</th>
        </tr>

          <tbody>
          
          </tbody>
        
      
      </thead>
 
    </table>
        </div>
          </div>
       
          <!-- ./col -->
            </div>
        </div>

         
          </section>
          <!-- /.Left col -->
       
          <!-- right col -->
      
        </div>
        <!-- /.row (main row) -->
      <!-- </div>/.container-fluid -->

    <!-- /.content -->
  <!-- </div> -->
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



       