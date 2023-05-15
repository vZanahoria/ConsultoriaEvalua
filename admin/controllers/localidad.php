<h1 class="text-center">Localidad</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="localidad.php?action=new" role="button">Ingresar una localidad nueva</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Localidad</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $localidad):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $localidad["id_localidad"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["localidad"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["descripcion"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["fecha_inicio"] ?>
                            </td>
                            <td>
                                <?php echo $proyecto["fecha_fin"] ?>
                            </td>

                            <td>
                                <?php echo $proyecto["archivo"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a target="_blank"
                                        href="reporte.php?action=proyecto&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-warning">Imprimir</a>
                                    <a href="proyecto.php?action=task&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-dark">Tareas</a>
                                    <a href="proyecto.php?action=edit&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="proyecto.php?action=delete&id=<?php echo $proyecto["id_proyecto"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>