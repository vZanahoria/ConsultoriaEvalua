<h1 class="text-center">Visita</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="visita.php?action=new" role="button">Ingresar una nueva visita</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
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
                                    <a href="visita.php?action=edit&id=<?php echo $visita["id_visita"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="visita.php?action=delete&id=<?php echo $visita["id_visita"] ?>"
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