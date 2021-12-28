
  
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
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
   

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Enviados
                    <span class="badge bg-primary float-right"><?php
                    $count = 0; 
                    foreach ($ticketsData as $row => $value) {
                      
                      if ($value["status_ticket"]!=2) {
                        $count += 1; 
                      }
                  
                      
                      } echo $count;?>
                    </span>
                  </a>
                </li>
               
            
        
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
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

                <table class="table table-hover" id="ticketsBox">
                <thead>
                
                  
                <th>Detalles</th>
                <th>Estado</th>
                <th>Fecha</th>
                    
                   
                
                  </thead>
                  <tbody>

                  <?php 

                  $route = "public_html/dist/img/img/";
                  foreach ($ticketsData as $row => $value) {

                    $finishDate  = date('d/m/y H:m:s', strtotime($value["changed"]));
                    $createdDate = date('d/m/y H:m:s', strtotime($value["created"]));


                    switch ($value['message']) {
                     
                      case   NULL:
                        $display = 'none';
                        break;
                      
                      default:
                      $display = '';
                        break;
                    }



                    switch ($value['image']) {
                     
                      case   NULL:
                      $active  = 'none';
                      
                      break;
                      
                      default:
                      $active  = '';

                       break;
                      
                    }

                    switch ($value['status_ticket']) {
                      case 2:
                       $color = "bg-warning";
                        break;
                      
                      default:
                      $color = "bg-success";
                        break;
                    }


                    switch ($finishDate) {
                      case '31/12/69 20:12:00':
                       
                        $finishDate = "Pendiente";

                        break;
              
                    
                    }
                    echo '   
                  <tr>
                  
                   
                    <td class="mailbox-subject"><b>'.$value['level_1'].'</b> - <b>'.$value['level_2'].'</b> '.$value['description'].'
                    </td>
                   	<td class="mailbox-date"><span class="form-control '. $color.' form-control-sm mt-2" style="width: 10px; height: 20px"></span></td>
                    <td class="mailbox-date">'. $createdDate.'</td>


                    <td><a href = #row'.$row.' data-toggle="modal"><button class="btn btn-default">ver</button></a>
                    
                    
              <div class="modal fade" id=row'.$row.' tabindex="-1" role="dialog">
                 
              
              
              <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       
                      <div class="invoice p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-globe"></i> Servi Desk.
                            <small class="float-right">Creado: '. $createdDate.'</small><br>
                            <small class="float-right">Finalizado: '.$finishDate.'</small>


                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          De
                          <address>
                            <strong>'.$value['name']." ".$value['lastname'].'</strong><br>
                            Departamento: '.$value['departmentUser'].'<br>
                            Email: '.$value['email'].'
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Para
                          <address>
                            <strong>'.$value['department'].'</strong><br>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        Ticket #
                        <address><b> '.$value['ticketnum'].'</b></address><br>
                       
                          
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
        
                    
        
                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">

                        

                        
                          <p class="lead">'.$value['level_1'].':</p>
                          <p class="lead">'.$value['level_2'].':</p>
  
                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          '.$value['description'].'
                          </p>

                          <div style="display:'.$active.'">
                          <a href="'.$route.$value['image'].'" rel="noopener" target="_blank" class="btn btn-default" download><i class="fas fa-print"></i> '.$value['image'].'</a>
                          </div>
                        </div>
                        <!-- /.col -->
                   
        
                   
                      
               <div class="col-12" style="display:'.$display.'">
                        <br>
                 <div class="callout callout-info">
                 <address>
                 <strong>'.$value['department'].'</strong>
               </address>

                  <p>'.$value['message'].'</p>
                  </div>
                          
              </div>
                      



                    </div>
                      </div>
                   
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
             </div>
                    

                    
                    </td>
                  </tr>';
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

