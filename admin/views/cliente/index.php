<h1 class="text-center">Gestión de Clientes</h1>
<a href="cliente.php?action=new" class="btn btn-success">Nuevo Cliente</a>
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
        foreach ($data as $key => $cliente):
            $nReg++; ?>
            <td scope="row">
                <?php echo $cliente['id_cliente'] ?>
            </td>
            <td scope="row">
                <?php echo $cliente['apellido_paterno'] ?>
            </td>
            <td scope="row">
                <?php echo $cliente['apellido_materno'] ?>
            </td>
            <td scope="row">
                <?php echo $cliente['nombre'] ?>
            </td>
            <td scope="row">
                <?php echo $cliente['telefono'] ?>
            </td>
            <td scope="row">
                <?php echo $cliente['correo'] ?>
            </td>
            <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="cliente.php?action=edit&id=<?php echo $cliente['id_cliente'] ?>" type="button"
                        class="btn btn-primary">Editar</a>
                    <a href="cliente.php?action=delete&id=<?php echo $cliente['id_cliente'] ?>" type="button"
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