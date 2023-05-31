<div class="container">
<h1 class="text-center">Usuario</h1>
    <div class="row">

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class=table-dark>
                        <th scope="col">Correo</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $usuario):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $usuario["correo"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="usuario.php?action=role&id=<?php echo $usuario["id_usuario"] ?>"
                                        type="button" class="btn btn-warning">Roles</a>
                                    <a href="usuario.php?action=edit&id=<?php echo $usuario["id_usuario"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="usuario.php?action=delete&id=<?php echo $usuario["id_usuario"] ?>"
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