<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Charts</title>        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
    <script type="text/javascript">
    //$analytics = $gender;
    $analytics = [["Gender","Number"],["male",2],["female",2]];
    //google.charts.load('current',{'packges':['corechart']});
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
    //google.charts.setOnLoadCallback(drawChart());
    function drawChart(){
        $data = google.visualization.arrayToDataTable($analytics);
        $options = {
            title: 'Percentage of Male and Female Employee'
        }; 
        //chart =new google.charts.Bar(document.getElementById('pie_chart'));
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));

        //chart = new google.visualization.PieChart(document.getElemetById('pie_chart'));
        chart.draw($data, $options);        
    }
    </script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>

<body>
<br />
  <div class="container">
   <h3 algin="center">Make Google Pie Chart in Laravel</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Percentage of Male and Female Employee</h3>
    </div>
    <div class="panel-body" algin="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
