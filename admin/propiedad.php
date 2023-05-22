<?php
require_once("controllers/propiedad.php");
require_once("controllers/localidad.php");
require_once("controllers/tipo_propiedad.php");
require_once("controllers/clasificacion_uso_suelo.php");
require_once("controllers/conservacion_propiedad.php");
require_once("controllers/propietario.php");
require_once("controllers/cliente.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataLocalidad = $localidad->get(null);
        $dataTipoPropiedad = $tipopropiedad->get(null);
        $dataClasificacionUso = $usosuelo->get(null);
        $dataConservacion = $conservacionpropiedad->get(null);
        $dataPropietario = $propietario->get(null);
        $dataCliente = $cliente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $propiedad->new($data);
            if ($cantidad) {
                $propiedad->flash('success', 'Registro dado de alta con éxito');
                $data = $propiedad->get(null);
                include('views/propiedad/index.php');
            } else {
                $propiedad->flash('danger', 'Algo fallo');
                include('views/propiedad/form.php');
            }
        } else {
            include('views/propiedad/form.php');
        }
        break;
    case 'delete':
        $cantidad = $propiedad->delete($id);
        if ($cantidad) {
            $propiedad->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $propiedad->get(null);
            include('views/propieadad/index.php');
        } else {
            $propiedad->flash('danger', 'Algo fallo');
            $data = $propiedad->get(null);
            include('views/propiedad/index.php');
        }
        break;
    case 'edit':
        $dataLocalidad = $localidad->get(null);
        $dataTipoPropiedad = $tipopropiedad->get(null);
        $dataClasificacionUso = $usosuelo->get(null);
        $dataConservacion = $conservacionpropiedad->get(null);
        $dataPropietario = $propietario->get(null);
        $dataCliente = $cliente->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_propiedad'];
            $cantidad = $propiedad->edit($id, $data);
            if ($cantidad) {
                $propiedad->flash('success', 'Registro actualizado con éxito');
                $data = $propiedad->get(null);
                include('views/propiedad/index.php');
            } else {
                $propiedad->flash('danger', 'Algo fallo');
                $data = $propiedad->get(null);
                include('views/propiedad/index.php');
            }
        } else {
            $data = $propiedad->get($id);
            include('views/propiedad/form.php');
        }
        break;
    case 'getAll':
    default:
        $data = $propiedad->get(null);
        include("views/propiedad/index.php");
}
include("views/footer_admin.php");
?>