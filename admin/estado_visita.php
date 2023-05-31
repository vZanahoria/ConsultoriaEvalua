<?php
require_once("controllers/estado_visita.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $estadovisita->validatePrivilegio('Estado Visita Crear');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estadovisita->new($data);
            if ($cantidad) {
                $estadovisita->flash('success', 'Registro dado de alta con éxito');
                $data = $estadovisita->get(null);
                include('views/estado_visita/index.php');
            } else {
                $estadovisita->flash('danger', 'Algo fallo');
                include('views/estado_visita/form.php');
            }
        } else {
            include('views/estado_visita/form.php');
        }
        break;
    case 'edit':
        $estadovisita->validatePrivilegio('Estado Visita Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado_visita'];
            $cantidad = $estadovisita->edit($id, $data);
            if ($cantidad) {
                $estadovisita->flash('success', 'Registro actualizado con éxito');
                $data = $estadovisita->get(null);
                include('views/estado_visita/index.php');
            } else {
                $estadovisita->flash('danger', 'Algo fallo');
                $data = $estadovisita->get(null);
                include('views/estado_visita/index.php');
            }
        } else {
            $data = $estadovisita->get($id);
            include('views/estado_visita/form.php');
        }
        break;
    case 'delete':
        $estadovisita->validatePrivilegio('Estado Visita Eliminar');
        $cantidad = $estadovisita->delete($id);
        if ($cantidad) {
            $estadovisita->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estadovisita->get(null);
            include('views/estado_visita/index.php');
        } else {
            $estadovisita->flash('danger', 'Algo fallo');
            $data = $estadovisita->get(null);
            include('views/estado_visita/index.php');
        }
        break;
    case 'getAll':
    default:
    $estadovisita->validatePrivilegio('Estado Visita Leer');
        $data = $estadovisita->get(null);
        include("views/estado_visita/index.php");
        break;
}
include("views/footer_admin.php");
?>