@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Menu</h1>

	<div class="modal fade" id="addMenu" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ 'Add New Menu'}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form action="{{url("/addMenu")}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									@foreach($languages as $language)
									<div class="form-body">
										<div class="form-group">
											<label>Name ({{$language->name}})</label>
											<input type="text" name={{"name_$language->name"}} class="form-control" required >
										</div>
									</div>
									@endforeach
									<div class="form-group">
										<label>parent</label>
										<select class="form-control" name="parent_id" onchange="changeMenuParent(this)" required>
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
										<select id="menu_type" class="form-control" name="type"  onchange="changeMenuType(this)" required>
											<option value="category">category</option>
											<option value="list of categories">list of categories</option>
											<option value="item per page">item per page</option>
											<option value="form per page">form per page</option>
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
									<div class="form-group">
										<label>priority</label>
										<input type="number" name="priority" class="form-control">
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
	<div class="modal fade" id="deleteMenu" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure you want to delete this Menu with children ?</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form  id="deleteMenuForm" method="get" enctype="multipart/form-data">
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
				<a href="#addMenu" data-toggle="modal" class="btn action-bar-btn btn-primary">New Menu</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Menu</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								<th>id
								@foreach($languages as $language)
								<th>Name ({{$language->name}})</th>
								@endforeach
								<th>Parent</th>
								<th>Type</th>
								<th>Category</th>
								<th>Priority</th>
								<th>Action</th>
							</thead>
							<tbody>

								@foreach($menus as $menu)
									<tr>
										<td>{{$menu->id}}</td>

										@foreach($menu->Menus_languages as $menus_language)
											<td>{{$menus_language->pivot->name}}</td>
										@endforeach
										<td>

											@if($menu->parent_id)
												@foreach($menu->parent->Menus_languages as $lan_men)
													@if($lan_men->pivot->language_id == session("lang"))
														{{$lan_men->pivot->name}}
													@endif
												@endforeach
											@endif
										</td>
										<td>{{$menu->type}}</td>
										<td>
											@if ($menu->cat_id)
												@foreach($menu->category->Categories_languages as $lan_cat)
													@if($lan_cat->pivot->language_id == session("lang"))
														{{$lan_cat->pivot->name}}
													@endif
												@endforeach
											@endif
										</td>
										<td>{{$menu->priority}}</td>
										<td>
											<a href="{{url("/updateMenu/".$menu->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
											<a href="#deleteMenu" onclick="deleteMenuAction('{{url("/deleteMenu/".$menu->id)}}') " data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
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
