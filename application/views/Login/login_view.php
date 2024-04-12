<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta author="cDr. Paulo Daniel Vázquez Mora" >
  <meta description="Informe de Ejercicios en Simulador SET, 2024">
  <title>SET-BD</title>
  <link rel="icon" type="img/icon" href="<?= base_url('vendor/dist/img/logos/set-logo.png') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/plugins/toastr/toastr.min.css">
  <!-- Estilos propios -->
  <link rel="stylesheet" href="<?= base_url('vendor') ?>/dist/css/login.css">
</head>
<body class="hold-transition login-page">

  <video autoplay muted loop id="myVideo">
    <source src="<?= base_url('vendor/dist/video/video-arma-blindada.mp4') ?>" type="video/mp4">
  </video>

<div id="grid"></div>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success border-morena ">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>" class="h1"><b>SET</b> Base de Datos</a>
    </div>
    <div class="card-body">
      <h3 class="login-box-msg">
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('vendor/dist/img/logos/sedena-logo-circulo.png') ?>" alt="SEDENA Logo" class="w-75" >
            </div>
            <div class="col-4">
                <img src="<?= base_url('vendor/dist/img/logos/perfil-logo.png') ?>" alt="Perfil Logo" class="w-75" >
            </div>
            <div class="col-4">
                <img src="<?= base_url('vendor/dist/img/logos/set-logo.png') ?>" alt="SET Logo" class="w-75" >
            </div>
        </div>
      </h3>
      <form action="<?= base_url('verifica_acceso') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="email" id="email" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">       
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-secondary btn-block btn-lg bg-morena">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      </div>
    <!-- /.card-body -->
      <div class="card-footer text-center">
          
        <hr>
        <strong>Copyright &copy; 2024 <a >SEDENA</a></strong><br>Todos los derechos reservados
      </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor') ?>/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('vendor') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('vendor') ?>/plugins/toastr/toastr.min.js"></script>
<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: false,
      position: 'center',
      timerProgressBar: true,
      showConfirmButton: true,
      timer: 6000
    });

    var error = <?= $error ?>;
    var mensaje = 'Acceso incorrecto';
    if (error>0){
      switch(error){
        case 1: mensaje = 'El usuario no existe';
          break;
        case 2: mensaje = 'La contraseña es incorrecta';
          break;
        case 3: mensaje = 'Indica usuario y contraseña';
          break;
      }
      Toast.fire({
        icon: 'error',
        title: mensaje,
      })  
    }
})
</script>

</body>
</html>