<div class="container">
<h1 class="text-center">Roles</h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="rol.php?action=new" role="button">Ingresar un rol nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-dark">
                        <th scope="col">Rol</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $rol):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $rol["rol"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="rol.php?action=privilege&id=<?php echo $rol["id_rol"] ?>"
                                        type="button" class="btn btn-warning">Privilegios</a>
                                    <a href="rol.php?action=edit&id=<?php echo $rol["id_rol"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="rol.php?action=delete&id=<?php echo $rol["id_rol"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="2">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>