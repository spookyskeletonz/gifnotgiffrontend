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
/*
  $(function(){
   $.getJSON("/test", function (result) {
   
   var labels=[],data=[];
    //for (var i = 0; i < 10; i++) {
        //labels.push(result.['CompanyReturns'][0]['Data'][i]['Date']);
        //data.push(result.['CompanyReturns'][0]['Data'][i]['CM_Return']);
       // labels.push(result[i]);
       // data.push(result[i]);
        labels.push($dates[i]);
        data.push($cm[i]);  
   }
*/
var data = {
  labels: [$date, 'February', 'March'],
  //labels = {!! json_encode($dates) !!},
  //labels = $date;

  datasets: [
    {
      fillColor: "rgba(220,220,220,0.2)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      //data = $cm
      data: [30, 122, 90]
     // data = {!! json_encode($cm) !!}
    },
    {
      fillColor: "rgba(100,220,220,0.7)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: [10, 52, 2]
      //data = $cm
      
      //data: {!! json_encode($cm) !!}
    }
  ]
};

var context = document.querySelector('#graph').getContext('2d');

new Chart(context).Line(data);


</script>
