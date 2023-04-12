<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Estado Pago</h1>
<form method="POST" action="estado_pago.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Estado Pago:</label>
        <input type="text" name="data[estado_pago]" class="form-control" placeholder="Estado Pago"
            value="<?php echo isset($data[0]['estado_pago']) ? $data[0]['estado_pago'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_estado_pago]"
                value="<?php echo isset($data[0]['id_estado_pago']) ? $data[0]['id_estado_pago'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>