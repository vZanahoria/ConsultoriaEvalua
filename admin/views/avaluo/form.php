<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Avaluo
</h1>

<form class="container-fluid" method="POST" action="avaluo.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="valor_reposicion">Valor Reposición:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="valor_reposicion" name="data[valor_reposicion]"
                value="<?php echo isset($data[0]['valor_reposicion']) ? $data[0]['valor_reposicion'] : ''; ?>" 
                maxlength="300">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="valor_mercado">Valor Mercado:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="valor_mercado" name="data[valor_mercado]"
                value="<?php echo isset($data[0]['valor_mercado']) ? $data[0]['valor_mercado'] : ''; ?>" 
                maxlength="300">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="observaciones">Observaciones:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="observaciones" name="data[observaciones]"
                value="<?php echo isset($data[0]['observaciones']) ? $data[0]['observaciones'] : ''; ?>" 
                maxlength="300">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_estado_pago">Estado Pago:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado_pago]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstadoPago as $key => $epo):
                    if ($epo['id_estado_pago'] == $data[0]['id_estado_pago']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $epo['id_estado_pago']; ?>" <?php echo $selected; ?>>
                        <?php echo $epo['estado_pago']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_estado_avaluo">Estado Avaluo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado_avaluo]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstadoAvaluo as $key => $eav):
                    if ($eav['id_estado_avaluo'] == $data[0]['id_estado_avaluo']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $eav['id_estado_avaluo']; ?>" <?php echo $selected; ?>>
                        <?php echo $eav['estado_avaluo']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="ubicacion">Ubicacion:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="ubicacion" name="data[ubicacion]"
                value="<?php echo isset($data[0]['ubicacion']) ? $data[0]['ubicacion'] : ''; ?>" minlength="3"
                maxlength="300">
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
        <input type="hidden" name="data[id_avaluo]"
            value="<?php echo isset($data[0]['id_avaluo']) ? $data[0]['id_avaluo'] : ''; ?>" class="" />
    <? endif; ?>
</form>