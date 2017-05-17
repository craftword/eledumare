@extends('layouts.master')

@section('page', 'Edit')

@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<img src="{{asset($image->image)}}" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 col-sm-6">
			{{ Html::ul($errors->all()) }}

			{{ Form::open(array('route' => array('listTable.update', $image->id), 'id'=>'edit', 'method'=>'PUT')) }}
			<div class="row">
				<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
					{{ Form::label('name', 'Title') }} <br />
        			{{ Form::text('title', $image->title ) }}
        		</div>
        		<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
					{{ Form::label('name', 'Description') }} <br />
        			{{ Form::textarea('description', $image->description, array('class'=>'form-control', 'rows'=>'5') ) }}
        		</div>
        		<div class="inner col-xs-12 col-sm-12 col-md-11 form-group">
					{{ Form::label('name', 'Tag') }} <br />
        			{{ Form::select('tag', ['Wedding' => 'Wedding', 'Advertising' => 'Advertising', 'Documentary' => 'Documentary', 'Landscape' => 'Landscape', 'Potrait' => 'Potrait'], $image->tag) }}
        		</div>
        		</div>
        	</div>
			    <div class="row">
					 <div class="col-md-offset-10 col-md-2 col-sm-2 form-group">
			        	{{ Form::submit('Update', array('name'=>'submit', 'class'=>'btn btn-success')) }}
			    	</div> 
			    </div>  		
			{{ Form::close() }}
					
		</div>

	</div>

@endsection
