<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Rol
</h1>

<form class="container-fluid" method="POST" action="rol.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="rol">Rol:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" id="rol" name="data[rol]"
                value="<?php echo isset($data[0]['rol']) ? $data[0]['rol'] : ''; ?>"
                maxlength="100">
        </div>
    </div>

    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_rol]"
            value="<?php echo isset($data[0]['id_rol']) ? $data[0]['id_rol'] : ''; ?>" class="" />
    <? endif; ?>
</form>