<?php
include_once(__DIR__ . "/controllers/sistema.php");
require_once '../vendor/autoload.php';

date_default_timezone_set('America/Mexico_City');

$pdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('style.css');
$pdf->SetTitle('THE CONSTRUCTOR|PROJECT REPORT|'.date('d/m/Y H:i:s'));
$pdf->SetHeader('THE CONSTRUCTOR|PROJECT REPORT|{DATE j/m/Y}');
$pdf->SetWatermarkText('THE CONSTRUCTOR');
$pdf->showWatermarkText = true;
$pdf->watermarkTextAlpha = 0.1;

$pdf->defaultheaderfontsize = 10;
$pdf->defaultheaderfontstyle = 'B';
$pdf->defaultheaderline = 0;
$pdf->defaultfooterfontsize = 10;
$pdf->defaultfooterfontstyle = 'BI';
$pdf->defaultfooterline = 0;

$pdf->SetFooter('THE CONSTRUCTOR|PROJECT REPORT|{PAGENO}');

$sistema->db();

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id_proyecto = (isset($_GET["id"])) ? $_GET["id"] : null;


switch ($action):
    case 'proyecto':
        $sql = "SELECT * FROM vw_proyecto WHERE id_proyecto=:id_proyecto";
        $st = $sistema->db->prepare($sql);
        $st->bindParam(':id_proyecto', $id_proyecto, PDO::PARAM_INT);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        $html = '<img src="../images/logo.jpg" style="height: 200px" />';
        $html .= '<h5 align="right">Dependencia: THE CONSTRUCTOR</h5>';
        $html .= '<h5 align="right">Clave: 00000000</h5>';
        $html .= '<h5 align="right">Asunto: ' . 'Reporte De Proyecto' . '</h5>';
        $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
        $html .= '<h1>Departamento: <strong>' . $data[0]['departamento'] . '</strong></h1>';
        $html .= '<h2>Proyecto: <strong>' . $data[0]['proyecto'] . '</strong></h2>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<h3>Descripción: <h4><em>' . $data[0]['descripcion'] . '</em></h4></h3>';
        $html .= '<h4>Inicio Del Proyecto: <strong>' . date_format(date_create($data[0]['fecha_inicio']), 'd/m/Y') . '</strong></h4>';
        $html .= '<h4>Fin Del Proyecto: <strong>' . date_format(date_create($data[0]['fecha_fin']), 'd/m/Y') . '</strong></h4>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<table class=" table table-bordered">
        <thead>
          <tr>
            <th scope="col">Número</th>
            <th scope="col">Tarea</th>
            <th scope="col">Avance</th>
          </tr>
        </thead>
        <tbody>';

        $i = 0;
        foreach ($data as $key => $info):
            $i++;
            $html .= '<tr>';
            $html .= '<td>' . $i . '</td>';
            $html .= '<td>' . $info['tarea'] . '</td>';
            $html .= '<td>' . $info['avance'] . '%</td></br>
            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <progress value="' . $info['avance'] . '" max="100"></progress>
            </div>';
            $html .= '</tr>';
        endforeach;

        $html .= '</tbody>
    </table>';
        break;
    default:
        $html = '<h1>Reporte</h1>No hay ningun reporte que generar';
endswitch;
$pdf->WriteHTML($stylesheet, 1); // CSS Script goes here.
$pdf->writeHTML($html, 2);
$pdf->output();

?>