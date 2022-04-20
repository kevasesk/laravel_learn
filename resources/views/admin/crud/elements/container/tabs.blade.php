@php $number = 0 @endphp
@foreach($entity->{$column['child']} as $tab)
    <div class="tab">
        @foreach($column['fields'] as $field)
            <input type="text" name="{{$column['child']}}[{{$number}}][{{$field}}]" placeholder="{{$field}}" value="{{$tab[$field]}}"/>
        @endforeach
        @php $number++ @endphp
        <br/>
    </div>
@endforeach
<div class="tab">
    @foreach($column['fields'] as $childField)
        <input type="text" name="{{$column['child']}}[{{$number}}][{{$childField}}]" placeholder="{{$childField}}"/>
    @endforeach
    <br/>
</div>
