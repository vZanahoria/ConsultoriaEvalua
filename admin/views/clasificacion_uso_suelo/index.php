<div class="container">
    <h1 class="text-center">Gestión Clasificación de Uso de Suelo</h1>
    <a href="clasificacion_uso_suelo.php?action=new" class="btn btn-success">Nuevo</a>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Clasificación Uso Suelo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $usosuelo):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $usosuelo["id_clasificacion_uso"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $usosuelo["clasificacion_uso_suelo"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="clasificacion_uso_suelo.php?action=edit&id=<?php echo $usosuelo["id_clasificacion_uso"] ?>"
                                type="button" class="btn btn-primary">Modificar</a>
                            <a href="clasificacion_uso_suelo.php?action=delete&id=<?php echo $usosuelo["id_clasificacion_uso"] ?>"
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