<h1 class="text-center">Gestión de Valuadores</h1>
<a href="valuador.php?action=new" class="btn btn-success">Nuevo Valuador</a>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Opciones</th>
        </tr>
        <tbody>
        </tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $valuador):
            $nReg++; ?>
            <td scope="row">
                <?php echo $valuador['id_valuador'] ?>
            </td>
            <td scope="row">
                <?php echo $valuador['apellido_paterno'] ?>
            </td>
            <td scope="row">
                <?php echo $valuador['apellido_materno'] ?>
            </td>
            <td scope="row">
                <?php echo $valuador['nombre'] ?>
            </td>
            <td scope="row">
                <?php echo $valuador['telefono'] ?>
            </td>
            <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="valuador.php?action=edit&id=<?php echo $valuador['id_valuador'] ?>" type="button"
                        class="btn btn-primary">Editar</a>
                    <a href="valuador.php?action=delete&id=<?php echo $valuador['id_valuador'] ?>" type="button"
                        class="btn btn-danger">Eliminar</a>
                </div>

            </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
    </thead>
</table>