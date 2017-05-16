@extends('layouts.master')

@section('page', 'All Images In The Gallery')

@section('content')
<div class="row">
	<p>
		<a href="/addImage" class="btn btn-lg btn-primary">Add New Image </a>
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
                     	@foreach ($images as $images)
                         <tr>
							<td>{{ $images->id }}</td>
							<td>{{ $images->title }}</td>
							<td>{{ $images->description }}</td>
							<td>{{ $images->created_at }}</td>
							<td><a href="viewImage/{{ $images->id }}">View </a> | <a href="images/{{ $images->id }}/edit">Edit </a> | <a href='images/{{ $images->id }}/delete'>Delete</a>

							</td>
						</tr>

                     	@endforeach 
                      
                   </tbody>
    </table>	

</div>



@endsection