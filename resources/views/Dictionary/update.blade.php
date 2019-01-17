@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Update Dictionary</h1>
	<div class="container-fluid spark-screen">
		<form action="{{url("/saveDictionary/".$dictionary->id)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-body">
				@foreach($languages as $language)
					<div class="form-group">
						<?php $col=$language->name  ?>
						<label>{{$language->name}}</label>
						<input type="text" name="{{$language->name}}" value="{{$dictionary->$col}}" class="form-control" required >
					</div>
				@endforeach
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-circle blue">update</button>
			</div>
		</form>
	</div>
@endsection
