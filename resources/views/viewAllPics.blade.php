@extends('layouts.master')

@section('page', 'All Pictures In The Gallery')

@section('content')
<div class="row">
	<p>
		<a href="/addImage" class="btn btn-lg btn-success">Add New Image </a>
	</p>
	<table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Score </th>                        
                      </tr>
                    </thead>
                    <tbody id="scorelist">
                      
                      
                   </tbody>
    </table>	

</div>



@endsection