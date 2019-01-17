<!DOCTYPE html>
<html>
@include('layouts.partials.htmlheader')
<body>
<div class="container">
    <form method="post" action="{{url("fieldCat/add/$categoryId")}}">

        {{csrf_field()}}
        <div class="form-body">
            <div class="form-group">
                <label>Type </label>
                <input type="text" placeholder="valueType" name="type" class="form-control" required>
            </div>
        </div>
        @foreach($languages as $language)
                <div class="form-body">
                    <div class="form-group">
                        <label>Name({{$language->name}})</label>
                        <input type="text" placeholder="name" name={{"name_$language->name"}} class="form-control" required>
                    </div>
                </div>
        @endforeach
        <div class="form-actions">
                        <button type="submit" class="btn btn-circle btn-primary">Add</button>
                    </div>

    </form>
</div>
{{--</body>
</html>--}}
@include('layouts.partials.scripts')