<?php
require_once("controllers/reclamaciones.php");
require_once("controllers/naturaleza_reclamacion.php");
require_once("controllers/estado_reclamacion.php");
require_once("controllers/avaluo.php");
require_once("controllers/cliente.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataNaturalezaReclamacion = $naturaleza->get(null);
        $dataEstadoReclamaciones = $estadoreclamacion->get(null);
        $dataAvaluo = $avaluo->get(null);
        $dataCliente = $cliente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $reclamaciones->new($data);
            if ($cantidad) {
                $reclamaciones->flash('success', 'Registro dado de alta con éxito');
                $data = $reclamaciones->get(null);
                include('views/reclamaciones/index.php');
            } else {
                $reclamaciones->flash('danger', 'Algo fallo');
                include('views/reclamaciones/form.php');
            }
        } else {
            include('views/reclamaciones/form.php');
        }
        break;
    case 'delete':
        $cantidad = $reclamaciones->delete($id);
        if ($cantidad) {
            $reclamaciones->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $reclamaciones->get(null);
            include('views/reclamaciones/index.php');
        } else {
            $reclamaciones->flash('danger', 'Algo fallo');
            $data = $visita->get(null);
            include('views/reclamaciones/index.php');
        }
        break;
    case 'edit':
        $dataNaturalezaReclamacion = $naturaleza->get(null);
        $dataEstadoReclamaciones = $estadoreclamacion->get(null);
        $dataAvaluo = $avaluo->get(null);
        $dataCliente = $cliente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_reclamacion'];
            $cantidad = $reclamaciones->edit($id, $data);
            if ($cantidad) {
                $reclamaciones->flash('success', 'Registro actualizado con éxito');
                $data = $reclamaciones->get(null);
                include('views/reclamaciones/index.php');
            } else {
                $reclamaciones->flash('danger', 'Algo fallo');
                $data = $reclamaciones->get(null);
                include('views/reclamaciones/index.php');
            }
        } else {
            $data = $reclamaciones->get($id);
            include('views/reclamaciones/form.php');
        }
        break;
    case 'getAll':
    default:
        $data = $reclamaciones->get(null);
        include("views/reclamaciones/index.php");
}
include("views/footer_admin.php");
?>