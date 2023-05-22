<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Propiedad
</h1>

<form class="container-fluid" method="POST" action="propiedad.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

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
            <label for="codigo_postal">Código Postal:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="codigo_postal" name="data[codigo_postal]"
                value="<?php echo isset($data[0]['codigo_postal']) ? $data[0]['codigo_postal'] : ''; ?>" minlength="5"
                maxlength="10">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_localidad">Localidad:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_localidad]" required="required">
                <?php
                $selected = " ";
                foreach ($dataLocalidad as $key => $loc):
                    if ($loc['id_localidad'] == $data[0]['id_localidad']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $loc['id_localidad']; ?>" <?php echo $selected; ?>>
                        <?php echo $loc['localidad']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_tipo_propiedad">Tipo Propiedad:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_tipo_propiedad]" required="required">
                <?php
                $selected = " ";
                foreach ($dataTipoPropiedad as $key => $tip):
                    if ($tip['id_tipo_propiedad'] == $data[0]['id_tipo_propiedad']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tip['id_tipo_propiedad']; ?>" <?php echo $selected; ?>>
                        <?php echo $tip['tipo_propiedad']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_clasificacion_uso">Clasificación Uso Suelo:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_clasificacion_uso]" required="required">
                <?php
                $selected = " ";
                foreach ($dataClasificacionUso as $key => $cus):
                    if ($cus['id_clasificacion_uso'] == $data[0]['id_clasificacion_uso']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $cus['id_clasificacion_uso']; ?>" <?php echo $selected; ?>>
                        <?php echo $cus['clasificacion_uso_suelo']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_conservacion">Conservación:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_conservacion]" required="required">
                <?php
                $selected = " ";
                foreach ($dataConservacion as $key => $con):
                    if ($con['id_conservacion'] == $data[0]['id_conservacion']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $con['id_conservacion']; ?>" <?php echo $selected; ?>>
                        <?php echo $con['conservacion']; ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_propietario">Propietario:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_propietario]" required="required">
                <?php
                $selected = " ";
                foreach ($dataPropietario as $key => $pro):
                    if ($pro['id_propietario'] == $data[0]['id_propietario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $pro['id_propietario']; ?>" <?php echo $selected; ?>>
                        <?php echo $pro['propietario']; ?></option>
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
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_propiedad]"
            value="<?php echo isset($data[0]['id_propiedad']) ? $data[0]['id_propiedad'] : ''; ?>" class="" />
    <? endif; ?>
</form>