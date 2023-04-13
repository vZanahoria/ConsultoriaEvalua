<?php
require_once("controllers/naturaleza_reclamacion.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $naturaleza->new($data);
            if ($cantidad) {
                $naturaleza->flash('success', 'Registro dado de alta con éxito');
                $data = $naturaleza->get(null);
                include('views/naturaleza_reclamacion/index.php');
            } else {
                $naturaleza->flash('danger', 'Algo fallo');
                include('views/naturaleza_reclamacion/form.php');
            }
        } else {
            include('views/naturaleza_reclamacion/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_naturaleza'];
            $cantidad = $naturaleza->edit($id, $data);
            if ($cantidad) {
                $naturaleza->flash('success', 'Registro actualizado con éxito');
                $data = $naturaleza->get(null);
                include('views/naturaleza_reclamacion/index.php');
            } else {
                $naturaleza->flash('danger', 'Algo fallo');
                $data = $naturaleza->get(null);
                include('views/naturaleza_reclamacion/index.php');
            }
        } else {
            $data = $naturaleza->get($id);
            include('views/naturaleza_reclamacion/form.php');
        }
        break;
    case 'delete':
        $cantidad = $naturaleza->delete($id);
        if ($cantidad) {
            $naturaleza->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $naturaleza->get(null);
            include('views/naturaleza_reclamacion/index.php');
        } else {
            $naturaleza->flash('danger', 'Algo fallo');
            $data = $naturaleza->get(null);
            include('views/naturaleza_reclamacion/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $naturaleza->get(null);
        include("views/naturaleza_reclamacion/index.php");
        break;
}
include("views/footer_admin.php");
?>