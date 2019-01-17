<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="container">
<form method="post" action="{{url("fieldItem/update/$fieldvalue->id")/*."/".$fieldvalue->id*/}}">
    {{csrf_field()}}
    {{--<label>value</label><input type="text" id="2" placeholder="value" name="value" value="{{$fieldvalue->value}}"><br>
    @if($custom_field->category_id==null)
        <label>name</label><input type="text" id="3" placeholder="name" name="name" value="{{$custom_field->name}}"><br>
        --}}{{--<label>itemId</label><input type="text" id="1" placeholder="itemId" name="itemId" value="{{$fieldvalue->item_id}}"><br>--}}{{--
        <label>type</label><input maxlength="4" type="text" id="4" placeholder="type" name="type" value="{{$custom_field->type}}"><br>
    @endif
    <input type="submit"><br>--}}
    @if($custom_field->category_id==null)
        <div class="form-body">
            <div class="form-group">
                <label>type:</label>
                <input type="text" placeholder="valueType" name="type"  class="form-control" required value="{{$custom_field->type}}">
            </div>
        </div>
            @foreach($custom_field->Customs_languages as $custom_lang)

                @if($custom_lang->pivot->language_id == session("lang"))
                    <div class="form-body">
                        <div class="form-group">
                            <label>name:</label>
                            <input type="text" placeholder="name" name="name"  class="form-control" required value="{{$custom_lang->pivot->name}}">
                        </div>
                    </div>
                    @endif
                @endforeach
    @endif
    @foreach($fieldvalue->Fieldvalue_languages as $field_lang)
        @if($field_lang->pivot->language_id  == session("lang"))
            <div class="form-body">
                <div class="form-group">
                    <label>value:</label>
                    <input type="text" placeholder="value" name="value"  class="form-control" required value="{{$field_lang->pivot->value}}">
                </div>
            </div>
        @endif
    @endforeach
    <div class="form-actions">
        <button type="submit" class="btn btn-circle btn-primary">update</button>
    </div>

</form>
</div>
@include('layouts.partials.scripts')

{{--
<!DOCTYPE html>
<html>
<body>
<form method="post" action="{{url("field/addField/").$fieldvalue}}">
{{csrf_field()}}    $custom_field,$fieldvalue
<input type="text" placeholder="valueType" name="type" value="{{$custom_field->type}}"><br>
<input type="text" placeholder="name" name="name" value="{{$custom_field->name}}"><br>
<input type="text" placeholder="itemId" name="itemId" value="{{$custom_field->itemId}}><br>
<input type="text" placeholder="value" name="value" value="{{$custom_field->value}}><br>
<input type="submit"><br>
</form>
</body>
</html>--}}
