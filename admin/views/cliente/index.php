<div class="container">
    <h1 class="text-center">Gestión de Clientes</h1>
    <div class="row">
        <div class="col-3">
            <a href="cliente.php?action=new" class="btn btn-success">Nuevo Cliente</a>
        </div>
        <div class="col-2">
            &nbsp;
        </div>
        <div class="col-2">
            <a class="btn btn-success" target="_blank" href="generarExcel.php?modelo=cliente" role="button"><i
                    class="bi bi-file-earmark-spreadsheet"></i>
                Generar Excel</a>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" target="_blank" href="generarPDF.php?modelo=cliente" role="button"><i
                    class="bi bi-filetype-pdf"></i>
                Generar PDF</a>
        </div>
    </div>
    <table class="table table-responsive table-bordered table-striped">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $cliente):
                $nReg++; ?>
                <tr>
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
                    <td scope="row">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="cliente.php?action=edit&id=<?php echo $cliente['id_cliente'] ?>" type="button"
                                class="btn btn-primary">Editar</a>
                            <a href="cliente.php?action=delete&id=<?php echo $cliente['id_cliente'] ?>" type="button"
                                class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="7">
                    Se encontraron <?php echo $nReg ?> registros.
                </th>
            </tr>
        </tbody>
    </table>
</div>
