@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Users</h1>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Users</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								<td>id</td>
								<td>Username</td>
								<td>email</td>
								<td>Role</td>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>
											<form id="roleForm" method="POST">
												<input id="RoleToken"  type="hidden" name="_token" value="{{csrf_token()}}">
												<select onchange="changeUserRole(this,'{{url('/changeUserRole/'.$user->id)}}')">
													<option value="1" @if( $user->role == 1) {{"selected"}} @endif>Admin</option>
													<option value="2" @if( $user->role == 2) {{"selected"}} @endif>Data Entry</option>
													<option value="3" @if( $user->role == 3) {{"selected"}} @endif>User</option>
												</select>
											</form>
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
