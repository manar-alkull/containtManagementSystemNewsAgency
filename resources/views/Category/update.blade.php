@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Update Menu</h1>
	<div class="container-fluid spark-screen">
		<form action="{{url("/saveCategory/".$category->id)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			@foreach($category->Categories_languages as $lang)
			<div class="form-body">
				<div class="form-group">
					<label>Name ({{$lang->name}})</label>
					<input type="text" name="name_{{$lang->name}}" value="{{$lang->pivot->name}}" class="form-control" required >
				</div>
			</div>
			@endforeach
			@if(Auth::user()->role==2)
				<div class="form-group">
					<label>parent</label>
					<select class="form-control" name="parent_id" required>
						<option value="0">no parent</option>
						@foreach($categories as $singleCategory)
							@foreach($singleCategory->Categories_languages as $lang)
								@if($lang->pivot->language_id == session("lang"))
									<option value="{{$singleCategory->id}}" @if($lang->parent_id==$singleCategory->id) selected @endIf >{{$lang->pivot->name}}</option>
								@endif
							@endforeach
						@endforeach
					</select>
				</div>
			@endif
			@foreach($category->Categories_languages as $lang)
			<div class="form-body">
				<div class="form-group">
					<label>Description ({{$lang->name}})</label>
					<input type="text" name="description_{{$lang->name}}" class="form-control" value="{{$lang->pivot->description}}">
				</div>
			</div>
			@endforeach

			@foreach($category->Categories_metas as $langMeta)
				@if($langMeta->language_id == session("lang"))
					<div class="form-body">
						<div class="form-group">
							<label>Meta Ttile</label>
							<input type="text" name="metaTitle" class="form-control" value="{{$langMeta->title}}" >
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label>Meta Content</label>
							<input type="text" name="metaContent" class="form-control" value="{{$langMeta->content}}" >
						</div>
					</div>
					<div class="form-body">
						<div class="form-group">
							<label>Keywords</label>
							<input type="text" name="keywords" class="form-control" value="{{$langMeta->keywords}}">
						</div>
					</div>
				@endif
			@endforeach

			<div class="form-actions">
				<button type="submit" class="btn btn-circle btn-primary">update</button>
			</div>
		</form>
	</div>
@endsection
