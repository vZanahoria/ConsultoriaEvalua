<?php
require_once("controllers/rol.php");
require_once("controllers/privilegio.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$rol->validateRol('Administrador');

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_privilegio = (isset($_GET['id_privilegio'])) ? $_GET['id_privilegio'] : null;

switch ($action) {

    case 'privilege':
        $rol->validatePrivilegio('Privilegio Leer');
        $data = $rol->get($id);
        $data_privilegio = $rol->getPrivilege($id);
        include('views/rol/privilegio.php');
        break;
    case 'deleteprivilege':
        $rol->validatePrivilegio('Privilegio Eliminar');
        if (!is_null($id_privilegio) && !is_null($id)) {
            try {
                $sistema->beginTransaction();
                $rol->deletePrivilege($id, $id_privilegio);

                $sistema->commit();
                $rol->flash('success', 'Registro con el id= ' . $id_privilegio . ' eliminado con éxito');
            } catch (PDOException $ex) {
                $sistema->rollBack();
                $rol->flash('danger', 'Algo fallo:' . $ex);
            }
        }

        $data = $rol->get($id);
        $data_privilegio = $rol->getPrivilege($id);
        include('views/rol/privilegio.php');
        break;
    case 'newprivilege':
        $rol->validatePrivilegio('Privilegio Crear');
        $data = $rol->get($id);
        $data_privilegio = $rol->getPrivilege($id);
        $dataprivilegios = $privilegio->get();
        $cantidad = 0;

        if (isset($_POST['enviar']) && isset($_POST['data'])) {
            $data2 = $_POST['data'];
            $sistema->beginTransaction();
            $rol->deleteAllPrivileges($id);
            foreach ($data2['id_privilegio'] as $key => $idprivilegio) {
                $data3 = array();
                $data3['id_privilegio'] = $idprivilegio;
                try {
                    $cantidad = $rol->newPrivilege($id, $data3);

                } catch (PDOException $ex) {
                    $rol->flash('danger', 'Algo fallo:' . $ex);
                    $sistema->rollBack();
                }
            }
            $sistema->commit();
            if ($cantidad) {
                $rol->flash('success', 'Registro dado de alta con éxito');
            }
            $data = $rol->get($id);
            $data_privilegio = $rol->getPrivilege($id);
            $dataprivilegios = $privilegio->get();
            include('views/rol/privilegio.php');
        } else {
            include('views/rol/privilegio_form.php');
        }
        break;
    case 'editprivilege':
        $rol->validatePrivilegio('Privilegio Actualizar');
        $data = $rol->get($id);
        $data_privilegio = $rol->getPrivilege($id);
        $dataprivilegios = $privilegio->get();
        $cantidad = 0;

        if (isset($_POST['enviar']) && isset($_POST['data'])) {
            $data2 = $_POST['data'];
            $sistema->beginTransaction();
            $rol->deleteAllPrivileges($id);

            foreach ($data2['id_privilegio'] as $key => $idprivilegio) {
                $data3 = array();
                $data3['id_privilegio'] = $idprivilegio;
                try {
                    $cantidad = $rol->newPrivilege($id, $data3);
                } catch (PDOException $ex) {
                    $rol->flash('danger', 'Algo fallo:' . $ex);
                    $sistema->rollBack();
                }
            }
            $sistema->commit();
            if ($cantidad) {
                $rol->flash('success', 'Registro dado de alta con éxito');
            }
            else{
                $rol->flash('danger', 'Ocurrió un error');
            }
            $data = $rol->get($id);
            $data_rol = $rol->getPrivilege($id);
            include('views/rol/privilegio.php');
        } else {
            $data = $rol->get($id);
            $data_privilegio = $rol->getPrivilege($id);
            include('views/rol/privilegio_form.php');
        }
        break;
    case 'new':
        $rol->validatePrivilegio('Rol Crear');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];

            try {
                $sistema->beginTransaction();
                $cantidad = $rol->new($data);

                $sistema->commit();
                $rol->flash('success', 'Registro dado de alta con éxito');
                $data = $rol->get(null);
                include('views/rol/index.php');
            } catch (PDOException $ex) {
                $rol->flash('danger', 'Algo fallo Error: ' . $ex);
                $sistema->rollBack();
                include('views/rol/form.php');
            }
        } else {
            include('views/rol/form.php');
        }
        break;
    case 'delete':
        $rol->validatePrivilegio('Rol Eliminar');
        try {
            $sistema->beginTransaction();
            $cantidad = $rol->delete($id);

            $sistema->commit();
            $rol->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $rol->get(null);
            include('views/rol/index.php');
        } catch (PDOException $ex) {
            $rol->flash('danger', 'Algo fallo Error: ' . $ex);
            $sistema->rollBack();
            include('views/rol/form.php');
        }
        break;
    case 'edit':
        $rol->validatePrivilegio('Rol Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_rol'];
            try {
                $sistema->beginTransaction();
                $cantidad = $rol->edit($id, $data);

                $sistema->commit();
                $sistema->flash('success', 'Registro actualizado con éxito');
                $data = $rol->get(null);
                include('views/rol/index.php');
            } catch (PDOException $ex) {
                $rol->flash('danger', 'Algo fallo Error: ' . $ex);
                $sistema->rollBack();
                include('views/rol/form.php');
            }
        } else {
            $data = $rol->get($id);
            include('views/rol/form.php');
        }
        break;
    case 'getAll':
    default:
        $rol->validatePrivilegio('Rol Leer');

        $data = $rol->get(null);
        include("views/rol/index.php");
}
include("views/footer_admin.php");
?>