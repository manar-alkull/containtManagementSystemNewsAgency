<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="container">
    <form method="post" action="{{url("fieldCat/update/$custom_field->id")/*."/".$fieldvalue->id*/}}">
        {{csrf_field()}}
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
        <div class="form-actions">
            <button type="submit" class="btn btn-circle btn-primary">update</button>
        </div>

    </form>
</div>
@include('layouts.partials.scripts')