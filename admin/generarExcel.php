<?php
require '../vendor/shuchkin/simplexlsxgen/src/SimpleXLSXGen.php';
include_once("controllers/cliente.php");
include_once("controllers/propietario.php");
include_once("controllers/propiedad.php");
include_once("controllers/avaluo.php");
include_once("controllers/visita.php");
include_once("controllers/reclamaciones.php");


$modelo = isset($_GET["modelo"]) ? $_GET["modelo"] : null;

$data = 0;
switch ($modelo) {
    case 'cliente':
        $header = [['ID Cliente', 'Apellido Paterno', 'Apellido Materno', 'Nombre', 'Telefono', 'Correo', 'Nombre Completo']];
        $data = $cliente->get(null);
        break;
    case 'propietario':
        $header = [['ID Propietario', 'Apellido Paterno', 'Apellido Materno', 'Nombre', 'Telefono', 'Correo', 'Nombre Completo']];
        $data = $propietario->get(null);
        break;
    case 'propiedad':
        $header = [['ID Propiedad', 'Ubicación', 'Código Postal', 'Localidad', 'Tipo Propiedad', 'Clasificación Uso Suelo', 'Conservacion','ID Propietario', 'Propietario', 'ID Cliente', 'Cliente']];
        $data = $propiedad->get(null);
        break;
    case 'avaluo':
        $header = [['ID Avaluo', 'Valor Reposicion', 'Valor Mercado', 'Observaciones', 'ID Estado Pago', 'Estado Pago', 'ID Estado Avaluo','Estado Avaluo', 'ID Propiedad', 'ID Ubicacion', 'Valuador']];
        $data = $avaluo->get(null);
        break;
    case 'visita':
        $header = [['ID Visita', 'Fecha Visita', 'ID Propiedad', 'Ubicación', 'ID Valuador', 'Valuador', 'ID Avaluo','ID Estado Visita', 'Estado Visita']];
        $data = $visita->get(null);
        break;
    case 'reclamaciones':
        $header = [['ID Reclamación', 'Descripción', 'Fecha Reclamo', 'ID Naturaleza', 'Naturaleza Reclamación', 'ID Estado Reclamación', 'Estado Reclamación','ID Cliente', 'Cliente', 'ID Avaluo']];
        $data = $reclamaciones->get(null);
        break;
}

$resultado = array_merge($header, $data);

$xlsx = Shuchkin\SimpleXLSXGen::fromArray($resultado);
switch ($modelo) {
    case 'cliente':
        $xlsx->downloadAs('cliente.xlsx');
        break;
    case 'propietario':
        $xlsx->downloadAs('propietario.xlsx');
        break;
    case 'propiedad':
        $xlsx->downloadAs('propiedad.xlsx');
        break;
    case 'avaluo':
        $xlsx->downloadAs('avaluo.xlsx');
        break;
    case 'visita':
        $xlsx->downloadAs('visita.xlsx');
        break;
    case 'reclamaciones':
        $xlsx->downloadAs('reclamaciones.xlsx');
        break;
}

?>