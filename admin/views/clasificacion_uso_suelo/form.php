<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Clasificación Uso de Suelo</h1>
<form method="POST" action="clasificacion_uso_suelo.php?action=<?php echo $action; ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Clasificación Uso de Suelo:</label>
        <input type="text" name="data[clasificacion_uso_suelo]" class="form-control" placeholder="Clasificacion"
            value="<?php echo isset($data[0]['clasificacion_uso_suelo']) ? $data[0]['clasificacion_uso_suelo'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_clasificacion_uso]"
                value="<?php echo isset($data[0]['id_clasificacion_uso']) ? $data[0]['id_clasificacion_uso'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>