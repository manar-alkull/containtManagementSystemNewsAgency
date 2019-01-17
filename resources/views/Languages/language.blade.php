@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Language</h1>
	<div class="modal fade" id="addLanguage" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ 'Add New Language'}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form action="{{url("/addLanguage")}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-body">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" required >
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-circle btn-primary">Add</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="deleteLanguage" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure you want to delete this Language with children ?</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form  id="deleteLanguageForm" method="get" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-actions">
										<button type="submit" class="btn btn-circle btn-danger">Delete</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<a href="#addLanguage" data-toggle="modal" class="btn action-bar-btn btn-primary">New Language</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Language</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								<td>id</td>
								<td>Name</td>
							    <td>Action</td>
							</thead>
							<tbody>
								@foreach($languages as $language)
									<tr>
										<td>{{$language->id}}</td>
										<td>{{$language->name}}</td>
										<td>
											<a href="{{url("/updateLanguage/".$language->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
											<a href="#deleteLanguage" onclick="deleteLanguageAction('{{url("/deleteLanguage/".$language->id)}}') " data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
