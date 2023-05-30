<div class="row">
  &nbsp;
</div>
<div class="row">
  <div class="col-2">
    &nbsp;
  </div>
  <div class="col-3">
    <p><a class="btn btn-success" href="avaluo.php" role="button">Volver</a>
    </p>
  </div>
</div>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  const randomColor = Math.floor(Math.random() * 16777215).toString(16);
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    <?php $data = $avaluo->chartAvaluoCompleto() ?>
    var data = google.visualization.arrayToDataTable([
      ['Estatus de pago', 'Conteo', { role: 'style' }],

      <?php echo '[' . "'Pagado'" . ',' . $data[0]['pagado'] . ', ' ?> "#" + randomColor <?php echo '], ' ?>
      <?php echo '[' . '"Pendiente de Pago"' . ',' . $data[0]['pendiente_pago'] . ', ' ?> "#" + randomColor <?php echo ']' ?>

    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation"
      },
      2]);

    var options = {
      title: "Cantidad de avaluos pagados/pendientes de pago",
      width: 600,
      height: 400,
      bar: { groupWidth: "95%" },
      legend: { position: "none" },
    };
    var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
    chart.draw(view, options);
  }
</script>
<div id="barchart_values" style="width: 900px; height: 300px;"></div>