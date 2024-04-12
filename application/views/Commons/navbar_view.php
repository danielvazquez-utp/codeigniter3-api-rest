<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-navy navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link text-white bg-white ml-1" style="border-radius:10px;">
        <?= "<strong> $periodo->nombre_ciclo $periodo->periodo </strong>" ?>
      </span>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url('bienvenida') ?>" class="nav-link text-white"><i class="fas fa-house-user"></i> Inicio</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

  <li class="nav-item">
      <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button" title="Pantalla completa">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="<?= base_url('logout') ?>" role="button" title="Salir">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->