<?php
require_once("controllers/visita.php");
require_once("controllers/propiedad.php");
require_once("controllers/estado_visita.php");
require_once("controllers/avaluo.php");
require_once("controllers/valuador.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $visita->validatePrivilegio('Visita Crear');
        $dataPropiedad = $propiedad->get(null);
        $dataEstadoVisita = $estadovisita->get(null);
        $dataAvaluo = $avaluo->get(null);
        $dataValuador = $valuador->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $visita->new($data);
            if ($cantidad) {
                $visita->flash('success', 'Registro dado de alta con éxito');
                $data = $visita->get(null);
                include('views/visita/index.php');
            } else {
                $visita->flash('danger', 'Algo fallo');
                include('views/visita/form.php');
            }
        } else {
            include('views/visita/form.php');
        }
        break;
    case 'delete':
        $visita->validatePrivilegio('Visita Eliminar');
        $cantidad = $visita->delete($id);
        if ($cantidad) {
            $visita->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $visita->get(null);
            include('views/visita/index.php');
        } else {
            $visita->flash('danger', 'Algo fallo');
            $data = $visita->get(null);
            include('views/visita/index.php');
        }
        break;
    case 'edit':
        $visita->validatePrivilegio('Visita Actualizar');
        $dataPropiedad = $propiedad->get(null);
        $dataEstadoVisita = $estadovisita->get(null);
        $dataAvaluo = $avaluo->get(null);
        $dataValuador = $valuador->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_visita'];
            $cantidad = $visita->edit($id, $data);
            if ($cantidad) {
                $visita->flash('success', 'Registro actualizado con éxito');
                $data = $visita->get(null);
                include('views/visita/index.php');
            } else {
                $visita->flash('danger', 'Algo fallo');
                $data = $visita->get(null);
                include('views/visita/index.php');
            }
        } else {
            $data = $visita->get($id);
            include('views/visita/form.php');
        }
        break;
    case 'getAll':
    default:
    $visita->validatePrivilegio('Visita Leer');
        $data = $visita->get(null);
        include("views/visita/index.php");
}
include("views/footer_admin.php");
?>