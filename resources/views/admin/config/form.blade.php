@extends('admin.layouts.main')

@section('title')
    Config
@endsection

@section('content')
    <div class="card">
        <form method="POST" action="{{route('admin.config.save')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('admin.layouts.struct.notifications')
                @foreach($fields as $fieldKey => $fieldData)
                    @if(!isset($fieldData['type']))
                        <div class="form-group">
                            <label>{{$fieldData['title']}}</label>
                            <input type="text" name="{{$fieldKey}}" class="form-control" value="{{ $fieldData['value'] ?? '' }}">
                        </div>
                    @elseif($fieldData['type'] == 'boolean')
                        <div class="form-group">
                            <label>{{$fieldData['title']}}</label>
                            <div class="col-md-9">
                                <select name="{{$fieldKey}}" class="select2 form-select shadow-none">
                                    <option value="1" {{ $fieldData['value'] ? 'selected': '' }}>Yes</option>
                                    <option value="0" {{ !$fieldData['value'] ? 'selected': '' }}>No</option>
                                </select>
                            </div>
                        </div>
                        <script>
                            $(".select2").select2();
                        </script>
                    @elseif($fieldData['type'] == 'text')
                        <div class="form-group">
                            <label>{{$fieldData['title']}}</label>
                            <textarea name="{{$fieldKey}}" style="width: 100%;">{!! trim($fieldData['value']) !!}</textarea>
                        </div>
                    @elseif($fieldData['type'] == 'image')
                        <div class="form-group">
                            <label>{{$fieldData['title']}}</label>
                            <img src="{{ asset('storage/'.$fieldData['value']) }}" alt="no image" width="100px" height="100px"/>
                            <input name="{{$fieldKey}}" type="file">
                        </div>
                    @endif
                @endforeach
            </div>

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
