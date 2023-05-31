<?php
require_once("controllers/tipo_propiedad.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $tipopropiedad->validatePrivilegio('Tipo Propiedad Crear');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tipopropiedad->new($data);
            if ($cantidad) {
                $tipopropiedad->flash('success', 'Registro dado de alta con éxito');
                $data = $tipopropiedad->get(null);
                include('views/tipo_propiedad/index.php');
            } else {
                $tipopropiedad->flash('danger', 'Algo fallo');
                include('views/tipo_propiedad/form.php');
            }
        } else {
            include('views/tipo_propiedad/form.php');
        }
        break;
    case 'edit':
        $tipopropiedad->validatePrivilegio('Tipo Propiedad Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipo_propiedad'];
            $cantidad = $tipopropiedad->edit($id, $data);
            if ($cantidad) {
                $tipopropiedad->flash('success', 'Registro actualizado con éxito');
                $data = $tipopropiedad->get(null);
                include('views/tipo_propiedad/index.php');
            } else {
                $tipopropiedad->flash('danger', 'Algo fallo');
                $data = $tipopropiedad->get(null);
                include('views/tipo_propiedad/index.php');
            }
        } else {
            $data = $tipopropiedad->get($id);
            include('views/tipo_propiedad/form.php');
        }
        break;
    case 'delete':
        $tipopropiedad->validatePrivilegio('Tipo Propiedad Eliminar');
        $cantidad = $tipopropiedad->delete($id);
        if ($cantidad) {
            $tipopropiedad->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
            $data = $tipopropiedad->get(null);
            include('views/tipo_propiedad/index.php');
        } else {
            $tipopropiedad->flash('danger', 'Algo fallo');
            $data = $tipopropiedad->get(null);
            include('views/tipo_propiedad/index.php');
        }
        break;
    case 'getAll':
    default:
    $tipopropiedad->validatePrivilegio('Tipo Propiedad Leer');
        $data = $tipopropiedad->get(null);
        include("views/tipo_propiedad/index.php");
        break;
}
include("views/footer_admin.php");
?>