<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="form-body">
    <div class="form-group">

        <label>Custom Fields:</label><br>
        @foreach($item->fieldValues as $fieldValue)
           @foreach($fieldValue->Fieldvalue_languages as $field_lang)
               @if($field_lang->pivot->language_id == session("lang"))
                    @if($fieldValue->field->category==null)
                    <div style="float:left;">
                        <a calss="right" href="{{url("fieldItem/delete/$fieldValue->id")}}"><i class="fa fa fa-close text-red" ></i></a>
                    </div>
                    @endif
                    <a href="{{url("fieldItem/showUpdate/$fieldValue->id")}}">

                        @foreach($fieldValue->field->Customs_languages as $custo_lang)
                            <?php /*var_dump($custo_lang);die();*/?>
                            @if($custo_lang->pivot->language_id == session("lang"))
                            <label>{{$custo_lang->pivot->name}}:</label>
                            @endif
                        @endforeach
                    <label>{{$field_lang->pivot->value}}</label></a><br>
               @endif
           @endforeach
        @endforeach
    </div>
</div>
<a href="{{url("fieldItem/$item->id")}}">
<p id="add" class="btn btn-circle btn-primary">add custom field</p>
</a>

</form>
</body>
@include('layouts.partials.scripts')