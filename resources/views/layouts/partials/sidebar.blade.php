          <h1 class="my-4">Pet-Shop</h1>
          @if(count($categories))
          <div class="list-group">
		  	@foreach($categories as $category)
          	<a href="#" class="list-group-item">{{$category->name}}</a>
			@endforeach
          </div>
          @endif