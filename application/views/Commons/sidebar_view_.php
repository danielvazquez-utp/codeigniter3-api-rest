  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= base_url('vendor') ?>/dist/img/logos/nutrimotor-logo-bn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Food Math Lab</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('vendor') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $usuario ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                    <i class="nav-icon <?= $opcion->icono ?>"></i>
                    <p>
                      <i class="right fas fa-angle-left"></i>
                      <?= $opcion->opcion ?>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: <?= $arbol_abierto ?>">
                    <?
                    if ($submenu!=false) {
                      foreach ($submenu->result() as $subopcion) {
                        $active = '';
                        if ($this->uri->segment(1) == $subopcion->ruta_submenu) {
                          $active= 'active';
                        }
                        ?>
                          <li class="nav-item" style="margin-left: 1rem;">
                            <a href="<?= $subopcion->ruta_submenu ?>" class="nav-link <?= $active ?>">
                              <i class="fas fa-angle-right"></i>
                              <p><?= $subopcion->opcion_submenu ?></p>
                            </a>
                          </li>
                        <?
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