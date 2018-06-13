@extends('admin.layouts.page')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item active">Animals</li>
</ol>
@include('admin.partials.message')
<div class="row">
	<div class="col-lg-12 my-3">
		<div class="pull-left">
			<h2>Animals List</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('animals.create') }}"> Create New Animal</a>
		</div>
	</div>
</div>
<table class="table">
	<tr class="thead-light">
		<th> No </th>
		<th> Name </th>
		<th> Category </th>
		<th> Excerpt </th>
		<th> Action </th>
	</tr>
		@if(count($animals))
		@foreach($animals as $animal)
	<tr>
			<td> {{++$i}}</td>
			<td> {{$animal->name}}</td>
			<td> {{$animal->category->name}}</td>
			<td >{{$animal->excerpt}}</td>
			<td width="180">
				<form action="{{ route('animals.destroy',$animal->id) }}" method="POST">
				<!-- onsubmit="return confirm('Delete this item?')" -->
				<a class="btn btn-info" href="{{ route('animals.show',$animal->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				<a class="btn btn-primary" href="{{ route('animals.edit',$animal->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger" data-toggle='confirmation'>
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</button>
			</form>
			</td>
	</tr>
		
		@endforeach
		@else
			<h3>No animals yet</h3>
		@endif

</table>
{{$animals->links()}}
@endsection