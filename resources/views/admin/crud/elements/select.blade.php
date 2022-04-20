<div class="form-group">
    <label>{{$column['title']}}</label>
    <div class="col-md-9">
        <select name="{{$column['column']}}" class="form-select shadow-none" id="{{$entity->id.$column['column']}}">
            <option value="0">--Please Select--</option>
            @foreach($column['options'] as $option)
                <option value="{{$option['value']}}" {{ $entity->{$column['column']} == $option['value'] ? 'selected': '' }}>
                    {{$option['title']}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<script>
    $("#" + "{{$entity->id.$column['column']}}").select2();
</script>
