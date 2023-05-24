<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Reclamaciones
</h1>

<form class="container-fluid" method="POST" action="reclamaciones.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="descripcion">Descripcion:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="descripcion" name="data[descripcion]"
                value="<?php echo isset($data[0]['descripcion']) ? $data[0]['descripcion'] : ''; ?>" 
                maxlength="500">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="fecha_reclamo">Fecha Reclamo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="date" class="" id="fecha_reclamo" name="data[fecha_reclamo]"
                value="<?php echo isset($data[0]['fecha_reclamo']) ? $data[0]['fecha_reclamo'] : ''; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_estado_reclamacion">Estado Reclamación:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado_reclamacion]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstadoReclamaciones as $key => $ers):
                    if ($ers['id_estado_reclamacion'] == $data[0]['id_estado_reclamacion']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $ers['id_estado_reclamacion']; ?>" <?php echo $selected; ?>>
                        <?php echo $ers['estado_reclamacion']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_naturaleza">Naturaleza Reclamación:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_naturaleza]" required="required">
                <?php
                $selected = " ";
                foreach ($dataNaturalezaReclamacion as $key => $nrn):
                    if ($nrn['id_naturaleza'] == $data[0]['id_naturaleza']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $nrn['id_naturaleza']; ?>" <?php echo $selected; ?>>
                        <?php echo $nrn['naturaleza_reclamacion']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_cliente">Cliente:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_cliente]" required="required">
                <?php
                $selected = " ";
                foreach ($dataCliente as $key => $cli):
                    if ($cli['id_cliente'] == $data[0]['id_cliente']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $cli['id_cliente']; ?>" <?php echo $selected; ?>>
                        <?php echo $cli['cliente']; ?></option>
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
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_reclamacion]"
            value="<?php echo isset($data[0]['id_reclamacion']) ? $data[0]['id_reclamacion'] : ''; ?>" class="" />
    <? endif; ?>
</form>