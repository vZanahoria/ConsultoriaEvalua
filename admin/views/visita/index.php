<div class="container">
    <h1 class="text-center">Visita</h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="visita.php?action=new" role="button">Ingresar una nueva visita</a>
            </p>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=visita" role="button"><i
                    class="bi bi-file-earmark-spreadsheet"></i>
                Generar Excel</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-dark">
                        <th scope="col">ID Visita</th>
                        <th scope="col">ID Avaluo</th>
                        <th scope="col">Fecha Visita</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Valuador</th>
                        <th scope="col">Estado Visita</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $visita):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $visita["id_visita"] ?>
                            </td>
                            <td>
                                <?php echo $visita["id_avaluo"] ?>
                            </td>
                            <td>
                                <?php echo $visita["fecha_visita"] ?>
                            </td>
                            <td>
                                <?php echo $visita["ubicacion"] ?>
                            </td>
                            <td>
                                <?php echo $visita["valuador"] ?>
                            </td>
                            <td>
                                <?php echo $visita["estado_visita"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="visita.php?action=edit&id=<?php echo $visita["id_visita"] ?>" type="button"
                                        class="btn btn-primary">Modificar</a>
                                    <a href="visita.php?action=delete&id=<?php echo $visita["id_visita"] ?>" type="button"
                                        class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="7">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>