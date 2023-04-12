<?php
include_once("controllers/valuador.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $valuador->new($data);
            if ($cantidad) {
                $valuador->flash('success', 'Registro dado de alta con éxito.');
                $data = $valuador->get(null);
                include('views/valuador/index.php');
            } else {
                $valuador->flash('danger', 'Ocurrió algún error.');
                include('views/valuador/form.php');
            }
        } else {
            include('views/valuador/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_valuador'];
            $cantidad = $valuador->edit($id, $data);
            if ($cantidad) {
                $valuador->flash('success', 'Registro actualizado con éxito');
                $data = $valuador->get(null);
                include('views/valuador/index.php');
            } else {
                $valuador->flash('danger', 'Algo fallo');
                $data = $valuador->get(null);
                include('views/valuador/index.php');
            }
        } else {
            $data = $valuador->get($id);
            include('views/valuador/form.php');
        }
        break;
    case 'getAll':
    default:
        $data = $valuador->get(null);
        include("views/valuador/index.php");
        break;
}
include("views/footer_admin.php");
?>