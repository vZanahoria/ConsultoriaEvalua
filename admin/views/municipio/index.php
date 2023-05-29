<div class="container">
    <h1 class="text-center">Municipio</h1>
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="municipio.php?action=new" role="button">Ingresar un municipio nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered table-striped">
                <thead class="thead-dark">
                    <tr class="table-dark">
                        <th scope="col">#</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $municipio):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $municipio["id_municipio"] ?>
                            </td>
                            <td>
                                <?php echo $municipio["municipio"] ?>
                            </td>
                            <td>
                                <?php echo $municipio["estado"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="municipio.php?action=edit&id=<?php echo $municipio["id_municipio"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="municipio.php?action=delete&id=<?php echo $municipio["id_municipio"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="3">
                            Se encontraron
                            <?php echo $nReg ?> registros.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>