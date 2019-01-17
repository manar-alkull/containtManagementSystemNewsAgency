@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Update Menu</h1>
	<div class="container-fluid spark-screen">
		<form action="{{url("/saveMenu/".$menu->id)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
				@foreach($menu->Menus_languages as $lang)
					<div class="form-group">
							<div class="form-body">
									<label>Name ({{$lang->name}})</label>
									<input type="text" name="name_{{$lang->name}}" value="{{$lang->pivot->name}}"  class="form-control" required >
							</div>
					</div>
					@endforeach

			<div class="form-group">
				<label>parent</label>
				<select class="form-control" name="parent_id" onchange="changeMenuType(this)" required>
					<option value="0">no parent</option>
					@foreach($menus as $menu)
						@foreach($menu->Menus_languages as $lang)
							@if($lang->pivot->language_id == session("lang"))
								<option value="{{$menu->id}}">{{$lang->pivot->name}}</option>
							@endif
						@endforeach
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>type</label>
				<select id="menu_type" class="form-control" name="type" onchange="changeMenuType(this)" required>
					<option value="category">category</option>
					<option value="list of categories">list of categories</option>
					<option value="item per page">item per page</option>
					<option value="navbar">navbar</option>
					<option value="footer">footer</option>
					<option value="aside">aside</option>
				</select>
			</div>

			<div class="form-group" id="category_container">
				<label>Category</label>
				<select class="form-control" name="cat_id">
					@foreach($categories as $category)
						{{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
						@foreach($category->Categories_languages as $cat_lang)
							@if($cat_lang->pivot->language_id == session("lang"))
								<option value="{{$category->id}}">{{$cat_lang->pivot->name}}</option>
							@endif
						@endforeach
					@endforeach
				</select>
			</div>
			<div id="menu_pos" class="form-group"  @if($menu->parent!="navbar") style="display: none !important;" @endif>
				<label>Position</label>
				<select class="form-control" name="position">
					<option value="1">fixed top</option>
					<option value="2">fixed bootom</option>
				</select>
			</div>
			<div class="form-group">
				<label>priority</label>
				<input type="number" name="priority" class="form-control">
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-circle blue">update</button>
			</div>
		</form>
	</div>
@endsection
