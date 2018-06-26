          <h1 class="my-4">Pet-Shop</h1>
          @if(count($categories))
          <div class="list-group">
		  	@foreach($categories as $category)
  			<a href="/{{App::getLocale()}}/{{$category->slug}}" 
  			class="list-group-item {{(request('cslug')==$category->slug)?'active':''}}" >
          		{{$category->name}}
          	</a>
			@endforeach
          </div>
          @endif