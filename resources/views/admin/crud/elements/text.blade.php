<div class="form-group">
    <label>{{$column['title']}}</label>
    <input type="text" name="{{$column['column']}}" class="form-control" value="{{ $entity->{$column['column']} }}">
    <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
</div>
