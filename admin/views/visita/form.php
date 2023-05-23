<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Visita
</h1>

<form class="container-fluid" method="POST" action="visita.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="fecha_visita">Fecha Visita:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_visita" name="data[fecha_visita]"
                value="<?php echo isset($data[0]['fecha_visita']) ? $data[0]['fecha_visita'] : ''; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_estado_visita">Estado Visita:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado_visita]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstadoVisita as $key => $eva):
                    if ($eva['id_estado_visita'] == $data[0]['id_estado_visita']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $eva['id_estado_visita']; ?>" <?php echo $selected; ?>>
                        <?php echo $eva['estado_visita']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_avaluo">ID Avaluo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_avaluo]" required="required">
                <?php
                $selected = " ";
                foreach ($dataAvaluo as $key => $ava):
                    if ($ava['id_avaluo'] == $data[0]['id_avaluo']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $ava['id_avaluo']; ?>" <?php echo $selected; ?>>
                        <?php echo $ava['id_avaluo']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_valuador">Valuador:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_valuador]" required="required">
                <?php
                $selected = " ";
                foreach ($dataValuador as $key => $val):
                    if ($val['id_valuador'] == $data[0]['id_valuador']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $val['id_valuador']; ?>" <?php echo $selected; ?>>
                        <?php echo $val['valuador']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="row">
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_visita]"
            value="<?php echo isset($data[0]['id_visita']) ? $data[0]['id_visita'] : ''; ?>" class="" />
    <? endif; ?>
</form>