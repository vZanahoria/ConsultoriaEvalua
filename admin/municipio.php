<?php
require_once("controllers/municipio.php");
require_once("controllers/estado.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataEstados = $estado->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $municipio->new($data);
            if ($cantidad) {
                $municipio->flash('success', 'Registro dado de alta con éxito');
                $data = $municipio->get(null);
                include('views/municipio/index.php');
            } else {
                $municipio->flash('danger', 'Algo fallo');
                include('views/municipio/form.php');
            }
        } else {
            include('views/municipio/form.php');
        }
        break;
    case 'delete':
        $cantidad = $municipio->delete($id);
        if ($cantidad) {
            $municipio->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $municipio->get(null);
            include('views/municipio/index.php');
        } else {
            $municipio->flash('danger', 'Algo fallo');
            $data = $municipio->get(null);
            include('views/municipio/index.php');
        }
        break;
    case 'edit':
        $dataEstados = $estado->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_municipio'];
            $cantidad = $municipio->edit($id, $data);
            if ($cantidad) {
                $municipio->flash('success', 'Registro actualizado con éxito');
                $data = $municipio->get(null);
                include('views/municipio/index.php');
            } else {
                $municipio->flash('danger', 'Algo fallo');
                $data = $municipio->get(null);
                include('views/municipio/index.php');
            }
        } else {
            $data = $municipio->get($id);
            include('views/municipio/form.php');
        }
        break;
    case 'getAll':
    default:

        $data = $municipio->get(null);
        include("views/municipio/index.php");
}
include("views/footer_admin.php");
?>