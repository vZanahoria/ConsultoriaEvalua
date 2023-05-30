<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> Localidad</h1>
<form method="POST" action="localidad.php?action=<?php echo $action; ?>">
<div class="row">
        <div class="col-2">
            <label for="localidad">Localidad:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="localidad" name="data[localidad]"
                value="<?php echo isset($data[0]['localidad']) ? $data[0]['localidad'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>
    <?php
    ?>
    <div class="row">
        <div class="col-2">
            <label for="municipio">Municipio:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_municipio]" required="required">
                <?php
                $selected = " ";
                foreach ($dataMunicipios as $key => $mun):
                    if ($mun['id_municipio'] == $data[0]['id_municipio']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $mun['id_municipio']; ?>" <?php echo $selected; ?>>
                        <?php echo $mun['municipio']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
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