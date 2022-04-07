@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route($routeSuffix.'.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $entity->id }}"/>
           <div class="card-body">
               @foreach($columns as $column)
                   @continue($column['column'] == 'id')
                   @if(!isset($column['type']))
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <input type="text" name="{{$column['column']}}" class="form-control" value="{{ $entity->{$column['column']} }}">
                           <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
                       </div>
                   @elseif($column['type'] == 'boolean')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <div class="col-md-9">
                               <select
                                   name="{{$column['column']}}"
                                   class="select2 form-select shadow-none"
                               >
                                   <option value="1" {{ $entity->{$column['column']} ? 'selected': '' }}>Yes</option>
                                   <option value="0" {{ !$entity->{$column['column']} ? 'selected': '' }}>No</option>
                               </select>
                               <script>
                                   $(".select2").select2();
                               </script>
                           </div>
                       </div>
                   @elseif($column['type'] == 'text')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <textarea name="desc" style="width: 100%;">{!! trim($entity->{$column['column']}) !!}</textarea>
                       </div>
                   @elseif($column['type'] == 'image')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <img src="{{ asset('storage/'.$entity[$column['column']]) }}" alt="no image" width="100px" height="100px"/>
                           <input name="{{$column['column']}}" type="file">
                           <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
                       </div>
                   @endif
               @endforeach
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route($routeSuffix.".list") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
