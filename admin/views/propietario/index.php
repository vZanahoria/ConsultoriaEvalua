<h1 class="text-center">Gestión de propietarios</h1>
<div class="row">
    <div class="col-3">
    <a href="propietario.php?action=new" class="btn btn-success">Nuevo propietario</a>
    </div>
    <div class="col-2">
    </div>
    <div class="col-2">
    <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=propietario" role="button"><i
                class="bi bi-file-earmark-spreadsheet"></i>
            Generar Excel</a>
    </div>
</div>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Opciones</th>
        </tr>
    <tbody>
    </tbody>
    <?php $nReg = 0;
    foreach ($data as $key => $propietario):
        $nReg++; ?>
        <td scope="row">
            <?php echo $propietario['id_propietario'] ?>
        </td>
        <td scope="row">
            <?php echo $propietario['apellido_paterno'] ?>
        </td>
        <td scope="row">
            <?php echo $propietario['apellido_materno'] ?>
        </td>
        <td scope="row">
            <?php echo $propietario['nombre'] ?>
        </td>
        <td scope="row">
            <?php echo $propietario['telefono'] ?>
        </td>
        <td scope="row">
            <?php echo $propietario['correo'] ?>
        </td>
        <th>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="propietario.php?action=edit&id=<?php echo $propietario['id_propietario'] ?>" type="button"
                    class="btn btn-primary">Editar</a>
                <a href="propietario.php?action=delete&id=<?php echo $propietario['id_propietario'] ?>" type="button"
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