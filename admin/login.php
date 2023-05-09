<?php
include('controllers/sistema.php');
include_once("views/header_admin.php");

$action = (isset($_GET['action'])) ? $_GET['action'] : "login";

switch ($action) {
    case 'logout':
        $sistema->logout();
        include_once('views/login/index.php');
        break;
    case 'forgot':
        include_once('views/login/forgot.php');
        break;
    case 'send':
        if (isset($_POST['enviar'])) {
            $correo = $_POST['correo'];
            $send = $sistema->loginSend($correo);
            if ($send) {
                $sistema->flash('success', "Si el correo existe y está en la base de datos se le enviará un correo para la recuperación");
            } else {
                $sistema->flash('danger', "Error");
            }
            include_once('views/login/index.php');
        }
        break;
    case 'recovery':
        $data = $_GET;
        if (isset($data['correo']) and isset($data['token'])) {
            if ($sistema->validateToken($data['correo'], $data['token'])) {
                include_once('views/login/recovery.php');
            } else {
                $sistema->flash('danger', "El token expiró.");
                include_once('views/login/index.php');
            }
        } else {
            $sistema->flash('danger', "La URL no puede ser completada como usted la requirió.");
            include_once('views/login/index.php');
        }
        break;
    case 'reset':
        $data = $_POST;
        if (isset($data['correo']) and isset($data['token']) and isset($data['contrasena'])) {
            if ($sistema->validateToken($data['correo'], $data['token'])) {
                if ($sistema->resetPassword($data['correo'], $data['token'], $data['contrasena'])) {
                    $sistema->flash('success', "Contraseña actualizada con exito.");
                    include_once('views/login/index.php');
                } else {
                    $sistema->flash('warning', "Contacta a soporte técnico o vuelve a iniciar el proceso");
                    include_once('views/login/forgot.php');
                }
            } else {
                $sistema->flash('danger', "El token expiró.");
                include_once('views/login/index.php');
            }
        } else {
            $sistema->flash('danger', "La URL no puede ser completada como usted la requirió.");
            include('views/login/index.php');
        }
        break;
    case 'login':
    default:
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $login = $sistema->login($data['correo'], $data['contrasena']);
            if ($login) {
                header("Location: index_admin.php");
            } else {
                include_once('views/login/index.php');
            }

        }
        include_once('views/login/index.php');
        break;

}
include_once("views/footer_admin.php");
?>