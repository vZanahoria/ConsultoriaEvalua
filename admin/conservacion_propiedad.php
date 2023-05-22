<?php
require_once("controllers/conservacion_propiedad.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $conservacionpropiedad->new($data);
            if ($cantidad) {
                $conservacionpropiedad->flash('success', 'Registro dado de alta con éxito');
                $data = $conservacionpropiedad->get(null);
                include('views/conservacion_propiedad/index.php');
            } else {
                $conservacionpropiedad->flash('danger', 'Algo fallo');
                include('views/conservacion_propiedad/form.php');
            }
        } else {
            include('views/conservacion_propiedad/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_conservacion'];
            $cantidad = $conservacionpropiedad->edit($id, $data);
            if ($cantidad) {
                $conservacionpropiedad->flash('success', 'Registro actualizado con éxito');
                $data = $conservacionpropiedad->get(null);
                include('views/conservacion_propiedad/index.php');
            } else {
                $conservacionpropiedad->flash('danger', 'Algo fallo');
                $data = $conservacionpropiedad->get(null);
                include('views/conservacion_propiedad/index.php');
            }
        } else {
            $data = $conservacionpropiedad->get($id);
            include('views/conservacion_propiedad/form.php');
        }
        break;
    case 'delete':
        $cantidad = $conservacionpropiedad->delete($id);
        if ($cantidad) {
            $conservacionpropiedad->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $conservacionpropiedad->get(null);
            include('views/conservacion_propiedad/index.php');
        } else {
            $conservacionpropiedad->flash('danger', 'Algo fallo');
            $data = $conservacionpropiedad->get(null);
            include('views/conservacion_propiedad/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $conservacionpropiedad->get(null);
        include("views/conservacion_propiedad/index.php");
        break;
}
include("views/footer_admin.php");
?>