<?php
include_once("controllers/valuador.php");
include_once("views/header.php");
include_once("views/menu.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $valuador->new($data);
            if ($cantidad) {
                $valuador->flash('success', 'Registro dado de alta con éxito.');
                $data = $valuador->get(null);
                include('views/valuador/index.php');
            } else {
                $valuador->flash('danger', 'Ocurrió algún error.');
                include('views/departamento/form.php');
            }
        } else {
            include('views/valuador/form.php');
        }
        break;
    case 'getAll':
    default:
        $data = $valuador->get(null);
        include("views/valuador/index.php");
        break;
}
include("views/footer.php");
?>