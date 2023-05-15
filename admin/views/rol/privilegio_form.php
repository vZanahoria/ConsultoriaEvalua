<h1 class="text-center">
    <?php echo ($action == 'editprivilege') ? 'Modificar' : 'Nueva'; ?> privilegios del rol:
    <?php echo $data[0]['rol']; ?>
</h1>
<form method="POST"
    action="rol.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_rol']) ?>&id_privilegio=<?php echo $id_privilegio ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Privilegios</label>
        <?php $i = 0;
        $checked = "";
        foreach ($dataprivilegios as $key => $privilegio):
            $i++; ?>
            <p></p>
            <label for="exampleFormControlInput1" class="form-check-label">
                <?php echo $privilegio['privilegio'] ?>
            </label>

            <?php
            $checked = " "; foreach ($data_privilegio as $key => $rolpriv):
                if ($rolpriv['id_privilegio'] == $privilegio['id_privilegio']):
                    $checked = "checked"; ?>
                <?php endif; endforeach; ?>

            <input class="form-check-input" type="checkbox" name="data[id_privilegio][<?php echo $i ?>]"
                value="<?php echo $privilegio['id_privilegio'] ?>" <?php echo $checked ?>>


        <?php endforeach; ?>
        <div class="mb-3">
            <?php
            if ($action == 'edittask'): ?>
                <input type="hidden" name="data[id_rol]"
                    value="<?php echo isset($data[0]['id_rol']) ? $data[0]['id_rol'] : ''; ?>" />

            <?php endif; ?>
            <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />

        </div>
</form>