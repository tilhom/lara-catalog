@extends('admin.layouts.page')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item active">Categories</li>
</ol>
@include('admin.partials.message')
<div class="row">
	<div class="col-lg-12 my-3">
		<div class="pull-left">
			<h2>Categories List</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
		</div>
	</div>
</div>

<table class="table table-responsive">
	<tr class="thead-light">
		<th>No</th>
		<th>Name</th>
		<th>Description</th>
		<th width="180px">Action</th>
		<th>Status</th>
	</tr>
	@foreach ($categories as $category)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $category->name }}</td>
		<td>{{ $category->description }}</td>
		<td>
			<form action="{{ route('categories.destroy',$category->id) }}" method="POST">
				<!-- onsubmit="return confirm('Delete this item?')" -->
				<a class="btn btn-info" href="{{ route('categories.show',$category->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				<a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger" data-toggle='confirmation'>
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</button>
			</form>
		</td>
		<td>
			<div class="form-check checkbox-slider--a checkbox-slider-md  checkbox-slider-info ">
				<label>
					<input type="checkbox" {{$category->status?'checked':''}}>
					<span></span>
				</label>
			</div>
		</td>
	</tr>
	@endforeach
</table>

{!! $categories->links() !!}
@endsection
@section('jscode')
<script src="{{asset('js/bootstrap-confirmation.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {        
		$('[data-toggle=confirmation]').confirmation({
			rootSelector: '[data-toggle=confirmation]',
            // onConfirm: function (element=this) {
            //     element.closest('form').submit();
            // }
        });   
	});
@endsection