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
  if ($submenu2!=false) {
     foreach ($submenu2->result() as $subopcion2) {
        if ($subopcion2->orden_submenu == 9 && $subopcion2->activo_submenu2 == 1) {
          ?>
            <div class="col-xs-12 col-md-3 col-lg-3">
              <a class="btn btn-lg bg-gradient-success btn-block mb-2" href="<?= $subopcion2->ruta_submenu2 ?>" title="Ir a <?= $subopcion2->opcion_submenu2 ?>">
                <div>
                  <i class="fas fa-check-circle"></i>
                </div>  
                <?= $subopcion2->opcion_submenu2 ?>
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