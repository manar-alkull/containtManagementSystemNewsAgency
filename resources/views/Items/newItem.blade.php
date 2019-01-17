@include('templateMenu')

	@if( Auth::user()->role == 2)

		<div id='jqxWidget'>
			<div id='jqxTabs'>
				<ul>
					@foreach($languages as $language)
					<li style="margin-left: 5px;">{{$language->name}}</li>
					{{--<li style="margin-left: 5px;">en</li>--}}
					@endforeach
				</ul>
					@foreach($languages as $language)
					<div>
						<div id="main_container">
							<div class="container">
								{{--{!! Form::open(['url' => 'foo/bar']) !!}--}}

								{{--{!! Form::close() !!}--}}
					{{--			{!! Form (['url'=>'/addItem','files'=>true])!!}--}}
								<form action="{{url("/addItem/".$category->id)}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									{{--@foreach($languages as $language)--}}
										<?php //var_dump(session("lang"));die();?>
										@if ($language->id== session("lang"))
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
											<label>Image Ttile ({{$language->name}})</label>
											<input type="text" name={{"imageTitle_$language->name"}}  class="form-control" >
										</div>
									</div>

									<div class="form-body">
										<div class="form-group">
											<label>Image Alt ({{$language->name}})</label>
											<input type="text" name={{"imageAlt_$language->name"}}  class="form-control" >
										</div>
									</div>
											{{--<div class="form-group" id="category_container">
										<label>Category</label>
										<select class="form-control" name="cat_id">
											@foreach($categories as $cate)
											@foreach($cate->Categories_languages as $cat_lang)
											@if($cat_lang->pivot->language_id == session("lang"))
											<option value="{{$cate->id}}">{{$cat_lang->pivot->name}}</option>
											@endif
											@endforeach
											@endforeach
										</select>
									</div>--}}
									<div class="form-body">
										<div class="form-group">
											<label>Page Content</label>
											<textarea  name={{"pageContent_$language->name"}} id="editor{{$language->id}}">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
											<script>
												CKEDITOR.replace( 'editor{{$language->id}}' );
											</script>
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
									<p>
									<div class="form-actions">
										<button type="submit" class="btn btn-circle btn-primary">Add</button>
									</div>
                                    @else
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
											<label>Image Ttile ({{$language->name}})</label>
											<input type="text" name={{"imageTitle_$language->name"}}  class="form-control" >
										</div>
									</div>

									<div class="form-body">
										<div class="form-group">
											<label>Image Alt ({{$language->name}})</label>
											<input type="text" name={{"imageAlt_$language->name"}}  class="form-control" >
										</div>
									</div>
                                    <div class="form-group" id="category_container">
                                        <label>Category</label>
                                        <select class="form-control" name="cat_id">
                                            @foreach($categories as $cate)
                                            @foreach($cate->Categories_languages as $cat_lang)
                                            @if($cat_lang->pivot->language_id == $language->id)
                                            <option value="{{$cate->id}}">{{$cat_lang->pivot->name}}</option>
                                            @endif
                                            @endforeach
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


                                    @foreach($category->fields as $field)
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>{{$field->name}}</label>
                                            <input type="text" name="custom_{{$field->name}}" class="form-control">
                                        </div>
                                    </div>
                                    @endforeach

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
									<p>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-circle btn-primary">Add</button>
                                    </div>
                                    @endif
											{{--@endforeach--}}
								</form>
					{{--			{!! Form::close() !!}--}}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<script>
            // Create jqxTabs.
            $('#jqxTabs').jqxTabs({ width: '100%', position: 'top'});
		</script>
	@endif
@include('layouts.partials.scripts')
