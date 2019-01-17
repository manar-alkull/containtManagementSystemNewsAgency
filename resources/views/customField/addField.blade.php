<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="container">
<form method="post" action="{{url("fieldItem/add/$item->id")}}">
{{csrf_field()}}
{{--<input type="text" placeholder="valueType" name="type"  ><br>
<input type="text" placeholder="name" name="name"  ><br>
--}}{{--<input type="text" placeholder="itemId" name="itemId" ><br>--}}{{--
<input type="text" placeholder="value" name="value"><br>
<input type="submit"><br>--}}

    <div class="form-body">
        <div class="form-group">
            <label>type:</label>
            <input type="text" placeholder="valueType" name="type"  class="form-control" required >
        </div>
    </div>
     @foreach($languages as $lang)
         @if($lang->id == session("lang"))
            <div class="form-body">
                <div class="form-group">
                    <label>Name ({{$lang->name}})</label>
                    <input type="text" placeholder="name" name={{"name_$lang->name"}}  class="form-control" required >
                </div>
            </div>
            <div class="form-body">
                <div class="form-group">
                    <label>Value ({{$lang->name}})</label>
                    <input type="text" placeholder="value"name={{"value_$lang->name"}}  class="form-control" required >
                </div>
            </div>
        @endif
     @endforeach
    <div class="form-actions">
    <button type="submit" class="btn btn-circle btn-primary">Add</button>
    </div>

</form>
</div>
{{--</body>
</html>--}}
@include('layouts.partials.scripts')