<div class="container">
<h1 class="text-center">Gestión Conservación Propiedad</h1>
<a href="conservacion_propiedad.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered table-striped">
    <thead class="thead-dark">
        <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Conservación Propiedad</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $conservacionpropiedad):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $conservacionpropiedad["id_conservacion"] ?>
                </td>
                <td scope="row">
                    <?php echo $conservacionpropiedad["conservacion"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="conservacion_propiedad.php?action=edit&id=<?php echo $conservacionpropiedad["id_conservacion"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="conservacion_propiedad.php?action=delete&id=<?php echo $conservacionpropiedad["id_conservacion"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>
</div>