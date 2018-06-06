@extends('admin.layouts.page')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
	<li class="breadcrumb-item active">View category</li>
</ol>

<div class="row">
	<div class="col-lg-12 mt-3">
		<div class="pull-left">
			<h2>{{$category->name}}</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
		</div>
	</div>
</div>
<hr>
<p>{{$category->description}}</p>
<hr>
<img src="/img/{{$category->image}}">
@endsection