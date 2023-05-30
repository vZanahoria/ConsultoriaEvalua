<div class="container">
    <h1 class="text-center">Gestión Localidad</h1>
    <a href="localidad.php?action=new" class="btn btn-success">Nuevo</a>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Localidad</th>
                <th scope="col">Municipio</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $localidad):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $localidad["id_localidad"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $localidad["localidad"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $localidad["municipio"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="localidad.php?action=edit&id=<?php echo $localidad["id_localidad"] ?>" type="button"
                                class="btn btn-primary">Modificar</a>
                            <a href="localidad.php?action=delete&id=<?php echo $localidad["id_localidad"] ?>" type="button"
                                class="btn btn-danger">Eliminar</a>
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