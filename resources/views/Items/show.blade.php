@include('templateMenu')
<div class="container content-container">
    @if( Auth::guest() or Auth::user()->role == 1 or Auth::user()->role == 3)

        @foreach($item->Items_languages as $lang)
            <div class="row">
                <div class="col-md-9">
                    <div>
                        <h1 class="text-center">{{$lang->pivot->title}}</h1>
                        <span class="pull-right description-color">{{$item->created_at->format('j F Y')}}
                            at {{$item->created_at->format('h : i')}}</span>
                    </div>
                    <br>
                    <br>
                    <img class="img-responsive img-center" title="{{$lang->pivot->image_title}}" alt="{{$lang->pivot->image_alt}}"  src="{{URL::to("/")}}/uploads/photos/{{$lang->pivot->image}}"
                         style="width: 100%; height: 350px;">
                    <br>
                    <?php echo htmlspecialchars_decode(htmlspecialchars_decode($lang->pivot->content));?>
                </div>
                <div class="col-md-3">
                    @if($topItems)
                        <div class="panel panel-default recent-post-panel">
                            <div class="panel-heading">Recent Posts</div>
                            <div class="panel-body">
                                <ul>
                                    @foreach($topItems as $topItem)
                                        @foreach($topItem->Items_languages as $toplang)
                                            @if($toplang->pivot->language_id == session("lang"))
                                            <li>
                                                <a href="{{url("/showItem/".$topItem->category->id."/".$topItem->id)}}">{{$toplang->pivot->name}}</a>
                                            </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">Similar Categories</div>
                        <div class="panel-body">
                            @if($category->parent_id)
                                <ul>
                                    @foreach($category->parent->children as $oneCategory)

											@if($oneCategory->menuItem)
												@if($oneCategory->menuItem->type=="category")
													<li><a href="{{url("/showCategory/".$oneCategory->id)}}">
															@foreach($oneCategory->Categories_languages as $catlang)
																@if($catlang->pivot->language_id == session("lang"))
																	{{ $catlang->pivot->name}}
																@endif
															@endforeach
														</a></li>
												@elseif($oneCategory->menuItem->type=="list of categories")
													<li><a href="{{url("/showCategoryList/".$oneCategory->id)}}">
															@foreach($oneCategory->Categories_languages as $catlang)
																@if($catlang->pivot->language_id == session("lang"))
																	{{ $catlang->pivot->name}}
																@endif
															@endforeach
														</a></li>
													@endIf
												@else
													<li><a href="{{url("/showCategory/".$oneCategory->id)}}">
															@foreach($oneCategory->Categories_languages as $catlang)
																@if($catlang->pivot->language_id == session("lang"))
																	{{ $catlang->pivot->name}}
																@endif
															@endforeach
														</a></li>
												@endif
												@endforeach
									</ul>
								@endif
							</div>
						</div>
					</div>
				</div>
			@endforeach
            <div class="form-body">
                <div class="form-group">
                    <hr>
                    <h3>Custom Fields:</h3><br>
                    @foreach($item->fieldValues as $fieldValue)
                        @if($fieldValue->field->category==null)
                        @endif
                        <label>{{$fieldValue->field->name}}:</label>
                        <label>{{$fieldValue->value}}</label><br>
                    @endforeach
                </div>
            </div>
		@elseif(Auth::user()->role == 2 )
				@foreach($item->Items_languages as $lang)
                    @if($lang->pivot->language_id == session("lang"))
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

                            <div class="form-body">
                                <div class="form-group">
                                    <label>Image Ttile</label>
                                    <input type="text" name="imageTitle" class="form-control" value="{{$lang->pivot->image_title}}"  >
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Image Alt</label>
                                    <input type="text" name="imageAlt" class="form-control" value="{{$lang->pivot->image_alt}}">
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
                                        @foreach($categories as $cate)
                                            @foreach($cate->Categories_languages as $cat_lang)
                                                @if($cat_lang->pivot->language_id == session("lang") and $cat_lang->pivot->categorie_id != $item->cat_id)
                                                    <option value="{{$cate->id}}">{{$cat_lang->pivot->name}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                </select>
                            </div>
                            <hr>
                            <iframe src="{{url("frameField/addItem/$item->id")}}" style="border: none;"></iframe>
                            <hr>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Page Content</label>
                                    <textarea name="content" id="editor1">{{$lang->pivot->content}}</textarea>
                                    <script>
                                        CKEDITOR.replace( 'editor1' );
                                    </script>
                                </div>
                            </div>
                            @foreach($item->Items_metas as $langMeta)
                                @if($langMeta->language_id == session("lang"))
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Meta Ttile</label>
                                            <input type="text" name="metaTitle" class="form-control" value="{{$langMeta->title}}" >
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Meta Content</label>
                                            <input type="text" name="metaContent" class="form-control" value="{{$langMeta->content}}" >
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Keywords</label>
                                            <input type="text" name="keywords" class="form-control" value="{{$langMeta->keywords}}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <p>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-circle btn-primary">Update</button>
                            </div>
                        </form>
                    @endif
				@endforeach
		@endif
	</div>
@include('layouts.partials.scripts')
