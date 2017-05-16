@extends('layouts.master')

@section('page', 'View Of Image')

@section('content')

	<div class="row">
		<div class="col-md-6 col-sm-6">
			<img src="{{$images->image}}" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 col-sm-6">
			{{ $images->id }}<br />
			{{ $images->title }}<br />
			{{ $images->description }}<br />
		    {{ $images->created_at }}
		</div>

	</div>

@endsection
