@extends('layouts/simulationLayout')
<title>Welcome to the Simulation</title>
@section('content')



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
	//	if ($relatedDate>= $startRange AND $relatedDate <= $endRange){
			$relatedArticles[] = $article; //add to related articles
	//	}
		//time stuff

	}
}
@endphp


<div class="container" style="text-align: center">
		<form class="form" method="POST" action="{{url('/simulation')}}">
				<div id="topiccodes" class="form-group">
						<label>
						<input type="hidden" name="roundNumber" value="<?php echo $roundNumber+1?>">
						<input type="hidden" name="score" value="<?php echo $score?>">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</label>
				</div>
				<input type="radio" name="prediction" value="increase"> Increase<br>
				<input type="radio" name="prediction" value="decrease"> Decrease<br>
				<button type="submit" class="btn">Continue</button>
		</form><canvas id="canvas" width="300" height="300"></canvas>
</div>

<div  class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $chosenArticle->Headline }}</h3>
	</div>
	<div class="panel-body"> {{ $chosenArticle->NewsText }}</div>
	<ul class="list-group">
		<li class="list-group-item">{{ $chosenArticle->InstrumentIDs }}</li>
		<li class="list-group-item">{{$chosenArticle->{'Topic Codes'} }}</li>
		<li class="list-group-item">{{$formattedTime }}</li>
	</ul>
</div>

@foreach ($relatedArticles as $article)
		@php
		$formattedTime = explode("T",$article->TimeStamp)[0];
		$parts = explode("-",$formattedTime);
		$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
		@endphp
		<div  class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $article->Headline }}</h3>
			</div>
			<ul class="list-group">
    		<li class="list-group-item">{{$formattedTime }}</li>
  		</ul>
	</div>
@endforeach


@stop
