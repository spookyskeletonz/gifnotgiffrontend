	<!doctype html>
	<html lang="{{ config('app.locale') }}">
	    <head>
	        <meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1">

	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	        <!-- Fonts -->
	        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	        <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	        <!-- Bootstrap JS -->
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	        <!-- ChartJS -->
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

	        <!-- Fonts -->
	        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
	        </style>
	    </head>
	    <body>
	<div class="card-columns">
		@foreach ($articles as $article)

		@php
		$formattedTime = explode("T",$article->TimeStamp)[0];
		$parts = explode("-",$formattedTime);
		$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
		@endphp
		<div  class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $article->Headline }}</h3>
			</div>
			<div class="panel-body"> {{ $article->NewsText }}</div>
			<ul class="list-group">
    <li class="list-group-item">{{ $article->InstrumentIDs }}</li>
		 <li class="list-group-item">{{$article->{'Topic Codes'} }}</li>
    <li class="list-group-item">{{$formattedTime }}</li>
  </ul>
	<form class="form">
			<div class="form-group">
				<a href="#" class="btn btn-lg btn-success" 
   				data-toggle="modal" 
   				data-target="#basicModal">View chart</a>
			</div>
			<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			   <div class="modal-dialog">
			      <div class="modal-content">
			         <div class="modal-header">
			            <h4 class="modal-title" id="myModalLabel">Chart</h4>
			         </div>
			         <div class="modal-body">
			         <p>
			            @php
							$dateOfInterest = $article->TimeStamp;
						
							$dateOfInterest = explode("T",$dateOfInterest)[0];
							$parts = explode("-",$dateOfInterest);
							$dateOfInterest = $parts[2]."%2F".$parts[1]."%2F".$parts[0];
							$article->InstrumentIDs = preg_replace("/,\d+[^,]*,/",",",$article->InstrumentIDs);
							$url = "http://ec2-54-160-211-66.compute-1.amazonaws.com:3000/api/company_returns?InstrumentID=".$article->InstrumentIDs."&UpperWindow=5&LowerWindow=5&ListOfVar=AV_Return&DateOfInterest=".$dateOfInterest;
							$result = file_get_contents($url);
							$vars = json_decode($result, true);
							$vars = str_replace("string(10)","", $vars); 
							var_dump($vars);
							@endphp
						</p>
			         </div>
			    	</div>
			  	</div>
			</div>
		</form>
		</div>
		@endforeach
	</div>
</body>
</html>
