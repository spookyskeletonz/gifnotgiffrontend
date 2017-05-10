<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
</head>
<body>
  
  <canvas id="graph" width="400" height="400"></canvas>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

</body>
</html>

<script>
var labels = new Array();
var dataValues = new Array();

<?php foreach ($data as $values) : ?>
    var value = <?php Print($values['CM_Return']); ?>;
    var text = "<?php Print($values['Date']); ?>";
    labels.push(text);
    dataValues.push(value);
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
      data: dataValues
    },
    {
      fillColor: "rgba(100,220,220,0.7)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: dataValues
    }
  ]
};
var context = document.querySelector('#graph').getContext('2d');
new Chart(context).Line(data);
</script>
