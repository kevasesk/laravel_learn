<div class="form-group">
    <label>{{$column['title']}}</label>
    <div class="col-md-9">
        <select name="{{$column['column']}}" class="form-select shadow-none" id="{{$entity->id.$column['column']}}">
            <option value="1" {{ $entity->{$column['column']} == 1 ? 'selected': '' }}>Yes</option>
            <option value="0" {{ $entity->{$column['column']} == 0 ? 'selected': '' }}>No</option>

        </select>
    </div>
</div>
<script>
    $("#" + "{{$entity->id.$column['column']}}").select2();
</script>
