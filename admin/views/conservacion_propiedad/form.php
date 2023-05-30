<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Conservación Propiedad</h1>
<form method="POST" action="conservacion_propiedad.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Conservación Propiedad:</label>
        <input type="text" name="data[conservacion]" class="form-control" placeholder="Conservación Propiedad"
            value="<?php echo isset($data[0]['conservacion']) ? $data[0]['conservacion'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_conservacion]"
                value="<?php echo isset($data[0]['id_conservacion']) ? $data[0]['id_conservacion'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>