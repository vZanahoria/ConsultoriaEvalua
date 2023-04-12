<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Estado Avaluo</h1>
<form method="POST" action="estado_avaluo.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estado Avaluo:</label>
        <input type="text" name="data[estado_avaluo]" class="form-control" placeholder="Estado Avaluo"
            value="<?php echo isset($data[0]['estado_avaluo']) ? $data[0]['estado_avaluo'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado_avaluo]"
                value="<?php echo isset($data[0]['id_estado_avaluo']) ? $data[0]['id_estado_avaluo'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>