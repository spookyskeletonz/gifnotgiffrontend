@extends('layouts/simulationLayout')
<title>Welcome to the Simulation</title>
@section('content')
<div class="container" style="text-align: center">
		<form class="form" method="POST" action="{{url('/simulation')}}">
				<div id="topiccodes" class="form-group">
						<label>
						<input type="hidden" name="roundNumber" value="<?php echo $roundNumber+1?>">
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
