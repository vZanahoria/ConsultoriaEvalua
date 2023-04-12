<?php
require_once("controllers/clasificacion_uso_suelo.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $usosuelo->new($data);
            if ($cantidad) {
                $usosuelo->flash('success', 'Registro dado de alta con éxito');
                $data = $usosuelo->get(null);
                include('views/clasificacion_uso_suelo/index.php');
            } else {
                $usosuelo->flash('danger', 'Algo fallo');
                include('views/clasificacion_uso_suelo/form.php');
            }
        } else {
            include('views/clasificacion_uso_suelo/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_clasificacion_uso'];
            $cantidad = $usosuelo->edit($id, $data);
            if ($cantidad) {
                $usosuelo->flash('success', 'Registro actualizado con éxito');
                $data = $usosuelo->get(null);
                include('views/clasificacion_uso_suelo/index.php');
            } else {
                $usosuelo->flash('danger', 'Algo fallo');
                $data = $usosuelo->get(null);
                include('views/clasificacion_uso_suelo/index.php');
            }
        } else {
            $data = $usosuelo->get($id);
            include('views/clasificacion_uso_suelo/form.php');
        }
        break;
    case 'delete':
        $cantidad = $usosuelo->delete($id);
        if ($cantidad) {
            $usosuelo->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $usosuelo->get(null);
            include('views/clasificacion_uso_suelo/index.php');
        } else {
            $usosuelo->flash('danger', 'Algo fallo');
            $data = $usosuelo->get(null);
            include('views/clasificacion_uso_suelo/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $usosuelo->get(null);
        include("views/clasificacion_uso_suelo/index.php");
        break;
}
include("views/footer_admin.php");
?>