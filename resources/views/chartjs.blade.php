<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Chart</title>
</head>
<body>
  
  <canvas id="graph" width="400" height="400"></canvas>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

</body>
</html>

<script>
var labels = new Array();
var Values = new Array();

<?php foreach ($data as $values) : ?>
    var text = "<?php Print($values['Date']); ?>";
    labels.push(text);
    var value = "<?php Print($values['Return']); ?>"
    Values.push(value);
<?php endforeach; ?>

var data = {
  labels: labels,
  datasets: [
    {
      
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: Values
    }
  ]
};
var context = document.querySelector('#graph').getContext('2d');
new Chart(context).Line(data);
</script>