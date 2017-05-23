@extends('layouts/simulationLayout')
<title>Welcome to the Simulation</title>
@section('content')



@php //get id of the company user is predicting for
//echo $chosenArticle->InstrumentIDs;
$allIDs = explode(",",$chosenArticle->InstrumentIDs);
$chosenID = $allIDs[0]; //assumes theres at least one id
@endphp

@php //get related articles
$relatedArticles = array();
foreach ($articles as $article){
	$articleIDs = explode(",", $article->InstrumentIDs);
	if (in_array ($chosenID , $articleIDs)){
		$relatedArticles[] = $article; //add to related articles
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

@php

$formattedTime = explode("T",$chosenArticle->TimeStamp)[0];
$parts = explode("-",$formattedTime);
$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
//echo $score;
@endphp

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
			<ul class="list-group">
				<li class="list-group-item">{{ $chosenArticle->InstrumentIDs }}</li>
				<li class="list-group-item">{{$chosenArticle->{'Topic Codes'} }}</li>
    		<li class="list-group-item">{{$formattedTime }}</li>
  		</ul>
	</div>
@endforeach


@stop
