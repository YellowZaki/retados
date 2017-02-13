{% extends "layout.php" %}

{% block tabActivo %}inicio{% endblock tabActivo %}

{% block cuerpo %}

{% if message %}
	<div class="alert alert-success" role="alert"> {{ message|raw}}</div>
{% endif %}

{% if error %}
	<div class="alert alert-error" role="alert"> {{ error|raw}}</div>
{% endif %}

<div class="jumbotron">
	<h1>Bienvenid@</h1>
	<p class="lead">Panel de control y lista de alumnos del instituto I.E.S. Al-Andalus</p>
</div>

  Partes
<div id="GraficoGoogleChart-ejemplo-1" style="width: 800px; height: 600px"></div>
<div id="piechart" style="width: 900px; height: 500px;"></div>

    
      
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
       function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Partes por género'],
          ['Chicos',     46],
          ['Chicas',      47],
          
        ]);

        var options = {
          title: 'Partes por género'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   function dibujarGrafico() {
     // Tabla de datos: valores y etiquetas de la gráfica
     var data = google.visualization.arrayToDataTable([
       ['Texto', 'Valor numérico'],
       ['Chicos', 49.21],
       ['Chicas', 48.28],
      
     ]);
     var options = {
       title: 'Tabla de partes dividida por género'
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart( 
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
   
  </script> 



{% endblock cuerpo %}



