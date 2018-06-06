@extends('admin.layouts.page')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
	<li class="breadcrumb-item active">Create</li>
</ol>
<div class="row">
	<div class="col-lg-12 mt-3">
		<div class="pull-left">
			<h2>Add New Category</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
		</div>
	</div>
</div>

@include('admin.partials.errors')

<form action="{{ route('categories.store') }}" method="POST">
	@csrf
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				<input type="text" name="name" class="form-control" placeholder="Name">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Description:</strong>
				<textarea class="form-control" style="height:150px" name="description" placeholder="Detail"></textarea>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>

@endsection