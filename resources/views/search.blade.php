@extends('layouts.main')        
@section('content')
<h4 class="mt-4">
   Result for "{{$query}}" of search:<br>
   <small>displayed {{count($result)}} of total {{$result->total()}} </small>
</h4>
<hr>

         @if(count($result))
         @foreach($result as $item)
         <p><a href="/animal/{{$item->slug}}">{{$item->name}}</a></p>
         <p>{{$item->description}}</p>
         <p>Price: <b>{{$item->price}}</b></p>
         <hr>
         @endforeach
         @else
         <p>No result!</p>
         @endif
         {{$result->links()}}
@endsection




