<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Typeahead.js Bundle -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <!-- DatePicker.js bundle -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .tt-input,
            .tt-hint {
                width: 396px;
                height: 30px;
                padding: 8px 12px;
                font-size: 24px;
                line-height: 30px;
                border: 2px solid #ccc;
                border-radius: 8px;
                outline: none;
            }

            .tt-input {
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
                color: #999;
            }

            .tt-menu {
                width: 422px;
                margin-top: 12px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
                padding: 3px 20px;
                font-size: 18px;
                line-height: 24px;
            }

            .tt-suggestion.tt-cursor {
                color: #fff;
                background-color: #0097cf;

            }

            .tt-suggestion p {
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                 <div class="title m-b-md">
                    Play Simulation
										@php
											if ($roundNumber >=1)
												echo $prediction;
										@endphp
                    "<?php echo $roundNumber;?>"
        </div>
				<canvas id="graph" width="400" height="400"></canvas>
       	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        @yield('content')
    </body>
</html>


<script>
var labels = new Array();
var Values = new Array();

<?php foreach ($data as $values) : ?>
    var text = "<?php Print($values['Date']); ?>";
    var value = "<?php Print($values['Return']); ?>"
    labels.push(text);
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
