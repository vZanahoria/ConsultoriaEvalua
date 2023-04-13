<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Tipo Propiedad</h1>
<form method="POST" action="tipo_propiedad.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tipo Propiedad:</label>
        <input type="text" name="data[tipo_propiedad]" class="form-control" placeholder="Tipo Propiedad"
            value="<?php echo isset($data[0]['tipo_propiedad']) ? $data[0]['tipo_propiedad'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_tipo_propiedad]"
                value="<?php echo isset($data[0]['id_tipo_propiedad']) ? $data[0]['id_tipo_propiedad'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>