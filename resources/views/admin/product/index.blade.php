@extends('admin.master')
@section('title','Products')
@section('content')
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h3>Products</h3>
		<div class="table-responsive">
			<table class="table table-responsive">
				<caption>Product Table</caption>
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Special Price</th>
						<th>Stock</th>
						<th>Category Id</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td><img src="{{url('images',$product->image)}}" alt="" width="40" height="40"></td>
						<td>{{$product->pro_name}}</td>
						<td>{{$product->pro_price}}</td>
						<td>{{$product->spl_price}}</td>
						<td>{{$product->stock}}</td>
						<td>{{$product->category_id}}</td>
						<td>
							<form action="/product/{{$product->id}}" method="post">
								{{method_field('DELETE')}}
								{{csrf_field()}}
								<input type="submit" class="btn btn-sm btn-danger" value="Delete">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</main>
@endsection