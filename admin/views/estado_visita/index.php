<h1 class="text-center">Gestión Estado Visita</h1>
<a href="estado_visita.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Estado Visita</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estadovisita):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $estadovisita["id_estado_visita"] ?>
                </td>
                <td scope="row">
                    <?php echo $estadovisita["estado_visita"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estado_visita.php?action=edit&id=<?php echo $estadovisita["id_estado_visita"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estado_visita.php?action=delete&id=<?php echo $estadovisita["id_estado_visita"] ?>"
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