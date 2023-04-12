<h1 class="text-center">Gestión Estado Pago</h1>
<a href="estado_pago.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Estado Pago</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estadopago):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $estadopago["id_estado_pago"] ?>
                </td>
                <td scope="row">
                    <?php echo $estadopago["estado_pago"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estado_pago.php?action=edit&id=<?php echo $estadopago["id_estado_pago"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estado_pago.php?action=delete&id=<?php echo $estadopago["id_estado_pago"] ?>"
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