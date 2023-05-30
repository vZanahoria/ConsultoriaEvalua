<div class="container">

    <h1 class="text-center">Reclamaciones</h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="reclamaciones.php?action=new" role="button">Ingresar una nueva
                    reclamación</a>
            </p>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=reclamaciones" role="button"><i
                    class="bi bi-file-earmark-spreadsheet"></i>
                Generar Excel</a>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" target="_blank" href="generarPDF.php?modelo=reclamaciones" role="button"><i
                    class="bi bi-filetype-pdf"></i>
                Generar PDF</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-dark">
                        <th scope="col">ID Reclamación</th>
                        <th scope="col">ID Avaluo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha Reclamo</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Estado Reclamación</th>
                        <th scope="col">Naturaleza Reclamación</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $reclamaciones):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $reclamaciones["id_reclamacion"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["id_avaluo"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["descripcion"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["fecha_reclamo"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["cliente"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["estado_reclamacion"] ?>
                            </td>
                            <td>
                                <?php echo $reclamaciones["naturaleza_reclamacion"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="reclamaciones.php?action=edit&id=<?php echo $reclamaciones["id_reclamacion"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="reclamaciones.php?action=delete&id=<?php echo $reclamaciones["id_reclamacion"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="8">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>