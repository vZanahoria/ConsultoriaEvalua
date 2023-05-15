<?php
require_once("controllers/estado.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'municipio':
        $data = $estado->get($id);
        $data_rol = $usuario->getRole($id);
        include('views/estado/municipio.php');
        break;
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estado->new($data);
            if ($cantidad) {
                $estado->flash('success', 'Registro dado de alta con éxito');
                $data = $estado->get(null);
                include('views/estado/index.php');
            } else {
                $estadovisita->flash('danger', 'Algo fallo');
                include('views/estado/form.php');
            }
        } else {
            include('views/estado/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado'];
            $cantidad = $estado->edit($id, $data);
            if ($cantidad) {
                $estado->flash('success', 'Registro actualizado con éxito');
                $data = $estado->get(null);
                include('views/estado/index.php');
            } else {
                $estado->flash('danger', 'Algo fallo');
                $data = $estado->get(null);
                include('views/estado/index.php');
            }
        } else {
            $data = $estado->get($id);
            include('views/estado/form.php');
        }
        break;
    case 'delete':
        $cantidad = $estado->delete($id);
        if ($cantidad) {
            $estado->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estado->get(null);
            include('views/estado/index.php');
        } else {
            $estado->flash('danger', 'Algo fallo');
            $data = $estado->get(null);
            include('views/estado/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estado->get(null);
        include("views/estado/index.php");
        break;
}
include("views/footer_admin.php");
?>