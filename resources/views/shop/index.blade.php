@extends('layouts.main')        
@section('content')
          @include('layouts.partials.carousel')

          <div class="row">
          @if(count($animals))
			@foreach($animals as $animal)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="/item"><img class="card-img-top" src="/img/{{$animal->image}}" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="/item">{{$animal->name}}</a>
                  </h4>
                  <h5>$ {{$animal->formattedprice}}</h5>
                  <p class="card-text">{{$animal->excerpt}}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
			@endforeach
		  @else
		  <h3>No animals in shop..</h3>
		  @endif
          </div>
          <!-- /.row -->
@endsection




