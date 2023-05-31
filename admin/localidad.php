<?php
require_once("controllers/localidad.php");
require_once("controllers/municipio.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $localidad->validatePrivilegio('Localidad Crear');
        $dataMunicipios = $municipio->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $localidad->new($data);
            if ($cantidad) {
                $localidad->flash('success', 'Registro dado de alta con éxito');
                $data = $localidad->get(null);
                include('views/localidad/index.php');
            } else {
                $estadovisita->flash('danger', 'Algo fallo');
                include('views/localidad/form.php');
            }
        } else {
            include('views/localidad/form.php');
        }
        break;
    case 'edit':
        $localidad->validatePrivilegio('Localidad Actualizar');
        $dataMunicipios = $municipio->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_localidad'];
            $cantidad = $localidad->edit($id, $data);
            if ($cantidad) {
                $localidad->flash('success', 'Registro actualizado con éxito');
                $data = $localidad->get(null);
                include('views/localidad/index.php');
            } else {
                $localidad->flash('danger', 'Algo fallo');
                $data = $localidad->get(null);
                include('views/localidad/index.php');
            }
        } else {
            $data = $localidad->get($id);
            include('views/localidad/form.php');
        }
        break;
    case 'delete':
        $localidad->validatePrivilegio('Localidad Eliminar');
        $cantidad = $localidad->delete($id);
        if ($cantidad) {
            $localidad->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $localidad->get(null);
            include('views/localidad/index.php');
        } else {
            $localidad->flash('danger', 'Algo fallo');
            $data = $localidad->get(null);
            include('views/localidad/index.php');
        }
        break;
    case 'getAll':
    default:
    $localidad->validatePrivilegio('Localidad Leer');
        $data = $localidad->get(null);
        include("views/localidad/index.php");
        break;
}
include("views/footer_admin.php");
?>