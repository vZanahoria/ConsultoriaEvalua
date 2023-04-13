<?php
require_once("controllers/estado_reclamacion.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estadoreclamacion->new($data);
            if ($cantidad) {
                $estadoreclamacion->flash('success', 'Registro dado de alta con éxito');
                $data = $estadoreclamacion->get(null);
                include('views/estado_reclamacion/index.php');
            } else {
                $estadoreclamacion->flash('danger', 'Algo fallo');
                include('views/estado_reclamacion/form.php');
            }
        } else {
            include('views/estado_reclamacion/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado_reclamacion'];
            $cantidad = $estadoreclamacion->edit($id, $data);
            if ($cantidad) {
                $estadoreclamacion->flash('success', 'Registro actualizado con éxito');
                $data = $estadoreclamacion->get(null);
                include('views/estado_reclamacion/index.php');
            } else {
                $estadoreclamacion->flash('danger', 'Algo fallo');
                $data = $estadoreclamacion->get(null);
                include('views/estado_reclamacion/index.php');
            }
        } else {
            $data = $estadoreclamacion->get($id);
            include('views/estado_reclamacion/form.php');
        }
        break;
    case 'delete':
        $cantidad = $estadoreclamacion->delete($id);
        if ($cantidad) {
            $estadoreclamacion->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estadoreclamacion->get(null);
            include('views/estado_reclamacion/index.php');
        } else {
            $estadoreclamacion->flash('danger', 'Algo fallo');
            $data = $estadoreclamacion->get(null);
            include('views/estado_reclamacion/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estadoreclamacion->get(null);
        include("views/estado_reclamacion/index.php");
        break;
}
include("views/footer_admin.php");
?>