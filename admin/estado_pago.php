<?php
require_once("controllers/estado_pago.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $estadopago->new($data);
            if ($cantidad) {
                $estadopago->flash('success', 'Registro dado de alta con éxito');
                $data = $estadopago->get(null);
                include('views/estado_pago/index.php');
            } else {
                $estadopago->flash('danger', 'Algo fallo');
                include('views/estado_pago/form.php');
            }
        } else {
            include('views/estado_pago/form.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_estado_pago'];
            $cantidad = $estadopago->edit($id, $data);
            if ($cantidad) {
                $estadopago->flash('success', 'Registro actualizado con éxito');
                $data = $estadopago->get(null);
                include('views/estado_pago/index.php');
            } else {
                $estadopago->flash('danger', 'Algo fallo');
                $data = $estadopago->get(null);
                include('views/estado_pago/index.php');
            }
        } else {
            $data = $estadopago->get($id);
            include('views/estado_pago/form.php');
        }
        break;
    case 'delete':
        $cantidad = $estadopago->delete($id);
        if ($cantidad) {
            $estadopago->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $estadopago->get(null);
            include('views/estado_pago/index.php');
        } else {
            $estadopago->flash('danger', 'Algo fallo');
            $data = $estadopago->get(null);
            include('views/estado_pago/index.php');
        }
        break;
    case 'getAll':
    default:
        $data = $estadopago->get(null);
        include("views/estado_pago/index.php");
        break;
}
include("views/footer_admin.php");
?>