<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Localidad</h1>
<form method="POST" action="localidad.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Localidad:</label>
        <input type="text" name="data[localidad]" class="form-control" placeholder="Localidad"
            value="<?php echo isset($data[0]['localidad']) ? $data[0]['localidad'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_localidad]"
                value="<?php echo isset($data[0]['id_localidad']) ? $data[0]['id_localidad'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>