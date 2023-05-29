<?php
include_once(__DIR__ . "/controllers/sistema.php");
require_once '../vendor/autoload.php';

date_default_timezone_set('America/Mexico_City');

$pdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('style.css');
$pdf->SetTitle('ConsultoriaEvalua|Reporte|' . date('d/m/Y H:i:s'));
$pdf->SetHeader('ConsultoriaEvalua|Reporte|{DATE j/m/Y}');
$pdf->SetWatermarkText('ConsultoriaEvalua');
$pdf->showWatermarkText = true;
$pdf->watermarkTextAlpha = 0.1;

$pdf->defaultheaderfontsize = 10;
$pdf->defaultheaderfontstyle = 'B';
$pdf->defaultheaderline = 0;
$pdf->defaultfooterfontsize = 10;
$pdf->defaultfooterfontstyle = 'BI';
$pdf->defaultfooterline = 0;

$pdf->SetFooter('ConsultoriaEvalua|Reporte|{PAGENO}');

$sistema->db();

$modelo = (isset($_GET["modelo"])) ? $_GET["modelo"] : null;


switch ($modelo):
    case 'avaluo':
        $sql = "SELECT * FROM vw_avaluo";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        $html = '<img src="../images/logo.png" style="height: 200px" />';
        $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
        $html .= '<h5 align="right">Clave: 00000000</h5>';
        $html .= '<h5 align="right">Asunto: ' . 'Reporte De Avaluo' . '</h5>';
        $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
        $html .= '<h1>Rporte: <strong> Avaluo' . '</strong></h1>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<h3>Descripción: <h4><em> El presente informe de avalúos ha sido elaborado con el objetivo de proporcionar una valoración precisa y objetiva de la propiedad en cuestión. Este reporte se basa en una exhaustiva evaluación realizada por expertos en la materia, quienes han utilizado métodos y criterios reconocidos internacionalmente para determinar el valor de mercado del inmueble.'. '</em></h4></h3>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<table class=" table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Valor Reposición</th>
            <th scope="col">Valor Mercado</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Estado Pago</th>
            <th scope="col">Estado Avaluo</th>
            <th scope="col">ID P</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Valuador</th>
          </tr>
        </thead>
        <tbody>';

        $i = 0;
        foreach ($data as $key => $info):
            $i++;
            $html .= '<tr>';
            $html .= '<td>' . $info['id_avaluo'] . '</td>';
            $html .= '<td>' . $info['tarea'] . '</td>';
            $html .= '<td>' . $info['valor_mercado'] . '</td>';
            $html .= '<td>' . $info['valor_reposicion'] . '</td>';
            $html .= '<td>' . $info['observaciones'] . '</td>';
            $html .= '<td>' . $info['estado_pago'] . '</td>';
            $html .= '<td>' . $info['estado_avaluo'] . '</td>';
            $html .= '<td>' . $info['id_propiedad'] . '</td>';
            $html .= '<td>' . $info['ubicacion'] . '</td>';
            $html .= '<td>' . $info['valuador'] . '</td>';

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