<?php
include_once("controllers/cliente.php");
include_once("views/header_admin.php");
include_once("views/menu_admin.php");
$nombre_modelo = "Cliente";

$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $cliente->validatePrivilegio('Cliente Crear');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $cliente->new($data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro dado de alta con éxito.');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            } else {
                $cliente->flash('danger', 'Ocurrió algún error.');
                include('views/cliente/form.php');
            }
        } else {
            include('views/cliente/form.php');
        }
        break;
    case 'edit':
        $cliente->validatePrivilegio('Cliente Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_cliente'];
            $cantidad = $cliente->edit($id, $data);
            if ($cantidad) {
                $cliente->flash('success', 'Registro actualizado con éxito');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            }
        } else {
            $data = $cliente->get($id);
            include('views/cliente/form.php');
        }
        break;
        case 'delete':
            $cliente->validatePrivilegio('Cliente Eliminar');
            $cantidad = $cliente->delete($id);
            if ($cantidad) {
                $cliente->flash('success', 'Registro con el id= ' . $id . ' eliminado con éxito');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            } else {
                $cliente->flash('danger', 'Algo fallo');
                $data = $cliente->get(null);
                include('views/cliente/index.php');
            }
            break;
    case 'getAll':
    default:
    $cliente->validatePrivilegio('Cliente Leer');
        $data = $cliente->get(null);
        include("views/cliente/index.php");
        break;
}   
include("views/footer_admin.php");
?>