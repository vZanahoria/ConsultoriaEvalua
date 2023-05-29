<div class="container">
    <h1 class="text-center">Privilegios del rol:
        <?php echo $data[0]['rol']; ?>
    </h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="rol.php?action=newprivilege&id=<?php echo $id ?>" role="button">Agregar
                    Privilegios</a>
            </p>
        </div>
    </div>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col" class="col-md-2">Privilegio</th>
                <th scope="col" class="col-md-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data_privilegio as $key => $privilegio):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $privilegio["privilegio"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="rol.php?action=editprivilege&id=<?php echo $data[0]["id_rol"]; ?>&id_privilegio=<?php echo $privilegio["id_privilegio"]; ?>"
                                type="button" class="btn btn-primary">Editar</a>
                            <a href="rol.php?action=deleteprivilege&id=<?php echo $data[0]["id_rol"]; ?>&id_privilegio=<?php echo $privilegio["id_privilegio"]; ?>"
                                type="button" class="btn btn-danger">Eliminar</a>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="2">
                    Se encontraron
                    <?php echo $nReg ?> registros.
                </th>
            </tr>
        </tbody>
    </table>
</div>