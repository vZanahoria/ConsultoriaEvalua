<div class="container">
<h1 class="text-center">Gestión Estado Avaluo</h1>
<a href="estado_avaluo.php?action=new" class="btn btn-success">Nuevo</a>
<table class="table table-responsive table-bordered table-striped">
    <thead class="thead-dark">
        <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Estado Avaluo</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $estadoavaluo):
            $nReg++; ?>
            <tr>
                <td scope="row">
                    <?php echo $estadoavaluo["id_estado_avaluo"] ?>
                </td>
                <td scope="row">
                    <?php echo $estadoavaluo["estado_avaluo"] ?>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="estado_avaluo.php?action=edit&id=<?php echo $estadoavaluo["id_estado_avaluo"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="estado_avaluo.php?action=delete&id=<?php echo $estadoavaluo["id_estado_avaluo"] ?>"
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