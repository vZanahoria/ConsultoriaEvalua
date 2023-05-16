<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Municipio
</h1>

<form class="container-fluid" method="POST" action="municipio.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="municipio">Municipio:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="municipio" name="data[municipio]"
                value="<?php echo isset($data[0]['municipio']) ? $data[0]['municipio'] : ''; ?>" minlength="3"
                maxlength="200">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="id_estado">Estado:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_estado]" required="required">
                <?php
                $selected = " ";
                foreach ($dataEstados as $key => $edo):
                    if ($edo['id_estado'] == $data[0]['id_estado']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $edo['id_estado']; ?>" <?php echo $selected; ?>>
                        <?php echo $edo['estado']; ?></option>
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
        <input type="hidden" name="data[id_municipio]"
            value="<?php echo isset($data[0]['id_municipio']) ? $data[0]['id_municipio'] : ''; ?>" class="" />
    <? endif; ?>
</form>