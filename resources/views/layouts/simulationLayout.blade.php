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
        <!-- chart generation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #DCDCDC;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            label{
            display:block;   
            text-align:right;

           }
           .headings{
              vertical-align: top;
              text-align: left;

           }
           .subheadings {
                font: bold 12px/30px Georgia, serif;
                text-decoration: underline;
            
           }
           .articles_left{
            display:block;
            position: absolute;
            float:left;
            left:10px;
            width: 600px;
            border: 1px solid #000; 
            color:black;
            font-weight: bold;
           }

           .related_articles{
            color:black;
            font-weight: bold;
           }

            .button{
                float:right;
            }
    

            .full-height {
                height: 100vh;
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
                font-size: 60px;
                color:black;
                font-weight: bold;
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

            .hor_align{
                float:right;
            }            
        </style>
    </head>
    <body>

@php
//get formattedTime for chosenArticle
$formattedTime = explode("T",$chosenArticle->TimeStamp)[0];
$parts = explode("-",$formattedTime);
$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
//echo $score;


//get id of the company user is predicting for
//echo $chosenArticle->InstrumentIDs;
$allIDs = explode(",",$chosenArticle->InstrumentIDs);
$chosenID = $allIDs[0]; //assumes theres at least one id

//get related range for chosenArticle
//$chosenTimestamp = mktime(0, 0, 0, $parts[0], $parts[1], $parts[2]);
//$startRange = DateTime::createFromFormat('D, d/m/Y - H:i', $str_date););
//$endRange = new DateTime('@' . $chosenTimestamp);


//get related articles
$relatedArticles = array();
foreach ($articles as $article){
    $articleIDs = explode(",", $article->InstrumentIDs);
    if (in_array ($chosenID , $articleIDs) && $article != $chosenArticle){
        //$parts = explode("T",$chosenArticle->TimeStamp)[0];
        //$parts = explode("-",$parts);
        //$relatedTimestamp = mktime(0, 0, 0, $parts[0], $parts[1], $parts[2]);
        //$relatedDate = new DateTime('@' . $relatedTimestamp);
    //  if ($relatedDate>= $startRange AND $relatedDate <= $endRange){
            $relatedArticles[] = $article; //add to related articles
    //  }
        //time stuff

    }
}
@endphp


<div class="container">
        <div class="flex-center", "position-ref" ,"full-height">
            <div class="content">
                 <div class="title","m-b-md">
                    Play Simulation
                                        @php
                                            if ($roundNumber >=1)
                                                echo $prediction;
                                        @endphp
                    "<?php echo $roundNumber;?>"
        </div>
    </div>
  </div>
    <div class="headings">
      <br>
       <div class="subheadings">
         <h1> Key Article </h1>
       </div>
       <br>
     </div>

   <div class="articles_left">
    <p> {{ $chosenArticle->Headline }}</p>
    <p> {{ $chosenArticle->NewsText }} }}</p> 
      <ul class="list-group">
        <li class="list-group-item">{{ $chosenArticle->InstrumentIDs }}</li>
        <li class="list-group-item">{{$chosenArticle->{'Topic Codes'} }}</li>
        <li class="list-group-item">{{$formattedTime }}</li>
      </ul>
    </div>
    <div class="hor_align">
        <canvas id="graph" width="400" height="400"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
        <form class="form" method="POST" action="{{url('/simulation')}}">
                <div id="topiccodes" class="form-group">
                        <label>
                            <input type="hidden" name="roundNumber" value="<?php echo $roundNumber+1?>">
                            <input type="hidden" name="score" value="<?php echo $score?>">
                            <input type="hidden" name="topiccode1" value="<?php echo $topiccode1?>">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </label>
                  </div>
                <label>
                  <input type="radio" name="prediction" value="increase" class="button">  Increase </label>
                <label>
                  <input type="radio" name="prediction" value="decrease" class="button"> Decrease </label>
                <button type="submit" style="float:right"class="button">Continue</button>
            </form>
            </div>
            </div>
                </form><canvas id="canvas" width="300" height="300"></canvas>
                <div class="headings">
                <div class="subheadings">
                  <h1> Related Articles </h1>
                  </div>
                   <br>
                 </div>
             </form>
               </div>

     @foreach ($relatedArticles as $article)
                @php
                $formattedTime = explode("T",$article->TimeStamp)[0];
                $parts = explode("-",$formattedTime);
                $formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
                @endphp
                <div class="related_articles">
                <div  class="panel" ,"panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">{{ $article->Headline }}</h3>
                </div>
               <ul class="list-group">
               <li class="list-group-item">{{$formattedTime }}</li>
              </ul>
              </div>
              </div>
             @endforeach


        @yield('content')
         <br>
         <br>
         <br>
         <footer>
           <p>GifNotGif © 2017. All Rights Reversed</p>
           <p>Contact information: <a href="mailto:someone@example.com">maliha.mian@outlook.com</a>.</p>
        </footer>
    </body>
</html>




<script>
var labels = new Array();
var Values = new Array();
labels.push("01/01/2015");
labels.push("02/01/2015");
labels.push("03/01/2015");
labels.push("04/01/2015");
labels.push("05/01/2015");
labels.push("06/01/2015");
labels.push("07/01/2015");

<?php $i = 0; ?>
<?php while ($i < 7){ 
    $i++;
    $data[] = mt_rand(-1, 1)/rand(1,50);
}
?>

<?php foreach ($data as $values) : ?>
    var value = "<?php Print($values); ?>"
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

