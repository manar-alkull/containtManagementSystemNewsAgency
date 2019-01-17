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
                    @foreach($item->Items_languages as $lang)
                        <form action="{{url("/updateItem/".$item->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$lang->pivot->name}}" required>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$lang->pivot->title}}" required>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"
                                           value="{{$lang->pivot->description}}">
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Page Content</label>
                                    <input id="h_{{$lang->pivot->language_id}}" name="content"  type="hidden" >
                                    <div id="fb_{{$lang->pivot->language_id}}" class="build-wrap"></div>
                                    <form  class="render-wrap"></form>
                                </div>
                            </div>
                            <p>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-circle btn-primary" onclick="onItemFormSubmit(this,'{{$lang->pivot->language_id}}')">Update</button>
                            </div>
                        </form>

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
                                            <form action="{{url("/addItem/".$categorie->id)}}" method="post" enctype="multipart/form-data" >
                                            {{csrf_field()}}
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Name ({{$language->name}})</label>
                                                    <input type="text" name={{"name_$language->name"}}  class="form-control"required>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Title ({{$language->name}})</label>
                                                    <input type="text" name={{"title_$language->name"}}  class="form-control"
                                                    required>
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
                                                    <input type="file" id="itemImage"
                                                           name={{"itemImage_$language->name"}}   class="form-control" required>
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
                                                    <input id="h_{{$language->id}}" name={{"pageContent_$language->name"}}  type="hidden" >
                                                    <div id="fb_{{$language->id}}" class="build-wrap"></div>
                                                    <form  class="render-wrap"></form>
                                                </div>
                                            </div>
                                            <p>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-circle btn-primary" onclick="onItemFormSubmit(this,'{{$language->id}}')">Add</button>
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
    <script>
        // Create jqxTabs.
        $('#jqxTabs').jqxTabs({ width: '100%', position: 'top'});
    </script>
    <script>
        function onItemFormSubmit(e,id){
            var hidden=$("#h_"+id);
            var formId=$("#fb_"+id);
            var res="";
            var clear=formId.children().children().html();
            var ul=formId.children().children().children().find(".prev-holder").each(
                function(index){

//                    if(index%4==0){
//                        res+='<label class="field-label">'+ $( this ).html()+'</label>';
//                    }else if(index%4==1){
//                        res+='<span class="required-asterisk" style="">'+ $( this ).html()+'</span>' ;
//                    }else if(index%4==2){
//                        res+='<span class="tooltip-element" tooltip="undefined" style="display:none">'+$( this ).html()+'</span>';
//                    }else if(index%4==3){
                    res+=$( this ).html();
//                    }
//                    console.log( index + ": " + $( this ).html() );
                }
            );
            console.log(formId.parent().parent().parent());
            hidden.val(res);
            console.log( hidden.val());
            formId.parent().parent().parent().submit();
        };
    </script>
    @include('layouts.partials.scripts')
