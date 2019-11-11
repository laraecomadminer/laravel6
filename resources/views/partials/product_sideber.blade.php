<div class="list-group">
@foreach(App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

	<a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">
	{{$parent->name}}
	<img src="{{asset('images/categories/'. $parent->image)}}" width="50">
	</a>
	
<div class="collapse
	@if(Route::is('categories.show'))
		@if(App\Category::ParentOrNotCategory($parent->id, $category->id))
			show
		@endif
	@endif

" id="main-{{$parent->id}}">
<div class="child-rows">
 @foreach(App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
	<a href="{{route('categories.show', $child->id)}}" class="list-group-item list-group-item-action 
	@if(Route::is('categories.show'))
		@if($child->id ==$category->id)
			active
		@endif
	@endif
	">
	{{$child->name}}
	<img src="{{asset('images/categories/'. $child->image)}}" width="20">
	</a>

 @endforeach
</div>
</div>
@endforeach
</div>