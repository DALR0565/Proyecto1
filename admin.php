<?php
  if(isset($_POST["regresar"])){
    echo "<script>window.location='login.php'</script>";
  }

?>
<html>
    <style>
        input[type='submit']{
            background-color: coral;
            font-family: sans-serif;
            font-size: medium;
            color: white;
            padding: 8px 10px;
            margin: 8px 0px;
            border: solid;
            cursor: pointer;
            width: 10%;
        }
    </style>
  <head>
    <h1>Dashboard</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Audifonos',     11],
          ['iPhone',      4],
          ['Laptop HP',  6],
          ['Laptop Acer', 8],
          ['Laptop ASUS',    5],
          ['Laptop DELL',    3]
        ]);

        var options = {
          title: 'Ventas del dia'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <form method="post" action="admin.php">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <input type="submit" name="regresar" value="Cerrar sesion">
    </form>
  </body>
</html>