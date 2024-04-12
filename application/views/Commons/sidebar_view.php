  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy elevation-3">
    <!-- Brand Logo -->
    <a href="<?= base_url('bienvenida') ?>" class="brand-link navbar-navy">
      <img src="<?= base_url('vendor') ?>/dist/img/logos/logo-utp.png" alt="UTP Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><span class="text-white">BeaverSys</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('vendor') ?>/dist/img/avatar-neutral.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block text-navy"><small><strong><?= $usuario ?></strong></small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?
          if ($menu!=false) {
            foreach ($menu->result() as $opcion) {
              $activo = '';
              $arbol_abierto = '';
              $menu_abierto = '';
              if ($opcion->opcion == $titulo) {
                $activo = 'active';
                $arbol_abierto = 'block';
                $menu_abierto = 'menu-is-opening menu-open';
              }
              ?>
                <li class="nav-item <?= $menu_abierto ?>">
                  <a href="#" class="nav-link <?= $activo ?>">
                    <i class="nav-icon text-green <?= $opcion->icono ?>"></i>
                    <p>
                      <i class="right fas fa-angle-left"></i>
                      <?= $opcion->opcion ?>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: <?= $arbol_abierto ?>">
                    <?
                    if ($submenu!=false) {
                      foreach ($submenu->result() as $subopcion) {
                        if ($subopcion->id_opcion == $opcion->id_opcion) {
                          $active = 'no-active';
                          if ($this->uri->segment(1) == $subopcion->ruta_submenu) {
                            $active= 'active';
                          }
                          ?>
                            <li class="nav-item">
                              <a href="<?= base_url($subopcion->ruta_submenu) ?>" class="nav-link <?= $active ?>">
                                <i class="fas fa-angle-right"></i>
                                <p><?= $subopcion->opcion_submenu ?></p>
                              </a>
                            </li>
                          <?
                        }
                      }
                    }
                    ?>
                    
                  </ul>
                </li>
              <?
            }
          }
          ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>