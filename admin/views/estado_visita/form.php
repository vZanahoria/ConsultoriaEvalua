<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Estado Visita</h1>
<form method="POST" action="estado_visita.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estado Visita:</label>
        <input type="text" name="data[estado_visita]" class="form-control" placeholder="Estado Visita"
            value="<?php echo isset($data[0]['estado_visita']) ? $data[0]['estado_visita'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado_visita]"
                value="<?php echo isset($data[0]['id_estado_visita']) ? $data[0]['id_estado_visita'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>