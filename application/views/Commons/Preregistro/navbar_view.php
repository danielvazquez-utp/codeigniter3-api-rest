<!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <img src="<?= base_url('vendor') ?>/dist/img/logos/favicon.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light ml-2">Universidad Tecnológica de Puebla</span>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link">
            <?= desencripta($_SESSION['preregister_user']) ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('preregistro_form') ?>" role="button" title="Salir">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->