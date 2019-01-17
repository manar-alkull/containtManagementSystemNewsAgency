@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Update Language</h1>
	<div class="container-fluid spark-screen">
		<form action="{{url("/saveLanguage/".$language->id)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-body">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" value="{{$language->name}}" class="form-control" required >
				</div>
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-circle blue">update</button>
			</div>
		</form>
	</div>
@endsection
