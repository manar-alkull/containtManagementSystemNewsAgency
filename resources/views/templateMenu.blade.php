@if(!empty($categorie))
	@include($categorie->pagetemplate->name.'.htmlheader')
@elseif(!empty($parent))
	@include($parent->pagetemplate->name.'.htmlheader')
@elseif(!empty($category))
	@include($category->pagetemplate->name.'.htmlheader')
@elseif(!empty($item))
	@include($item->category->pagetemplate->name.'.htmlheader')
@else
	@include('layouts.partials.htmlheader')
@endif
@foreach($menus as $menu)
	@if($menu->type=="navbar")
 		<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{url('/showCategory/1')}}">Brand</a>

					</div>
				@if(!$menu->parent_id)
					<!-- Collect the nav links, forms, and other content for toggling -->

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
						@foreach($menu->children->sortBy("priority") as $children)
							@foreach($children->Menus_languages as $langChild)
								@if($langChild->pivot->language_id == session("lang"))
									@if($children->type =="list of categories")
											<li class="dropdown">
												<a href="{{url('/showCategoryList/'.$children->cat_id)}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$langChild->pivot->name}}<span class="caret"></span></a>
												<ul class="dropdown-menu">
												@foreach($children->children->sortBy("priority") as $grandson)
													@foreach($grandson->Menus_languages as $lang)
														@if($grandson->type=="list of categories" and !$grandson->position)
																	@if($lang->pivot->language_id == session("lang"))
																		<li class="dropdown dropdown-submenu"><a href="{{url('/showCategoryList/'.$grandson->cat_id)}}">{{$lang->pivot->name}}</a>
																		<ul class="dropdown-menu">
																			@foreach($grandson->category->children as $grandsonchild)
																				@foreach($grandsonchild->Categories_languages as $langGrand)
																						@if($langGrand->pivot->language_id == session("lang"))
<!--																							--><?php //var_dump($grandsonchild->cat_id);die();?>
																							<li><a href="{{url('/showCategory/'.$grandsonchild->id)}}">{{$langGrand->pivot->name}}</a></li>
																						 @endif
																				@endforeach
																			@endforeach
																		</ul>
																		</li>
																	@endif
															@elseif(!$grandson->position)
																<li class="dropdown user user-menu">
<!--                                                                    --><?php //var_dump($grandson->cat_id);die();?>
																	<a href="{{url('/showCategory/'.$grandson->cat_id)}}">
																		{{$lang->pivot->name}}
																	</a>
																</li>
															@endif
														@endforeach
													@endforeach
												</ul>
											</li>
											@elseif($children->type=="item per page" and !$children->position)
												<li class="dropdown user user-menu">
													<a href="{{url('/showItemPerPage/'.$children->cat_id)}}">
														{{$langChild->pivot->name}}
													</a>
												</li>
											@elseif($children->type=="form per page" and !$children->position)
												<li class="dropdown user user-menu">
													<a href="{{url('/showFormPerPage/'.$children->cat_id)}}">
														{{$langChild->pivot->name}}
													</a>
												</li>
											@elseif(!$children->position)
												<li class="dropdown user user-menu">
<!--													  --><?php //var_dump($children->cat_id);die(); ?>
													<a href="{{url('/showCategory/'.$children->cat_id)}}">
														{{$langChild->pivot->name}}
													</a>
												</li>
											@endif
									@endif
								@endforeach
							@endforeach
							<li class="dropdown tasks-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-language"></i>
								</a>
								<ul class="dropdown-menu">
									<li class="header">choice language </li>
									<li>
										<!-- Inner menu: contains the tasks -->
										<ul class="menu">
										@foreach($languages as $lang)
											<!--                                                 --><?php //var_dump(); die(); ?>
												<li>
													<a href="{{url("/changeLanguageSession/".$lang->id)}}">{{$lang->name}}</a>
												</li>
												@endforeach

										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			@endif
		</nav>

	@elseif($menu->type=="footer")
		<footer id="menuFooter">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<ul>
							@foreach($menu->children as $children)
								@foreach($children->Menus_languages as $langChild)
									@if($langChild->pivot->language_id == session("lang"))
										@if($children->type=="category")
<!--							               --><?php //var_dump($children->cat_id); die()?>
											<a href="{{url('/showCategory/'.$children->cat_id)}}">{{$langChild->pivot->name}}</a>
										@elseif($children->type=="list of categories")
											<a href="{{url('/showCategoryList/'.$children->cat_id)}}">{{$langChild->pivot->name}}</a>
										@endif
									@endif
								@endforeach
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</footer>
	@endif
@endforeach