@extends('layouts.master')

@section('page', 'Upload Images')

@section('content')
 <div class="row">
 	<div class="col-md-offset-2 col-md-8 col-sm-8">
		<!-- if there are creation errors, they will show here -->
		{{ Html::ul($errors->all()) }}

		{{ Form::open(array('url' => '/addImage', 'files'=>'true', 'id'=>'form', 'method'=>'post')) }}

        {{ Form::token() }}
    <div class="row">
		<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
        	{{ Form::label('name', 'Title') }} <br />
        	{{ Form::text('title', null, array('class'=>'form-control', 'size'=>'20')) }}
    	</div>
    	<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
        	{{ Form::label('name', 'Description') }} <br />
        	{{ Form::textarea('description', null, array('class'=>'form-control', 'rows'=>'5')) }}
    	</div>
	 	<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
        	{{ Form::label('name', 'Tags') }} <br />
        	{{ Form::select('tag', ['Wedding' => 'Wedding', 'Advertising' => 'Advertising', 'Documentary' => 'Documentary', 'Landscape' => 'Landscape', 'Potrait' => 'Potrait'], 'Wedding') }}
    	</div>
		<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
        	{{ Form::label('name', 'Upload Image') }} <br />
        	{{ Form::file('image') }}
    	</div>
    </div>
    <div class="row">
		 <div class="col-md-offset-8 col-md-2 col-sm-2 form-group">
        	{{ Form::submit('Upload', array('name'=>'submit', 'class'=>'btn btn-success')) }}
    	</div> 
    </div>  		
		{{ Form::close() }}
	</div>
</div>

@endsection