	<!doctype html>
	<html lang="{{ config('app.locale') }}">
	    <head>
	        <meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1">

	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
		@for($i = 0; $i<10; $i++)

		@php
		$formattedTime = "2015-10-01T18:35:46.961Z";
		$formattedTime = explode("T",$articles[0]->TimeStamp)[0];
		$parts = explode("-",$formattedTime);
		$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
		@endphp
		<div  class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $articles[0]->Headline }}</h3>
			</div>
			<div class="panel-body"> {{ $articles[0]->NewsText }}</div>
			<ul class="list-group">
    <li class="list-group-item">{{ $articles[0]->InstrumentIDs }}</li>
		 <li class="list-group-item">{{$articles[0]->{'Topic Codes'} }}</li>
    <li class="list-group-item">{{$formattedTime }}</li>
  </ul>
	<form class="form" method="POST" action="{{url('/chart')}}">
			<div class="form-group">
				  <input type="hidden" name="InstrumentIDs" value={{ $articles[0]->InstrumentIDs }}>
					<input type="hidden" name="TimeStamp" value={{ $articles[0]->TimeStamp }}>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn">View chart</button>
				</div>
		</form>
		</div>
		@endfor
	</div>
</body>
</html>
