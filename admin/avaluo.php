<?php
require_once("controllers/propiedad.php");
require_once("controllers/estado_pago.php");
require_once("controllers/estado_avaluo.php");
require_once("controllers/avaluo.php");
require_once("controllers/valuador.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataEstadoPago = $estadopago->get(null);
        $dataEstadoAvaluo = $estadoavaluo->get(null);
        $dataValuador = $valuador->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $avaluo->new($data);
            if ($cantidad) {
                $avaluo->flash('success', 'Registro dado de alta con éxito');
                $data = $avaluo->get(null);
                include('views/avaluo/index.php');
            } else {
                $avaluo->flash('danger', 'Algo fallo');
                include('views/avaluo/form.php');
            }
        } else {
            include('views/avaluo/form.php');
        }
        break;
    case 'delete':
        $cantidad = $avaluo->delete($id);
        if ($cantidad) {
            $avaluo->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $avaluo->get(null);
            include('views/avaluo/index.php');
        } else {
            $avaluo->flash('danger', 'Algo fallo');
            $data = $avaluo->get(null);
            include('views/avaluo/index.php');
        }
        break;
    case 'edit':
        $dataEstadoPago = $estadopago->get(null);
        $dataEstadoAvaluo = $estadoavaluo->get(null);
        $dataValuador = $valuador->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_avaluo'];
            $cantidad = $avaluo->edit($id, $data);
            if ($cantidad) {
                $avaluo->flash('success', 'Registro actualizado con éxito');
                $data = $avaluo->get(null);
                include('views/avaluo/index.php');
            } else {
                $avaluo->flash('danger', 'Algo fallo');
                $data = $avaluo->get(null);
                include('views/avaluo/index.php');
            }
        } else {
            $data = $avaluo->get($id);
            include('views/avaluo/form.php');
        }
        break;
    case 'getAll':
    default:
        $data = $avaluo->get(null);
        include("views/avaluo/index.php");
}
include("views/footer_admin.php");
?>