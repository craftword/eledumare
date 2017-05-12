@extends('layouts.master')

@section('page', 'Upload Images')

@section('content')
 <div class="row">
 	<div class="col-md-offset-2 col-md-8 col-sm-8">
		<!-- if there are creation errors, they will show here -->
		{{ Html::ul($errors->all()) }}

		{{ Form::open(array('url' => '/addPics', 'files'=>'true')) }}

		<div class="input-group form-group">
        	{{ Form::label('name', 'Title') }} <br />
        	{{ Form::text('title') }}
    	</div>
    	<div class="input-group form-group">
        	{{ Form::label('name', 'Description') }} <br />
        	{{ Form::textarea('description') }}
    	</div>
	 	<div class="input-group form-group">
        	{{ Form::label('name', 'Tags') }} <br />
        	{{ Form::select('size', ['1' => 'Wedding', '2' => 'Advertising', '3' => 'Documentary', '4' => 'Landscape', '5' => 'Potrait'], '1') }}
    	</div>
		<div class="input-group form-group">
        	{{ Form::label('name', 'Upload Image') }} <br />
        	{{ Form::file('image') }}
    	</div>
		 <div class="input-group form-group">
        	{{ Form::submit('Upload!') }}
    	</div>   		
		{{ Form::close() }}
	</div>
</div>

@endsection