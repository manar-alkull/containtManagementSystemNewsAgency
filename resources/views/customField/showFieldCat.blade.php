<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="container">
        <div class="form-body">
            <div class="form-group">
                <label>type: {{$custom_field->type}}</label>
            </div>
        </div>
    @foreach($custom_field->Customs_languages as $lang)
        @if($lang->pivot->language_id == session("lang"))
            <div class="form-body">
                <div class="form-group">
                    <label>name: {{$lang->pivot->name}}</label>
                </div>
            </div>
        @endif
     @endforeach
</div>
@include('layouts.partials.scripts')