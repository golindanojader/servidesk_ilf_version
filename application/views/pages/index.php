
<body class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="<?= BASE_URL()?>/public_html/dist/img/servidesk.png" class="img-fluid" alt="">
      <p class="login-box-msg text-muted" style="font-size: 15px" >Control de recursos empresariales</p>
     <img src="<?= BASE_URL()?>/public_html/dist/img/group2.jpg" class="img-fluid" alt="">
  
    </div>
    <div class="card-body">
    

      <form id="Validate_login" method="post">

        <input type="hidden" id="url" value=<?=BASE_URL?>>
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-sm" id="userName"  name="userName" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-sm" id="userPass" name="userPass" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div id="msg"> </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          
          <div class="col-12">
            
            <button type="submit" class="btn btn-primary btn-block btn-sm">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">He olvidado mi contraseña</a>
      </p> -->

      <div class="text-muted text-center mt-3"><p>Desarrollado por:</p></div>

      <a class="text-muted text-center" style="font-size: 12px" href="www.github.com/golindanojader"><p > www.github.com/golindanojader</p></a>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

