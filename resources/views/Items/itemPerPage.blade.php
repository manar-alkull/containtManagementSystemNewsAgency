@include('templateMenu')
	@if( (Auth::guest() or Auth::user()->role == 1 or Auth::user()->role == 3) and $item)
		<div class="container content-container">
			@foreach($item->Items_languages as $lang)
			  @if($lang->pivot->language_id == session("lang"))
				<div class="row">
					<div class="col-md-12">
						<div>
							<h1 class="text-center">{{$lang->pivot->title}}</h1>
							<span class="pull-right description-color">{{$item->created_at->format('j F Y')}} at {{$item->created_at->format('h : i')}}</span>
						</div>
						<br>
						<br>
						<img class="img-responsive img-center" title="{{$lang->pivot->image_title}}" alt="{{$lang->pivot->image_alt}}" src="{{URL::to("/")}}/uploads/photos/{{$lang->pivot->image}}" style="width: 100%; height: 350px;">
						<br>
						<?php echo htmlspecialchars_decode(htmlspecialchars_decode($lang->pivot->content));?>
					</div>
				</div>
					@endif
			@endforeach
		@elseif( Auth::user()->role == 2)
					<div class="container">
						@if($item)
						@foreach($languages as $language)
							@if($language->id == session("lang"))
							@foreach($item->Items_languages as $lang)
								<form action="{{url("/updateItem/".$item->id)}}" method="post">
									{{csrf_field()}}
									<div class="form-body">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" value="{{$lang->pivot->name}}" required >
										</div>
									</div>
									<div class="form-body">
										<div class="form-group">
											<label>Title</label>
											<input type="text" name="title" class="form-control" value="{{$lang->pivot->title}}" required >
										</div>
									</div>
									<div class="form-body">
										<div class="form-group">
											<label>Description</label>
											<input type="text" name="description" class="form-control" value="{{$lang->pivot->description}}">
										</div>
									</div>
									<div class="form-group" id="category_container">
										<label>Category</label>
										<select class="form-control" name="cat_id">
											@foreach($item->category->Categories_languages as $c)
												@if($c->pivot->language_id == session("lang"))
													<option value="{{$item->cat_id}}">{{$c->pivot->name}}</option>
												@endif
											@endforeach

												@foreach($categorie->Categories_languages as $cat_lang)
													@if($cat_lang->pivot->language_id == session("lang") and $cat_lang->pivot->categorie_id != $item->cat_id)
														<option value="{{$categorie->id}}">{{$cat_lang->pivot->name}}</option>
													@endif
												@endforeach
										</select>
									</div>
									<div class="form-body">
										<div class="form-group">
											<label>Page Content</label>
											<textarea  name={{"pageContent_$language->name"}} id="editor{{$language->id}}">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
											<script>
                                                CKEDITOR.replace( 'editor{{$language->id}}' );
											</script>
										</div>
									</div>
									<p>
									<div class="form-actions">
										<button type="submit" class="btn btn-circle btn-primary">Update</button>
									</div>
								</form>
							@endforeach
							@endif
						@endforeach
						@else
							<div id='jqxWidget'>
								<div id='jqxTabs'>
									<ul>
										@foreach($languages as $language)
											<li style="margin-left: 5px;">{{$language->name}}</li>
											{{--<li style="margin-left: 5px;">en</li>--}}
										@endforeach
									</ul>
									@foreach($languages as $language)
									<!--                                            --><?php //var_dump($language);die(); ?>
										<div>
											<div id="main_container">
												<div class="container">
													<form action="{{url("/addItem/".$categorie->id)}}" method="post" enctype="multipart/form-data">
														{{csrf_field()}}

															<div class="form-body">
																<div class="form-group">
																	<label>Name ({{$language->name}})</label>
																	<input type="text" name={{"name_$language->name"}}  class="form-control" required >
																</div>
															</div>
															<div class="form-body">
																<div class="form-group">
																	<label>Title ({{$language->name}})</label>
																	<input type="text" name={{"title_$language->name"}}  class="form-control" required >
																</div>
															</div>
															<div class="form-body">
																<div class="form-group">
																	<label>Description ({{$language->name}})</label>
																	<input type="text" name={{"description_$language->name"}}  class="form-control">
																</div>
															</div>
															<div class="form-body">
																<div class="form-group">
																	<label>Image</label>
																	<input type="file" id="itemImage" name={{"itemImage_$language->name"}}   class="form-control" required >
																</div>
															</div>
													<div class="form-body">
														<div class="form-group">
															<label>Image Alt ({{$language->name}})</label>
															<input type="text" name={{"imageAlt_$language->name"}}  class="form-control" >
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
													<div class="form-body">
														<div class="form-group">
															<label>Page Content</label>
															<textarea  name={{"pageContent_$language->name"}} id="editor{{$language->id}}">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
															<script>
                                                                CKEDITOR.replace( 'editor{{$language->id}}' );
															</script>
														</div>
													</div>
															<p>
															<div class="form-actions">
																<button type="submit" class="btn btn-circle btn-primary">Add</button>
															</div>

												</form>

												</div>
											</div>
										</div>
										@endforeach
								</div>
							</div>
							@endif
					</div>
			@endif
			</div>

        </div>
		<script>
            // Create jqxTabs.
            $('#jqxTabs').jqxTabs({ width: '100%', position: 'top'});
		</script>
@include('layouts.partials.scripts')
