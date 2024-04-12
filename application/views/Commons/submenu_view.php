  <!-- Main content -->
<section class="content">

    <?php
    //print_r($divisiones);
    ?>

    <!--
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Módulos</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>División</label>
          <select class="form-control" name="division" id="division">
            <option value="">-Seleccione-</option>
            <?
            if(count($divisiones)>0){
              foreach($divisiones["data"] as $key=>$val){
                ?>
                  <option value="<?= $val["id"] ?>"><?= $val["nombre"] ?></option>
                <?
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Programa académico</label>
          <select class="form-control" name="programa" id="programa" disabled="disabled">
            <option value="">-Seleccione-</option>
          </select>
        </div>
        <div class="form-group">
          <label>Materias</label>
          <select class="form-control" name="materia" id="materia" disabled="disabled">
            <option value="">-Seleccione-</option>
          </select>
        </div>
      </div>
      <div class="card-footer"></div>
    </div>
    -->

    <?php
    //print_r($submenu->result());
    ?>

    <div class="row">

      <?
      if ($submenu!=false) {
         foreach ($submenu->result() as $subopcion) {
            if ($subopcion->id_opcion == $opcion && $subopcion->activo_submenu == 1) {
              ?>
                <div class="col-xs-12 col-md-3 col-lg-3">
                  <a class="btn btn-lg bg-gradient-success btn-block mb-2" href="<?= base_url($subopcion->ruta_submenu) ?>" title="Ir a <?= $subopcion->opcion_submenu ?>">
                    <div>
                      <i class="fas fa-check-circle"></i>
                    </div>  
                    <?= $subopcion->opcion_submenu ?>
                  </a>
                </div>
              <?
            }
         }
       } 
      ?>

    </div>

</section>
<!-- /.content -->