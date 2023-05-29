<div class="container">
<h1 class="text-center">Roles del usuario:
    <?php echo $data[0]['correo']; ?>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="usuario.php?action=newrole&id=<?php echo $id ?>" role="button">Agregar
                    Roles</a>
            </p>
        </div>
    </div>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col" class="col-md-2">Rol</th>
                <th scope="col" class="col-md-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data_rol as $key => $rol):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $rol["rol"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="usuario.php?action=editrole&id=<?php echo $data[0]["id_usuario"]; ?>&id_rol=<?php echo $rol["id_rol"]; ?>"
                                type="button" class="btn btn-primary">Editar</a>
                            <a href="usuario.php?action=deleterole&id=<?php echo $data[0]["id_usuario"]; ?>&id_rol=<?php echo $rol["id_rol"]; ?>"
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