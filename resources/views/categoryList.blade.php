@include('templateMenu')
<div class="category-list-container">
    <div class="container category-parent-container">
        <header>
            @foreach($parent->Categories_languages as $catLang)
                @if($catLang->pivot->language_id ==session("lang"))
                    <a class="h1 text-uppercase" href="{{url('/showCategoryList/'.$parent->id)}}">{{$catLang->pivot->name}}</a>
                @endif
            @endforeach
        </header>
    </div>
    <hr>
    <div class="container category-children-container">
        <nav class="category-children-nav">
            <ul class="list-group list-unstyled list-inline">
                @foreach($parent->children as $category )
                    @foreach($category->Categories_languages as $catLang)
                        @if($catLang->pivot->language_id ==session("lang"))
                                @if($category->menuItem)
                                    @if($category->menuItem->type=="list of categories")
                                    <li class="category-children-item"><a class="text-capitalize" href="{{url('/showCategoryList/'.$category->id)}}">{{$catLang->pivot->name}}</a></li>
                                    @elseif($category->menuItem->type=="category")
                                        <li class="category-children-item"><a class="text-capitalize" href="{{url('/showCategory/'.$category->id)}}">{{$catLang->pivot->name}}</a></li>
                                    @endif
                                @else
                                    <li class="category-children-item"><a class="text-capitalize" href="{{url('/showCategory/'.$category->id)}}">{{$catLang->pivot->name}}</a></li>
                                @endif
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </nav>
    </div>
</div>
<div class="container">
    @foreach($parent->children as $category )
        @if($category->menuItem)
            @if($category->menuItem->type=="category")
                <div class="row">
                    @foreach($category->items as $item)
                        @foreach($item->Items_languages as $lang)
                            @if($lang->id==session("lang"))
                                <div class="col-md-3">
                                    <div class="item-container">
                                        <div style="float:right;">
                                            <a calss="right" href="#deleteItem" onclick="deleteItemAction('{{url("/deleteItem/".$item->id)}}')" data-toggle="modal"><i class="fa fa fa-close text-red" ></i></a>
                                        </div>
                                        <a href="{{url("/showItem/".$category->id."/".$item->id)}}">
                                            <img class="img-responsive img-center" src="{{URL::to("/")}}/uploads/photos/{{$lang->pivot->image}}" style="width: 100%; height: 150px;">
                                            <p class="lead h2 title-color">{{str_limit($lang->pivot->title,18,"...")}}</p>
                                            <p class="description description-color">{{str_limit($lang->pivot->description,35,"...")}}</p>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @elseif($category->menuItem->type=="list of categories")
                <div class="row">
                    @foreach($category->children as $subCategory)
                        @foreach($subCategory->items as $item)
                            @foreach($item->Items_languages as $lang)
                                @if($lang->id==session("lang"))
                                    <div class="col-md-3">
                                        <div class="item-container">
                                            <div style="float:right;">
                                                <a calss="right" href="#deleteItem" onclick="deleteItemAction('{{url("/deleteItem/".$item->id)}}')" data-toggle="modal"><i class="fa fa fa-close text-red" ></i></a>
                                            </div>
                                            <a href="{{url("/showItem/".$subCategory->id."/".$item->id)}}">
                                                <img class="img-responsive img-center" src="{{URL::to("/")}}/uploads/photos/{{$lang->pivot->image}}" style="width: 100%; height: 150px;">
                                                <p class="lead h2 title-color">{{str_limit($lang->pivot->title,18,"...")}}</p>
                                                <p class="description description-color">{{str_limit($lang->pivot->description,35,"...")}}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            @endif
        @endif
    @endforeach
</div>
@include('layouts.partials.scripts')