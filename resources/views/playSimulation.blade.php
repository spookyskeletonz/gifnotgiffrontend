@extends('layouts/simulationLayout')
<title>Welcome to the Simulation</title>
@section('content')

@php
/*
$dateOfInterest = $article->TimeStamp;
$dateOfInterest = explode("T",$dateOfInterest)[0];
$parts = explode("-",$dateOfInterest);
$dateOfInterest = $parts[2]."%2F".$parts[1]."%2F".$parts[0];
$article->InstrumentIDs = preg_replace("/,\d+[^,]*,/",",",$article->InstrumentIDs);
$url = "http://ec2-54-160-211-66.compute-1.amazonaws.com:3000/api/company_returns?InstrumentID="."BHP.AX"."&UpperWindow=5&LowerWindow=5&ListOfVar=AV_Return&DateOfInterest=".$dateOfInterest;
$result = file_get_contents($url);
$vars = json_decode($result, true);
$vars = str_replace("string(10)","", $vars);
var_dump($vars);
 //$data = ($vars['CompanyReturns'][0]['Data']);
 */
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
$formattedTime = explode("T",$article->TimeStamp)[0];
$parts = explode("-",$formattedTime);
$formattedTime = $parts[2]."/".$parts[1]."/".$parts[0];
@endphp

@php
echo $score;
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
</div>
@stop
