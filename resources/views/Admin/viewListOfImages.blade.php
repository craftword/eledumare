@extends('layouts.master')

@section('page', 'All Images In The Gallery')

@section('content')
<div class="row">
  @if (session('status'))
    <blockquote >
        {{ session('status') }}
    </blockquote>
 @endif
	<p>
		<a href="/listTable/create" class="btn btn-lg btn-primary">Add New Image </a>
	</p>
	<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description </th>
                        <th>Date Created </th> 
                        <th> </th>                         
                      </tr>
                    </thead>
                    <tbody id="scorelist">
                     	@foreach ($images as $indexKey => $images)
                         <tr>
              							<td>{{ $indexKey + 1 }}</td>
              							<td>{{ $images->title }}</td>
              							<td>{{ $images->description }}</td>
              							<td>{{ $images->created_at }}</td>
              							<td>
                                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                <!-- we will add this later since its a little more complicated than the other two buttons -->
                                {{ Form::open(array('url' => 'listTable/' . $images->id, 'class' => 'pull-right', 'id'=>'delete'. $images->id)) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger', 'type'=>'submit')) }}
                                {{ Form::close() }}

                                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                <a class="btn btn-small btn-success" href="{{ URL::to('listTable/' . $images->id) }}"><i class="fa fa-eye"></i></a>

                                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('listTable/' . $images->id . '/edit') }}"><i class="fa fa-edit"></i></a>

                                
                							</td>
                						</tr>

                     	@endforeach 
                      
                   </tbody>
    </table>	

</div>



@endsection