<?php
require_once("controllers/usuario.php");
require_once("controllers/rol.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$usuario->validateRol('Administrador');

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_rol = (isset($_GET['id_rol'])) ? $_GET['id_rol'] : null;

switch ($action) {

    case 'role':
        $usuario->validatePrivilegio('Rol Leer');

        $data = $usuario->get($id);
        $data_rol = $usuario->getRole($id);
        include('views/usuario/rol.php');
        break;
    case 'deleterole':
        $usuario->validatePrivilegio('Rol Eliminar');

        if (!is_null($id_rol) && !is_null($id)) {
            try {
                $sistema->beginTransaction();
                $usuario->deleteRole($id, $id_rol);

                $sistema->commit();
                $usuario->flash('success', 'Registro con el id= ' . $id_rol . ' eliminado con éxito');
            } catch (PDOException $ex) {
                $sistema->rollBack();
                $usuario->flash('danger', 'Algo fallo:' . $ex);
            }
        }

        $data = $usuario->get($id);
        $data_rol = $usuario->getRole($id);
        include('views/usuario/rol.php');
        break;
    case 'newrole':
        $usuario->validatePrivilegio('Rol Crear');

        $data = $usuario->get($id);
        $data_rol = $usuario->getRole($id);
        $dataroles = $rol->get();
        $cantidad = 0;

        if (isset($_POST['enviar']) && isset($_POST['data'])) {
            $data2 = $_POST['data'];
            $sistema->beginTransaction();
            $usuario->deleteAllRoles($id);
            foreach ($data2['id_rol'] as $key => $idrol) {
                $data3 = array();
                $data3['id_rol'] = $idrol;
                try {
                    $cantidad = $usuario->newRol($id, $data3);
                } catch (PDOException $ex) {
                    $usuario->flash('danger', 'Algo fallo:' . $ex);
                    $sistema->rollBack();
                }
            }
            $sistema->commit();
            if ($cantidad) {
                $usuario->flash('success', 'Registro dado de alta con éxito');
            }
            $data = $usuario->get($id);
            $data_rol = $usuario->getRole($id);
            include('views/usuario/rol.php');
        } else {
            include('views/usuario/rol_form.php');
        }
        break;
    case 'editrole':
        $usuario->validatePrivilegio('Rol Actualizar');

        $data = $usuario->get($id);
        $data_rol = $usuario->getRole($id);
        $dataroles = $rol->get();
        $cantidad = 0;

        if (isset($_POST['enviar']) && isset($_POST['data'])) {
            $data2 = $_POST['data'];
            $sistema->beginTransaction();
            $usuario->deleteAllRoles($id);

            foreach ($data2['id_rol'] as $key => $idrol) {
                $data3 = array();
                $data3['id_rol'] = $idrol;
                try {
                    $cantidad = $usuario->newRol($id, $data3);
                } catch (PDOException $ex) {
                    $usuario->flash('danger', 'Algo fallo:' . $ex);
                    $sistema->rollBack();
                }
            }
            $sistema->commit();
            if ($cantidad) {
                $usuario->flash('success', 'Registro dado de alta con éxito');
            }
            $data = $usuario->get($id);
            $data_rol = $usuario->getRole($id);
            include('views/usuario/rol.php');
        } else {
            $data = $usuario->get($id);
            $data_rol = $usuario->getRole($id);
            include('views/usuario/rol_form.php');
        }
        break;
    case 'new':
        $usuario->validatePrivilegio('Usuario Crear');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];

            try {
                $sistema->beginTransaction();
                $cantidad = $usuario->new($data);

                $sistema->commit();
                $usuario->flash('success', 'Registro dado de alta con éxito');
                $data = $usuario->get(null);
                include('views/usuario/index.php');
            } catch (PDOException $ex) {
                $usuario->flash('danger', 'Algo fallo Error: ' . $ex);
                $sistema->rollBack();
                include('views/usuario/form.php');
            }
        } else {
            include('views/usuario/form.php');
        }
        break;
    case 'delete':
        $usuario->validatePrivilegio('Usuario Eliminar');
        try {
            $sistema->beginTransaction();
            $cantidad = $usuario->delete($id);

            $sistema->commit();
            $usuario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $usuario->get(null);
            include('views/usuario/index.php');
        } catch (PDOException $ex) {
            $usuario->flash('danger', 'Algo fallo Error: ' . $ex);
            $sistema->rollBack();
            include('views/usuario/form.php');
        }
        break;
    case 'edit':
        $usuario->validatePrivilegio('Usuario Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_usuario'];
            try {
                $sistema->beginTransaction();
                $cantidad = $usuario->edit($id, $data);

                $sistema->commit();
                $sistema->flash('success', 'Registro actualizado con éxito');
                $data = $usuario->get(null);
                include('views/usuario/index.php');
            } catch (PDOException $ex) {
                $usuario->flash('danger', 'Algo fallo Error: ' . $ex);
                $sistema->rollBack();
                include('views/usuario/form.php');
            }
        } else {
            $data = $usuario->get($id);
            include('views/usuario/form.php');
        }
        break;
    case 'getAll':
    default:
        $usuario->validatePrivilegio('Usuario Leer');

        $data = $usuario->get(null);
        include("views/usuario/index.php");
}
include("views/footer_admin.php");
?>