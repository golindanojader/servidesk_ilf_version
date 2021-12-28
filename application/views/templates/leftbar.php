 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-white-primary elevation-5 ">
    <!-- Brand Logo -->
   
     
    <img class="ml-3" src="<?= BASE_URL()?>/public_html/dist/img/servidesk.png" class="img-fluid" alt="">

      <!-- <img src="<?=BASE_URL?>public_html/dist/img/Logo.png" class="img-fluid" alt=""> -->
    
 


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3  mb-3 ">
     
        <div class="info ml-5">
         <h6><?=$_SESSION['NAME']." ".$_SESSION['LASTNAME']?></h6>
        </div>
      </div>

  

      <!-- Sidebar Menu -->
      <nav class="mt-2" class="collapse navbar-collapse">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item menu-open">
              <a href="home" class="nav-link">
           <i class="fas fa-home nav-icon"></i>
              <p>
               Principal
     
              </p>
            </a>

          </li>

             <li class="nav-item">
               <a href="#" class="nav-link" >
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <?php

          if($_SESSION['STATUS'] == 300) {
       
           echo  '<li class="nav-item">
                <a href="adminPanel" id="myticket_section" class="nav-link">
                  <i class="fas fa-inbox nav-icon"></i>
                  <p>Bandeja de entrada</p>
                </a>
              </li>';

            }

              ?>


              <li class="nav-item">
                <a href="myticket" id="myticket_section" class="nav-link">
                  <i class="fas fa-ticket-alt nav-icon"></i>
                  <p>Ticket de soporte</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="ticketbox" class="nav-link">
                  <i class="fas fa-file-invoice nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>
              
      
            </ul>
          </li>

          <?php 

          if ($_SESSION['STATUS'] == 300) {
            echo ' 
              <li class="nav-item ">
                    <a href="" class="nav-link ">
                    <i class="fas fa-users nav-icon"></i>
                    <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
           
              </p>
            </a>

              <ul class="nav nav-treeview">


              <li class="nav-item">
                  <a href="userCount" class="nav-link ">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Crear usuario</p>
                </a>
              </li>

                <li class="nav-item">
                  <a href="usersList" class="nav-link ">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>

              </ul>
          </li>
        

            <li class="nav-item menu-open">
              <a href="department" class="nav-link ">
           <i class="fas fa-address-book nav-icon"></i>
              <p>
              Departamentos
     
              </p>
            </a>
          </li>


               <li class="nav-item menu-open">
              <a href="" class="nav-link ">
           <i class="fas fa-cubes nav-icon"></i>
              <p>
              Recursos
     
              </p>
            </a>
          </li>


          <li class="nav-item menu-open">
          <a href="adjust" class="nav-link ">
       <i class="fas fa-wrench nav-icon"></i>
          <p>
          Ajustes
 
          </p>
        </a>
      </li>


          ';
          }

           ?>
           
    


          <li class="nav-item menu-open">
              <a href="<?=base_url()?>logout" class="nav-link ">
           <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
            Salir
     
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>