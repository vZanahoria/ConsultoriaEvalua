<?php
require("../SimpleXLSXGen/SimpleXLSXGen.php");
require_once("controllers/cliente.php");
require_once("controllers/propietario.php");
require_once("controllers/propiedad.php");
require_once("controllers/avaluo.php");
require_once("controllers/visita.php");
require_once("controllers/reclamaciones.php");


$header = [['ID Cliente', 'Apellido Paterno', 'Apellido Materno', 'Nombre', 'Telefono', 'Correo']];
$modelo = isset($_GET["modelo"]) ? $_GET["modelo"] : null;

$data = 0;
switch ($modelo) {
    case 'cliente':
        $data = $cliente->get(null);
        break;
    case 'propietario':
        $data = $propietario->get(null);
        break;
    case 'propiedad':
        $data = $propiedad->get(null);
        break;
    case 'avaluo':
        $data = $avaluo->get(null);
        break;
    case 'visita':
        $data = $visita->get(null);
        break;
    case 'reclamaciones':
        $data = $reclamaciones->get(null);
        break;
    case 'produccion':
        $data = $prod->get(null);
        break;
    case 'rh':
        $data = $rh->get(null);
        break;
}

$resultado = array_merge($header, $data);

$xlsx = Shuchkin\SimpleXLSXGen::fromArray($resultado);
if ($modelo == 'bitacora') {
    $xlsx->downloadAs('BITACORA.xlsx');
} else {
    $xlsx->downloadAs($data[0]["nombre_area"] . '.xlsx');
}
?>