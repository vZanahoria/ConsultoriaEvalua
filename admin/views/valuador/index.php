<div class="container">
    <h1 class="text-center">Gestión de Valuadores</h1>
    <a href="valuador.php?action=new" class="btn btn-success">Nuevo Valuador</a>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Foto</th>
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
            <td>
                <?php echo (isset($empleado['foto'])) ? '<img width="100px" src="' . $empleado['foto'] . '"/>' : ""; ?>
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
                <a href="valuador.php?action=foto&id=<?php echo $valuador["id_valuador"] ?>"
                                        type="button" class="btn btn-dark">Foto</a>    
                <a href="valuador.php?action=edit&id=<?php echo $valuador['id_valuador'] ?>" type="button"
                        class="btn btn-primary">Editar</a>
                </div>

            </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="6">
                Se encontraron
                <?php echo $nReg ?> registros.
            </th>
        </tr>
        </thead>
    </table>
</div>