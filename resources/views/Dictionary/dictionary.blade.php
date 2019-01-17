@extends('layouts.app')
@section('main-content')

	<div class="modal fade" id="updateDictionary" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ 'Update Dictionary'}}</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet-body">
								<form id="updateDictionaryForm"  method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-body">
										@foreach($dictionarys as $dic)
												@foreach($languages as $language)
												<?php $col=$language->name  ?>
													<div class="form-group">
														<label>{{$language->name}}</label>
														<input type="text" name="name_{{$dic->id}}" value="{{ $dic->$col}}" class="form-control" required >
													</div>
												@endforeach
										@endforeach
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-circle btn-primary">Update</button>
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
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dictionary</div>
					<div class="panel-body">
						<table class="dataTable table-bordered">
							<thead>
								@foreach($languages as $language)
									<td>{{$language->name}}</td>
								@endforeach
								<td>Action</td>
							</thead>
							<tbody>
							@foreach($dictionarys as $dictionary)
									<tr>
										@foreach($languages as $language)
											<?php $col=$language->name  ?>
											<td>{{ $dictionary->$col}}</td>
										@endforeach
										<td><a href="{{url("/updateDictionary/".$dictionary->id)}}"><i  class="fa fa-2x fa-edit" ></i></a></td>
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
