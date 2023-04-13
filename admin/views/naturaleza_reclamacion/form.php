<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Naturaleza Reclamación</h1>
<form method="POST" action="naturaleza_reclamacion.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Naturaleza ReclAmación:</label>
        <input type="text" name="data[naturaleza_reclamacion]" class="form-control" placeholder="Naturaleza Reclamacion"
            value="<?php echo isset($data[0]['naturaleza_reclamacion']) ? $data[0]['naturaleza_reclamacion'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_naturaleza]"
                value="<?php echo isset($data[0]['id_naturaleza']) ? $data[0]['id_naturaleza'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>