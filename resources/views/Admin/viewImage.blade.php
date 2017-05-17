@extends('layouts.master')

@section('page', 'View')

@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<img src="{{asset($image->image)}}" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 col-sm-6">
			ID: {{ $image->id }}<br />
			Title: <strong>{{ $image->title }}</strong> <br />
			Description: {{ $image->description }}<br />
			Tag: {{ $image->tag }}<br />
		    Date Created: {{ $image->created_at }}
		</div>

	</div>

@endsection
