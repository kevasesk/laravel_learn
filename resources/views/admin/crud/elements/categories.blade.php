<div class="form-group">
    <label>{{$column['title']}}</label>
    <div class="col-md-9">
        <select name="{{$column['column']}}[]" class="select2 form-select shadow-none mt-3" multiple="multiple" id="{{$entity->id.$column['column']}}">
            <option value="0">--Please Select--</option>
            @foreach($column['options'] as $option)
                <option value="{{$option['value']}}" {{ in_array($option['value'], $entity->getSelectedCategories()) ? 'selected': '' }}>
                    {{$option['title']}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<script>
    $("#" + "{{$entity->id.$column['column']}}").select2();
</script>
