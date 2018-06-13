@extends('admin.layouts.page')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('animals.index')}}">Animals</a> </li>
	<li class="breadcrumb-item active">View animal</li>
</ol>

<div class="card mb-5">
	<div class="card-body">
		<h3 class="card-title pull-left">{{$animal["name"]}}</h3>
		<a class="btn btn-primary pull-right" href="{{ route('animals.index') }}"> Back</a>
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
				@foreach($animal->toArray() as $key => $value)
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
<a class="btn btn-success" href="{{route('animals.edit',$animal->id)}}">Update</a>
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
	@if($animal['image'])
	<img src="/storage/animals/{{$animal['image']}}" class="card-img-bottom">
	@endif
</div>
@endsection