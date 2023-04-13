<h1 class="text-center">Gestión Estado Reclamación</h1>
<a href="estado_reclamacion.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Estado Reclamación</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estadoreclamacion):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $estadoreclamacion["id_estado_reclamacion"] ?>
                </td>
                <td scope="row">
                    <?php echo $estadoreclamacion["estado_reclamacion"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estado_reclamacion.php?action=edit&id=<?php echo $estadoreclamacion["id_estado_reclamacion"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estado_reclamacion.php?action=delete&id=<?php echo $estadoreclamacion["id_estado_reclamacion"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </tbody>
</table>