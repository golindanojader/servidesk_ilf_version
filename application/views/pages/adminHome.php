
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('templates/navbar');?>

  <?php $this->load->view('templates/leftbar');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">

       
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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->


         
              <div class="card">
              <div class="card-header border-0">
           
                <h3 class="card-title">Información de conexión</h3>
                <div class="card-tools">
              
                 
                
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex  align-items-left border-bottom mb-3">
                  
                    <i class="ion ion-ios-refresh-empty"></i>
                  
                  <p class="d-flex flex-column text-left">
                    
                      <i class="ion ion-android-arrow-up text-success"></i> 


                      <?php

                        $date  = date('d/m/y H:m:s', strtotime($data_connection["date_connection"]));

                          echo $date;
        

                       ?>
                    
                    <span class="text-muted">Última Conexión</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex  border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                      <i class="ion ion-android-arrow-up text-warning"></i> 

                    <?php

              
                       echo $data_connection["ip_address"];

                       ?>
                   

                    <span class="text-muted">IP</span>
                  </p>
                </div>
   

                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-left">
                 
                      <i class="ion ion-android-arrow-down text-danger"></i> 
                      
                      <?php

                      

                          echo $data_connection["navigator"];
     
                           
                           
                           ?>
                  
                    <span class="text-muted">Navegador</span>
                  </p>
                </div>
                <hr>

                             <!-- /.d-flex -->
           <!-- <div class="d-flex mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-left">
                    
                      <i class="ion ion-android-arrow-down text-danger"></i> 
                      
                    

                        // $count = 0; 
                        
                        // foreach ($data_connectionUser as $key => $value) {
                          
                        //  $count = $count + 1;
                         
                        // }

                        //  echo  $count;

                       ?>
                   
                    <span class="text-muted">Usuarios conectados</span>
                  </p>
            </div> -->
                
                
                <!-- <hr> -->

                <!-- /.d-flex -->
              </div>
            </div>

          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
           
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
      
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

