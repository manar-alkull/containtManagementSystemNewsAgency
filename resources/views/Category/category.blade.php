@extends('layouts.app')
@section('main-content')
	<h1 class="text-center">Category</h1>

	<div class="modal fade" id="addCategory" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ 'Add New Category'}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form action="addCategory" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									@foreach($languages as $language)
									<div class="form-body">
										<div class="form-group">
											<label>Name ({{$language->name}})</label>
											<input type="text" name={{"name_$language->name"}} class="form-control" required >
										</div>
									</div>

									<div class="form-body">
										<div class="form-group">
											<label>Description ({{$language->name}})</label>
											<input type="text" name={{"description_$language->name"}} class="form-control" >
										</div>
									</div>
										<div class="form-body">
											<div class="form-group">
												<label>Meta Ttile ({{$language->name}})</label>
												<input type="text" name={{"metaTitle_$language->name"}}  class="form-control" >
											</div>
										</div>

										<div class="form-body">
											<div class="form-group">
												<label>Meta Content ({{$language->name}})</label>
												<input type="text" name={{"metaContent_$language->name"}}  class="form-control" >
											</div>
										</div>
										<div class="form-body">
											<div class="form-group">
												<label>Keywords ({{$language->name}})</label>
												<input type="text" name={{"keywords_$language->name"}}  class="form-control" >
											</div>
										</div>
									@endforeach
									@if(Auth::user()->role == 2)
										<div class="form-group">
											<label>parent</label>
											<select class="form-control" name="parent_id" required>
												<option value="0">no parent</option>

												@foreach($categories as $category)
													@foreach($category->Categories_languages as $lang)
														@if($lang->pivot->language_id == session("lang"))
															<option value="{{$category->id}}">{{$lang->pivot->name}}</option>
														@endif
													@endforeach
												@endforeach
											</select>
										</div>
									@endif
									@if(Auth::user()->role == 2 or Auth::user()->role == 1)
										<div class="form-group">
											<label>Page Template</label>
											<select class="form-control" name="pageTemplate" required>
												@foreach($pageTemplates as $template)
													<option value="{{$template->id}}">{{$template->name}}</option>
												@endforeach
											</select>
										</div>
									@endif
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

	<div class="modal fade" id="deleteCategory" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Are you sure you want to delete this Category with children?</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form  id="deleteCategoryForm" method="get" enctype="multipart/form-data">
									{{csrf_token()}}
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
				<a href="#addCategory" data-toggle="modal" class="btn action-bar-btn btn-primary">New Category</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Category</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								<td>id</td>
								@foreach($languages as $language)
									<td>Name ({{$language->name}})</td>
								@endforeach
								<td>Parent</td>
								<td>Action</td>
							</thead>
							<tbody>
								@foreach($categories as $category)
									<tr>
										@if(Auth::user()->role == 2)
											{{--@if($category->menuItem->type == "category")--}}
												<td>{{$category->id}}</td>
   												@foreach($category->Categories_languages as $lang)
												<td>
													@if($category->menuItem)
														@if($category->menuItem->type == "category")
															<a href="{{url("/showCategory/".$category->id)}}">{{$lang->pivot->name}}</a>
														@elseif($category->menuItem->type == "item per page")
															<a href="{{url("/showItemPerPage/".$category->id)}}">{{$lang->pivot->name}}</a>
														@elseif($category->menuItem->type == "form per page")
															<a href="{{url("/showFormPerPage/".$category->id)}}">{{$lang->pivot->name}}</a>
														@elseif($category->menuItem->type == "list of categories")
															<a href="{{url("/showCategoryList/".$category->id)}}">{{$lang->pivot->name}}</a>
														@endif
													@else
														<a href="{{url("/showCategory/".$category->id)}}">{{$lang->pivot->name}}</a>
													@endif
												</td>
											  	@endforeach
												<td>
														@if($category->parent_id)
															@foreach($category->parent->Categories_languages as $lan_cat)
																@if($lan_cat->pivot->language_id == session("lang"))
																	{{$lan_cat->pivot->name}}
																@endif
															@endforeach
														@endif
												</td>
												<td>
													@if($category->menuItem)
														@if($category->menuItem->parent_id)
															@if($category->menuItem->parent->type != "navbar" and $category->menuItem->parent->type != "footer" and $category->menuItem->parent->type != "aside")
																<a href="{{url("/updateCategory/".$category->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
																<a href="#deleteCategory" onclick="deleteCategoryAction('{{url("/deleteCategory/".$category->id)}}')" data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
															@endif
														@endif
													@else
														<a href="{{url("/updateCategory/".$category->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
														<a href="#deleteCategory" onclick="deleteCategoryAction('{{url("/deleteCategory/".$category->id)}}')" data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
													@endif
												</td>
										@else
											<td>{{$category->id}}</td>
											@foreach($category->Categories_languages as $lang)
											<td>
												{{$lang->pivot->name}}
											</td>
											@endforeach
											<td>
												@if($category->parent_id)
												@foreach($category->parent->Categories_languages as $lang)
<!--														--><?php //var_dump($lang->pivot->name); die(); ?>
													@if($lang->pivot->language_id == session("lang"))
															{{$lang->pivot->name}}
														@endif
													@endforeach
												@endif
											</td>
											<td>
												@if($category->menuItem)
													@if($category->menuItem->parent_id)
														@if($category->menuItem->parent->type == "navbar" or $category->menuItem->parent->type == "footer" or $category->menuItem->parent->type == "aside")
															<a href="{{url("/updateCategory/".$category->id)}}"><i  class="fa fa-2x fa-edit" ></i></a>
															<a href="#deleteCategory" onclick="deleteCategoryAction('{{url("/deleteCategory/".$category->id)}}')" data-toggle="modal"><i class="fa fa-2x fa-close" ></i></a>
														@endif
													@endif
												@endif
											</td>
										@endif
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
