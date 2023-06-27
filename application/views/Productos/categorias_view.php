<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h2>Categorias</h2>

    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($categorias!=false) {
                    $contador = 0;
                    foreach ($categorias->result() as $categoria) {
                        ?>
                        <tr>
                            <td><?= ++$contador ?></td>
                            <td><?= $categoria->nombre ?></td>
                            <td><?= ($categoria->activo==1) ? 'Activo':'Inactivo' ?></td>
                            <td>
                                <a href="<?= base_url('index.php/actualizar_categoria/'.$categoria->id_categorias) ?>">Actualizar</a>
                                <a href="<?= base_url('index.php/eliminar_categoria/'.$categoria->id_categorias) ?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>

</body>
</html>