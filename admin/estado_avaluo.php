<?php
require_once("controllers/estado_avaluo.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estadoavaluo->new($data);
            if ($cantidad) {
                $estadoavaluo->flash('success', 'Registro dado de alta con éxito');
                $data = $estadoavaluo->get(null);
                include('views/estado_avaluo/index.php');
            } else {
                $estadoavaluo->flash('danger', 'Algo fallo');
                include('views/estado_avaluo/form.php');
            }
        } else {
            include('views/estado_avaluo/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado_avaluo'];
            $cantidad = $estadoavaluo->edit($id, $data);
            if ($cantidad) {
                $estadoavaluo->flash('success', 'Registro actualizado con éxito');
                $data = $estadoavaluo->get(null);
                include('views/estado_avaluo/index.php');
            } else {
                $estadoavaluo->flash('danger', 'Algo fallo');
                $data = $estadoavaluo->get(null);
                include('views/estado_avaluo/index.php');
            }
        } else {
            $data = $estadoavaluo->get($id);
            include('views/estado_avaluo/form.php');
        }
        break;
    case 'delete':
        $cantidad = $estadoavaluo->delete($id);
        if ($cantidad) {
            $estadoavaluo->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estadoavaluo->get(null);
            include('views/estado_avaluo/index.php');
        } else {
            $estadoavaluo->flash('danger', 'Algo fallo');
            $data = $estadoavaluo->get(null);
            include('views/estado_avaluo/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estadoavaluo->get(null);
        include("views/estado_avaluo/index.php");
        break;
}
include("views/footer_admin.php");
?>