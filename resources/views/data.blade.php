@extends('layouts/layout')
@section('content')
	<h1>Matching Articles </h1>
	<div class="card-columns">
		@for($i = 0; $i<10; $i++)
		<div  class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $articles[0]->Headline }}</h3>
			</div>
			<div class="panel-body"> {{ $articles[0]->NewsText }}</div>
			<ul class="list-group">
    <li class="list-group-item">{{ $articles[0]->InstrumentIDs }}</li>
    <li class="list-group-item">{{ $articles[0]->{'Topic Codes'} }}</li>
    <li class="list-group-item">{{ $articles[0]->TimeStamp }}</li>
  </ul>
		</div>
		@endfor
	</div>
@stop
