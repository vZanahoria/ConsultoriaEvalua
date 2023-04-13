<h1 class="text-center">Gestión Naturaleza Reclamación</h1>
<a href="naturaleza_reclamacion.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naturaleza Reclamacion</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $naturaleza):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $naturaleza["id_naturaleza"] ?>
                </td>
                <td scope="row">
                    <?php echo $naturaleza["naturaleza_reclamacion"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="naturaleza_reclamacion.php?action=edit&id=<?php echo $naturaleza["id_naturaleza"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="naturaleza_reclamacion.php?action=delete&id=<?php echo $naturaleza["id_naturaleza"] ?>"
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