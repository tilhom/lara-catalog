@extends('admin.layouts.page')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
  <div class="col-12">
    <h1>Blank</h1>
    <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
    <div class="form-check checkbox-slider--default checkbox-slider-lg ">
      <label>
        <input type="checkbox" checked><span></span>
      </label>
    </div>
    <form>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
          <option value="">Please choose category..</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">
            {{$category->name}}
          </option>
          @endforeach
        </select>
      </div>
      <button type="submit"> Ok </button>
    </form>
  </div>
</div>
@endsection
