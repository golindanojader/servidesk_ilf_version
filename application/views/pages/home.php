
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">

    <h1 class="text-center mt-4" style="font-family: Satisfy-Regular; font-size: 50px">Servi Desk v. 1.0</h1>
    
   <!--  <img src="<?=base_url()?>public_html/dist/img/Logo.png" class="img-fluid"  alt="AdminLTELogo" height="460" width="460"> -->
  </div>

  <?php $this->load->view('templates/navbar');?>

  <?php $this->load->view('templates/leftbar');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Principal</h1>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>

                  
                <?php
                $cant = 0;
                foreach ($dataTicket as $row => $value) {
                
                 
                      $cant = $cant + 1; 
                
                 
                } 
                echo $cant;
                ?>

                </h3>

                <p>Tickets Creados</p>
              </div>
              <div class="icon">
                <i class="fas fa-ticket-alt"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>

                <?php
                $cant = 0;
                foreach ($dataTicket as $row => $value) {
                
                  if ($value["status"] == 3) {
                      $cant = $cant + 1; 
                  } 
                 
                } 
                echo $cant;
                ?>

                </h3>

                <p>Tickets Finalizados</p>
              </div>
              <div class="icon">
                <i class="fas fa-check"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                $cant = 0;
                foreach ($dataTicket as $row => $value) {
                
                  if ($value["status"] == 2) {
                      $cant = $cant + 1; 
                  } 
                 
                } 
                echo $cant;
                ?>
                
              </h3>

                <p>Tickets Pendientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>




        
  
        </div>

         
          </section>
          <!-- /.Left col -->
       
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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

