<?php
include_once("controllers/propietario.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $propietario->new($data);
            if ($cantidad) {
                $propietario->flash('success', 'Registro dado de alta con éxito.');
                $data = $propietario->get(null);
                include('views/propietario/index.php');
            } else {
                $propietario->flash('danger', 'Ocurrió algún error.');
                include('views/propietario/form.php');
            }
        } else {
            include('views/propietario/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_propietario'];
            $cantidad = $propietario->edit($id, $data);
            if ($cantidad) {
                $propietario->flash('success', 'Registro actualizado con éxito');
                $data = $propietario->get(null);
                include('views/propietario/index.php');
            } else {
                $propietario->flash('danger', 'Algo fallo');
                $data = $propietario->get(null);
                include('views/propietario/index.php');
            }
        } else {
            $data = $propietario->get($id);
            include('views/propietario/form.php');
        }
        break;
        case 'delete':
            $cantidad = $propietario->delete($id);
            if ($cantidad) {
                $propietario->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
                $data = $propietario->get(null);
                include('views/propietario/index.php');
            } else {
                $propietario->flash('danger', 'Algo fallo');
                $data = $propietario->get(null);
                include('views/propietario/index.php');
            }
            break;
    case 'getAll':
    default:
        $data = $propietario->get(null);
        include("views/propietario/index.php");
        break;
}   
include("views/footer_admin.php");
?>