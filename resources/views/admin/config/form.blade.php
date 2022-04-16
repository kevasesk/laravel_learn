@extends('admin.layouts.main')

@section('title')
    Config
@endsection

@section('content')
<div class="card">
    <form method="POST" action="{{route('admin.config.save')}}" enctype="multipart/form-data">
    @csrf
    @foreach($fields as $field)
        @if(!isset($field['type']))
            <div class="form-group">
                <label>{{$field['title']}}</label>
                <input type="text" name="{{$field['key']}}" class="form-control" value="{{ $field['value'] }}">
            </div>
        @elseif($field['type'] == 'boolean')
            <div class="form-group">
                <label>{{$field['title']}}</label>
                <div class="col-md-9">
                    <select name="{{$field['key']}}" class="select2 form-select shadow-none">
                        <option value="1" {{ $field['value'] ? 'selected': '' }}>Yes</option>
                        <option value="0" {{ !$field['value'] ? 'selected': '' }}>No</option>
                    </select>
                </div>
            </div>
            <script>
                $(".select2").select2();
            </script>
        @elseif($field['type'] == 'text')
            <div class="form-group">
                <label>{{$field['title']}}</label>
                <textarea name="{{$field['key']}}" style="width: 100%;">{!! trim($field['value']) !!}</textarea>
            </div>
        @elseif($field['type'] == 'image')
            <div class="form-group">
                <label>{{$field['title']}}</label>
                <img src="{{ asset('storage/'.$field['value']) }}" alt="no image" width="100px" height="100px"/>
                <input name="{{$field['key']}}" type="file">
            </div>
        @endif
    @endforeach
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-success text-white">
                Save
            </button>
            <button type="button" class="btn btn-danger text-white" onclick="location.reload();">
                Cancel
            </button>
        </div>
    </div>
</form>
</div>
@endsection
