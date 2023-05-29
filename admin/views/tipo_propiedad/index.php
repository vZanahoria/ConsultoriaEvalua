<div class="container">
    <h1 class="text-center">Gestión Tipo Propiedad</h1>
    <a href="tipo_propiedad.php?action=new" class="btn btn-success">Nuevo</a>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Tipo Propiedad</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $tipopropiedad):
                $nReg++; ?>
                <tr>
                    <td scope="row">
                        <?php echo $tipopropiedad["id_tipo_propiedad"] ?>
                    </td>
                    <td scope="row">
                        <?php echo $tipopropiedad["tipo_propiedad"] ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="tipo_propiedad.php?action=edit&id=<?php echo $tipopropiedad["id_tipo_propiedad"] ?>"
                                type="button" class="btn btn-primary">Modificar</a>
                            <a href="tipo_propiedad.php?action=delete&id=<?php echo $tipopropiedad["id_tipo_propiedad"] ?>"
                                type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">
                    Se encontraron
                    <?php echo $nReg ?> registros.
                </th>
            </tr>
        </tbody>
    </table>
</div>