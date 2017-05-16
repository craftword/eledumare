@extends('layouts.master')

@section('page', 'ttttgtg')

@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<img src="{{$image->image}}" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 col-sm-6">
			ID: {{ $image->id }}<br />
			Title: <strong>{{ $image->title }}</strong> <br />
			Description: {{ $image->description }}<br />
		    Date Created: {{ $image->created_at }}
		</div>

	</div>

@endsection
