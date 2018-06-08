@extends('admin.layouts.page')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
	<li class="breadcrumb-item active">View category</li>
</ol>

<div class="card mb-5">
	<div class="card-body">
		<h3 class="card-title pull-left">{{$category["name"]}}</h3>
		<a class="btn btn-primary pull-right" href="{{ route('categories.index') }}"> Back</a>
		<div class="clearfix"></div>
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>#</th>
					<th>Attribute</th>
					<th>Value</th>
				</tr>
			</thead>	
			<tbody>
				@foreach($category->toArray() as $key => $value)
				<tr>
					<th width="40">{{$loop->iteration}}</th>
					<td width="150">{{ucfirst($key)}}</td>
					<td>{{$value}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th colspan="3" class="text-center">
<a class="btn btn-success" href="{{route('categories.edit',$category->id)}}">Update</a>
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
	@if($category['image'])
	<img src="/storage/categories/{{$category['image']}}" class="card-img-bottom">
	@endif
</div>
@endsection