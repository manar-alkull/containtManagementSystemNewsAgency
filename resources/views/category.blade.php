@include('templateMenu')



<div class="container">
    <div class="row">
        @foreach($categorie->Categories_languages as $catLang)
            @if(session("lang")== $catLang->pivot->language_id)
                <h1>{{$catLang->pivot->name}}</h1>
            @endif
        @endforeach
        <div class="col-md-9">
            <div class="container-fluid">
                @if(!Auth::guest())
                    @if( Auth::user()->role == 2)
                        <br>
                        <br>
                        <a class="btn btn-primary" href="{{url("/item/".$categorie->id)}}">New Item</a>
                        <a class="btn btn-primary" href="{{url("fieldCat/$categorie->id")}}">New custom field</a>
                    @endif
                @endif
                <div class="row">
                    @foreach($categorie->items as $item)
                        @foreach($item->Items_languages as $lang)
                            @if($lang->id==session("lang"))
                                <div class="col-md-4">
                                    <div class="item-container">
                                        @if(!Auth::guest())
                                            @if(Auth::user()->role == 2)
                                                <div style="float:right;">
                                                    <a calss="right" href="#deleteItem"
                                                       onclick="deleteItemAction('{{url("/deleteItem/".$item->id)}}')"
                                                       data-toggle="modal"><i class="fa fa fa-close text-red"></i></a>
                                                </div>
                                            @endif
                                        @endif
                                        <a href="{{url("/showItem/".$categorie->id."/".$item->id)}}">
                                            <img class="img-responsive img-center"
                                                 src="{{URL::to("/")}}/uploads/photos/{{$lang->pivot->image}}"
                                                 style="width: 100%; height: 150px;">
                                            {{--<a href="{{url("fieldItem/$item->id")}}"><p>add custom field</p></a>--}}
                                            <p class="lead h2 title-color">{{str_limit($lang->pivot->title,18,"...")}}</p>
                                            <p class="description description-color">{{str_limit($lang->pivot->description,35,"...")}}</p>
                                        </a>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @if($topItems)
                <div class="panel panel-default recent-post-panel">
                    <div class="panel-heading">Recent Posts</div>
                    <div class="panel-body">
                        <ul>
                            @foreach($topItems as $item)
                                @foreach($item->Items_languages as $lang)
                                    @if($lang->id==session("lang"))
                                        <li>
                                            <a href="{{url("/showItem/".$item->category->id."/".$item->id)}}">{{$lang->pivot->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if($categorie->parent_id)
                <div class="panel panel-default">
                    <div class="panel-heading">Similar Categories</div>
                    <div class="panel-body">
                        <ul>
                            @foreach($categorie->parent->children as $oneCategory)
                                @if($oneCategory->menuItem)
                                    @if($oneCategory->menuItem->type=="category")

                                        @foreach($oneCategory->Categories_languages as $catLang)
                                            @if($catLang->pivot->language_id == session("lang"))
                                                <li>
                                                    <a href="{{url("/showCategory/".$oneCategory->id)}}">{{$catLang->pivot->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @elseif($oneCategory->menuItem->type=="list of categories")
                                        @foreach($oneCategory->Categories_languages as $catLang)
                                            @if($catLang->pivot->language_id == session("lang"))
                                                <li>
                                                    <a href="{{url("/showCategoryList/".$oneCategory->id)}}">{{$catLang->pivot->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endIf
                                @else
                                    @foreach($oneCategory->Categories_languages as $catLang)
                                        @if($catLang->pivot->language_id == session("lang"))
                                            <li>
                                                <a href="{{url("/showCategory/".$oneCategory->id)}}">{{$catLang->pivot->name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">custom fields:</div>
                <div class="panel-body">
                    <ul>
                        @if($categorie->fields)
                            @foreach($categorie->fields as $field)
                                @foreach($field->Customs_languages as $field_lang)
                                    @if($field_lang->pivot->language_id==session("lang"))
                                    <li>
                                        @if(Auth::user()->role==2)
                                        <div style="float:right;">
                                            <a calss="right" href="{{url("fieldCat/delete/$field->id")}}"><i class="fa fa fa-close text-red" ></i></a>
                                        </div>
                                        <a href="{{url("fieldCat/showUpdate/$field->id")}}">{{$field_lang->pivot->name}}</a>
                                        @else
                                            <a href="{{url("fieldCat/show/$field->id")}}">{{$field_lang->pivot->name}}</a>
                                            @endif
                                    </li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteItem" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure you want to delete this items?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet-body">
                            <form id="deleteItemForm" method="get" enctype="multipart/form-data">
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

@include('layouts.partials.scripts')