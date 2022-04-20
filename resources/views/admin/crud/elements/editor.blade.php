<div class="form-group">
    <label>{{$column['title']}}</label>
    <textarea name="{{$column['column']}}" style="width: 100%;" id="{{$entity->id.$column['column']}}">{!! trim($entity->{$column['column']}) !!}</textarea>
</div>
<script>
    ClassicEditor.create( document.querySelector("#"+"{{$entity->id.$column['column']}}") )
</script>
