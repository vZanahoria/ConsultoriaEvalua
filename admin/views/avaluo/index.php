<div class="container">

    <h1 class="text-center">Avaluo</h1>

    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="avaluo.php?action=new" role="button">Ingresar un nuevo avaluo</a>
            </p>
        </div>

        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="avaluo.php?action=grafica" role="button"><i
                    class="bi bi-bar-chart-fill"></i>
                Grafica</a>
        </div>
        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=avaluo" role="button"><i
                    class="bi bi-file-earmark-spreadsheet"></i>
                Generar Excel</a>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" target="_blank" href="generarPDF.php?modelo=avaluo" role="button"><i
                    class="bi bi-filetype-pdf"></i>
                Generar PDF</a>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-dark">
                        <th scope="col">#</th>
                        <th scope="col">Valor Reposición</th>
                        <th scope="col">Valor Mercado</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Estado Pago</th>
                        <th scope="col">Estado Avaluo</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Valuador</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $avaluo):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $avaluo["id_avaluo"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["valor_reposicion"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["valor_mercado"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["observaciones"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["estado_pago"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["estado_avaluo"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["ubicacion"] ?>
                            </td>
                            <td>
                                <?php echo $avaluo["valuador"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="avaluo.php?action=edit&id=<?php echo $avaluo["id_avaluo"] ?>" type="button"
                                        class="btn btn-primary">Modificar</a>
                                    <a href="avaluo.php?action=delete&id=<?php echo $avaluo["id_avaluo"] ?>" type="button"
                                        class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="9">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            &nbsp;
        </div>
    </div>
    <div class="row">

    </div>

</div>