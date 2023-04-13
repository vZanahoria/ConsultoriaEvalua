<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Estado Reclamación</h1>
<form method="POST" action="estado_reclamacion.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estado Reclamación:</label>
        <input type="text" name="data[estado_reclamacion]" class="form-control" placeholder="Estado Reclamación"
            value="<?php echo isset($data[0]['estado_reclamacion']) ? $data[0]['estado_reclamacion'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado_reclamacion]"
                value="<?php echo isset($data[0]['id_estado_reclamacion']) ? $data[0]['id_estado_reclamacion'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>