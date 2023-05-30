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
    $html .= '<h1>Reporte: <strong> Avaluo' . '</strong></h1>';
    $html .= '<p>&nbsp;</p>';
    $html .= '<h3>Descripción: <h4><em> El presente informe de avalúos ha sido elaborado con el objetivo de proporcionar una valoración precisa y objetiva de la propiedad en cuestión. Este reporte se basa en una exhaustiva evaluación realizada por expertos en la materia, quienes han utilizado métodos y criterios reconocidos internacionalmente para determinar el valor de mercado del inmueble.' . '</em></h4></h3>';
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
  case 'cliente':
    $sql = "SELECT * FROM vw_cliente";
    $st = $sistema->db->prepare($sql);
    $st->execute();
    $data = $st->fetchAll(PDO::FETCH_ASSOC);
    $html = '<img src="../images/logo.png" style="height: 200px" />';
    $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
    $html .= '<h5 align="right">Clave: 00000000</h5>';
    $html .= '<h5 align="right">Asunto: ' . 'Reporte De Cliente' . '</h5>';
    $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
    $html .= '<h1>Reporte: <strong> Cliente' . '</strong></h1>';
    $html .= '<p>&nbsp;</p>';
    $html .= '<h3>Descripción: <h4><em> El presente informe tiene como objetivo proporcionar una descripción detallada de los clientes de la empresa. Se recopilaron datos relevantes sobre los clientes, como su nombre, teléfono o correo, con el fin de facilitar el contacto con ellos.' . '</em></h4></h3>';
    $html .= '<p>&nbsp;</p>';
    $html .= '<table class=" table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
          </tr>
        </thead>
        <tbody>';

    $i = 0;
    foreach ($data as $key => $info):
      $i++;
      $html .= '<tr>';
      $html .= '<td>' . $info['id_cliente'] . '</td>';
      $html .= '<td>' . $info['cliente'] . '</td>';
      $html .= '<td>' . $info['telefono'] . '</td>';
      $html .= '<td>' . $info['correo'] . '</td>';
      $html .= '</tr>';
    endforeach;

    $html .= '</tbody>
    </table>';
    break;
    case 'propietario':
      $sql = "SELECT * FROM vw_propietario";
      $st = $sistema->db->prepare($sql);
      $st->execute();
      $data = $st->fetchAll(PDO::FETCH_ASSOC);
      $html = '<img src="../images/logo.png" style="height: 200px" />';
      $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
      $html .= '<h5 align="right">Clave: 00000000</h5>';
      $html .= '<h5 align="right">Asunto: ' . 'Reporte De Propietario' . '</h5>';
      $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
      $html .= '<h1>Reporte: <strong> Propietario' . '</strong></h1>';
      $html .= '<p>&nbsp;</p>';
      $html .= '<h3>Descripción: <h4><em> El presente informe tiene como objetivo proporcionar una descripción detallada de los propietarios de los bienes inmuebles registrados. Se recopilaron datos relevantes sobre los propietarios, como su nombre, teléfono o correo, con el fin de facilitar el contacto con ellos.' . '</em></h4></h3>';
      $html .= '<p>&nbsp;</p>';
      $html .= '<table class=" table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Propietario</th>
              <th scope="col">Telefono</th>
              <th scope="col">Correo</th>
            </tr>
          </thead>
          <tbody>';
  
      $i = 0;
      foreach ($data as $key => $info):
        $i++;
        $html .= '<tr>';
        $html .= '<td>' . $info['id_propietario'] . '</td>';
        $html .= '<td>' . $info['propietario'] . '</td>';
        $html .= '<td>' . $info['telefono'] . '</td>';
        $html .= '<td>' . $info['correo'] . '</td>';
        $html .= '</tr>';
      endforeach;
  
      $html .= '</tbody>
      </table>';
      break;
      case 'propiedad':
        $sql = "SELECT * FROM vw_propiedad";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        $html = '<img src="../images/logo.png" style="height: 200px" />';
        $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
        $html .= '<h5 align="right">Clave: 00000000</h5>';
        $html .= '<h5 align="right">Asunto: ' . 'Reporte De Propiedad' . '</h5>';
        $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
        $html .= '<h1>Reporte: <strong> Propiedad' . '</strong></h1>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<h3>Descripción: <h4><em> El presente informe tiene como objetivo proporcionar una descripción los bienes inmuebles que se tienen registrados. Se recopilaron datos relevantes sobre la propiedad, como su ubicación, estado de conservación, tipo de propiedad, etc., con el fin de evaluar su potencial y brindar información precisa a posibles compradores o inversores.' . '</em></h4></h3>';
        $html .= '<p>&nbsp;</p>';
        $html .= '<table class=" table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Localidad</th>
                <th scope="col">Tipo Propiedad</th>
                <th scope="col">Clasif. Uso Suelo</th>
                <th scope="col">Conservación Prop. P</th>
                <th scope="col">Propietario</th>
                <th scope="col">Cliente</th>
              </tr>
            </thead>
            <tbody>';
    
        $i = 0;
        foreach ($data as $key => $info):
          $i++;
          $html .= '<tr>';
          $html .= '<td>' . $info['id_propiedad'] . '</td>';
          $html .= '<td>' . $info['ubicacion'] . '</td>';
          $html .= '<td>' . $info['codigo_postal'] . '</td>';
          $html .= '<td>' . $info['localidad'] . '</td>';
          $html .= '<td>' . $info['tipo_propiedad'] . '</td>';
          $html .= '<td>' . $info['clasificacion_uso_suelo'] . '</td>';
          $html .= '<td>' . $info['conservacion'] . '</td>';
          $html .= '<td>' . $info['propietario'] . '</td>';
          $html .= '<td>' . $info['cliente'] . '</td>';
    
          $html .= '</tr>';
        endforeach;
    
        $html .= '</tbody>
        </table>';
        break;
        case 'visita':
          $sql = "SELECT * FROM vw_visita";
          $st = $sistema->db->prepare($sql);
          $st->execute();
          $data = $st->fetchAll(PDO::FETCH_ASSOC);
          $html = '<img src="../images/logo.png" style="height: 200px" />';
          $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
          $html .= '<h5 align="right">Clave: 00000000</h5>';
          $html .= '<h5 align="right">Asunto: ' . 'Reporte De Visita' . '</h5>';
          $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
          $html .= '<h1>Reporte: <strong> Visita' . '</strong></h1>';
          $html .= '<p>&nbsp;</p>';
          $html .= '<h3>Descripción: <h4><em> El presente informe tiene como objetivo proporcionar una descripción sobre las visitas que se tienen registradas. Se recopilaron datos relevantes sobre la visita, como su ubicación, el valuador que levo a cabo la visita, y el estado de la visita con el fin de llevar un control y manejo sobre las visitas a realizar.' . '</em></h4></h3>';
          $html .= '<p>&nbsp;</p>';
          $html .= '<table class=" table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Fecha Visita</th>
                  <th scope="col">Ubicación</th>
                  <th scope="col">Valuador</th>
                  <th scope="col">ID Avaluo</th>
                  <th scope="col">Estado Visita</th>
                </tr>
              </thead>
              <tbody>';
      
          $i = 0;
          foreach ($data as $key => $info):
            $i++;
            $html .= '<tr>';
            $html .= '<td>' . $info['id_visita'] . '</td>';
            $html .= '<td>' . $info['fecha_visita'] . '</td>';
            $html .= '<td>' . $info['ubicacion'] . '</td>';
            $html .= '<td>' . $info['valuador'] . '</td>';
            $html .= '<td>' . $info['id_avaluo'] . '</td>';
            $html .= '<td>' . $info['estado_visita'] . '</td>';      
            $html .= '</tr>';
          endforeach;
      
          $html .= '</tbody>
          </table>';
          break;
          case 'reclamaciones':
            $sql = "SELECT * FROM vw_reclamaciones";
            $st = $sistema->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            $html = '<img src="../images/logo.png" style="height: 200px" />';
            $html .= '<h5 align="right">ConsultoriaEvalua</h5>';
            $html .= '<h5 align="right">Clave: 00000000</h5>';
            $html .= '<h5 align="right">Asunto: ' . 'Reporte De Reclamaciones' . '</h5>';
            $html .= '<h5 align="right">Fecha: ' . date('d/m/Y H:i:s') . '</h5>';
            $html .= '<h1>Reporte: <strong> Reclamaciones' . '</strong></h1>';
            $html .= '<p>&nbsp;</p>';
            $html .= '<h3>Descripción: <h4><em> El presente informe tiene como objetivo proporcionar una descripción detallada de las reclamaciones presentadas con respecto a los avaluos registrados. Se recopilaron datos relevantes sobre las reclamaciones, incluyendo la naturaleza de las mismas, el estado de reclamación, etc., con el fin de llevar un registro sobre las reclamaciones y tomar decisiones sobre estas.' . '</em></h4></h3>';
            $html .= '<p>&nbsp;</p>';
            $html .= '<table class=" table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID Avaluo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Reclamo</th>
                    <th scope="col">Naturaleza Reclamación</th>
                    <th scope="col">Estado Reclamación</th>
                    <th scope="col">Cliente</th>
                  </tr>
                </thead>
                <tbody>';
        
            $i = 0;
            foreach ($data as $key => $info):
              $i++;
              $html .= '<tr>';
              $html .= '<td>' . $info['id_reclamacion'] . '</td>';
              $html .= '<td>' . $info['id_avaluo'] . '</td>';
              $html .= '<td>' . $info['descripcion'] . '</td>';
              $html .= '<td>' . $info['fecha_reclamo'] . '</td>';
              $html .= '<td>' . $info['naturaleza_reclamacion'] . '</td>';
              $html .= '<td>' . $info['estado_reclamacion'] . '</td>';
              $html .= '<td>' . $info['cliente'] . '</td>';      
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