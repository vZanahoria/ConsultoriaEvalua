<div class="container">

    <h1 class="text-center">Propiedad</h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="propiedad.php?action=new" role="button">Ingresar una nueva propiedad</a>
            </p>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=propiedad" role="button"><i
                    class="bi bi-file-earmark-spreadsheet"></i>
                Generar Excel</a>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" target="_blank" href="generarPDF.php?modelo=propiedad" role="button"><i
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
                        <th scope="col">Ubicación</th>
                        <th scope="col">Código Postal</th>
                        <th scope="col">Localidad</th>
                        <th scope="col">Tipo Propiedad</th>
                        <th scope="col">Clasificación Uso Suelo</th>
                        <th scope="col">Conservación</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $propiedad):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $propiedad["id_propiedad"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["ubicacion"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["codigo_postal"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["localidad"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["tipo_propiedad"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["clasificacion_uso_suelo"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["conservacion"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["propietario"] ?>
                            </td>
                            <td>
                                <?php echo $propiedad["cliente"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="propiedad.php?action=edit&id=<?php echo $propiedad["id_propiedad"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="propiedad.php?action=delete&id=<?php echo $propiedad["id_propiedad"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="10">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>