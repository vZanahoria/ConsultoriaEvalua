<h1 class="text-center">
    <?php echo ($action == 'edittask') ? 'Modificar' : 'Nueva'; ?> rol del proyecto:
    <?php echo $data[0]['correo']; ?>
</h1>
<form method="POST"
    action="usuario.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_usuario']) ?>&id_rol=<?php echo $id_rol ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Roles</label>
        <?php $i = 0;
        $checked = "";
        foreach ($dataroles as $key => $rol):
            $i++; ?>
            <p></p>
            <label for="exampleFormControlInput1" class="form-check-label">
                <?php echo $rol['rol'] ?>
            </label>

            <?php
            $checked = " "; foreach ($data_rol as $key => $rolus):
                if ($rolus['id_rol'] == $rol['id_rol']):
                    $checked = "checked"; ?>
                <?php endif; endforeach; ?>

            <input class="form-check-input" type="checkbox" name="data[id_rol][<?php echo $i ?>]"
                value="<?php echo $rol['id_rol'] ?>" <?php echo $checked ?>>


        <?php endforeach; ?>
        <div class="mb-3">
            <?php
            if ($action == 'edittask'): ?>
                <input type="hidden" name="data[id_usuario]"
                    value="<?php echo isset($data[0]['id_usuario']) ? $data[0]['id_usuario'] : ''; ?>" />

            <?php endif; ?>
            <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />

        </div>
</form>