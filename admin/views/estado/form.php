<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Estado</h1>
<form method="POST" action="estado.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estado:</label>
        <input type="text" name="data[estado]" class="form-control" placeholder="Estado"
            value="<?php echo isset($data[0]['estado']) ? $data[0]['estado'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado]"
                value="<?php echo isset($data[0]['id_estado']) ? $data[0]['id_estado'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>