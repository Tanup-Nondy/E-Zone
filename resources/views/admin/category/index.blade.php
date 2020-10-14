@extends('admin.master')
@section('title','Categories')
@section('content')
	<main class="col-sm-9 ml-sm-auto col-md-10 pt-4" role="main">
		<h3 style="text-decoration: underline;">List Categories</h3>
		<div class="container">
		<ul class="nav navbar-nav">
			@if(!empty($categories))
				<div class="table-responsive">
					<table class="table table-hover">
					<caption>table title and/or explanatory text</caption>
					<thead>
						<tr>
							<th>Category Id</th>
							<th>Category Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>
						</tr>
						@endforeach
						
					</tbody>
					</table>
				</div>
			
			@else
				<li>No Category is available</li>
			@endif
		</ul>
	</div>
		<div class="panel-body">
				<form action="/admin/category/store" method="post" role="form">
				{{csrf_field()}}
				<div class="form-group{{$errors->has('name')? 'has-error':''}}">
						<label for="name">Special Price</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
						<span class="text-danger">{{$errors->first('name')}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
	</div>
	</main>
@endsection