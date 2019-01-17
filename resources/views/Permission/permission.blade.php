@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Permission</h1>

	<div class="modal fade" id="addPermission" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ 'Add New Permission'}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form action="addPermission" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group">
										<label></label>
										<select class="form-control" name="role_id" required>
											@foreach($roles as $role)
												<option value="{{$role->id}}">{{$role->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label>Permission</label>
										<select class="form-control" name="permission_id" required>
											@foreach($permissions as $permission)
												<option value="{{$permission->id}}">{{$permission->name}}</option>
											@endforeach
										</select>
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

	<div class="modal fade" id="deletePermission" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure you want to delete this Permission?</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form  id="deletePermissionForm" method="get" enctype="multipart/form-data">
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
				<a href="#addPermission" data-toggle="modal" class="btn action-bar-btn btn-primary">New Permission</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Permission</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								<td>Role</td>
								<td>Permission</td>
								<td>Action</td>
							</thead>
							<tbody>
								@foreach($roles as $role)
									@foreach($role->permissions as $permission)
										<tr>
											<td>{{$role->name}}</td>
											<td>{{$permission->name}}</td>
											<td>
												<a href="{{url("/updatePermission/".$role->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
												<a href="#deletePermission" onclick="deletePermissionAction('{{url("/deletePermission/".$role->id."/".$permission->id)}}')" data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
											</td>
										</tr>
									@endforeach
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
