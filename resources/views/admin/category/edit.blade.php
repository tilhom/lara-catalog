@extends('admin.layouts.page')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a> </li>
    <li class="breadcrumb-item active">Edit category</li>
</ol>
<div class="row">
    <div class="col-lg-12 my-3">
        <div class="pull-left">
            <h2>Edit: {{$category->name}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
        </div>
    </div>
</div>
@include('admin.partials.errors')

<form action="{{ route('categories.update',$category->id) }}" method="POST">
 @csrf
 @method('PUT')

 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
          <strong>Description:</strong>
          <textarea class="form-control" rows="4" name="detail" placeholder="Detail">{{ $category->description }}</textarea>
      </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
      <strong>Status:</strong>
      <div class="form-check checkbox-slider--a checkbox-slider-md  checkbox-slider-info ">
        <label>
          <input class="form-check-input" name="status" type="checkbox" value='1' 
          {{$category->status?'checked':''}}>
          <span></span>
        </label>
      </div> 
    </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</form>

@endsection