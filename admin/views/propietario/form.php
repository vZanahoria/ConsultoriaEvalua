<h1 class="text-center">
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> propietario
</h1>
<form class="container-fluid" method="POST" action="propietario.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">
    
    <div class="row">
        <div>
            <label for="propietario">Correo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="correo" name="data[correo]"
                value="<?php echo isset($data[0]['correo']) ? $data[0]['correo'] : ''; ?>"
                maxlength="100">
        </div>
    </div>

    </div>
    <div class="row">
        <div>
            <label for="propietario">Apellido Paterno:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="apellido_paterno" name="data[apellido_paterno]"
                value="<?php echo isset($data[0]['apellido_paterno']) ? $data[0]['apellido_paterno'] : ''; ?>"
                maxlength="50">
        </div>
    </div>
    <div class="row">
        <div>
            <label for="propietario">Apellido Materno:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="apellido_materno" name="data[apellido_materno]"
                value="<?php echo isset($data[0]['apellido_materno']) ? $data[0]['apellido_materno'] : ''; ?>"
                maxlength="50">
        </div>
    </div>
    <div class="row">
        <div>
            <label for="propietario">Nombre:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="nombre" name="data[nombre]"
                value="<?php echo isset($data[0]['nombre']) ? $data[0]['nombre'] : ''; ?>" maxlength="100">
        </div>
    </div>
    <div class="row">
        <div>
            <label for="propietario">Telefono:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="telefono" name="data[telefono]"
                value="<?php echo isset($data[0]['telefono']) ? $data[0]['telefono'] : ''; ?>" minlength="10"
                maxlength="15">
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_propietario]"
            value="<?php echo isset($data[0]['id_propietario']) ? $data[0]['id_propietario'] : ''; ?>" class="" />
    <? endif; ?>

</form>