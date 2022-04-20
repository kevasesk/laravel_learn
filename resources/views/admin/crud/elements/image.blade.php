<div class="form-group">
    <label>{{$column['title']}}</label>
    <img src="{{ asset('storage/'.$entity[$column['column']]) }}" alt="no image" width="100px" height="100px"/>
    <input name="{{$column['column']}}" type="file">
    <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
</div>
