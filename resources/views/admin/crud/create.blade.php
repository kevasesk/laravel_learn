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
                   @continue(isset($column['hidden']) && $column['hidden'])
                   @if(!isset($column['type']))
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <input type="text" name="{{$column['column']}}" class="form-control" value="{{ $entity->{$column['column']} }}">
                           <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
                       </div>
                   @elseif($column['type'] == 'select')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <div class="col-md-9">
                               <select name="{{$column['column']}}" class="select2 form-select shadow-none">
                                   <option value="0">--Please Select--</option>
                                   @foreach($column['options'] as $option)
                                       <option value="{{$option['value']}}" {{ $entity->{$column['column']} == $option['value'] ? 'selected': '' }}>
                                           {{$option['title']}}
                                       </option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   @elseif($column['type'] == 'boolean')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <div class="col-md-9">
                               <select name="{{$column['column']}}" class="select2 form-select shadow-none">
                                   <option value="1" {{ $entity->{$column['column']} ? 'selected': '' }}>Yes</option>
                                   <option value="0" {{ !$entity->{$column['column']} ? 'selected': '' }}>No</option>
                               </select>
                           </div>
                       </div>
                   @elseif($column['type'] == 'text')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <textarea name="{{$column['column']}}" style="width: 100%;">{!! trim($entity->{$column['column']}) !!}</textarea>
                       </div>
                   @elseif($column['type'] == 'image')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <img src="{{ asset('storage/'.$entity[$column['column']]) }}" alt="no image" width="100px" height="100px"/>
                           <input name="{{$column['column']}}" type="file">
                           <span class="text-danger">@error($column['column']){{$message}}@enderror</span>
                       </div>
                   @elseif($column['type'] == 'relation')
                       <div class="form-group">
                           <label>{{$column['title']}}</label>
                           <div class="col-md-9">
                               <select name="{{$column['column']}}[]" class="relation-select form-select shadow-none">
                                   @foreach($column['all'] as $item)
                                       <option value="{{$item['id']}}" >{{$item['title']}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </div>
                   @elseif($column['type'] == 'container')
                       <div class="accordion" id="accordion{{$column['column']}}">
                           <div class="accordion-item">
                               <h2 class="accordion-header" id="panelsStayOpen-id-{{$column['column']}}">
                                   <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{$column['column']}}" aria-expanded="true" aria-controls="panelsStayOpen-{{$column['column']}}">
                                       {{$column['title']}}
                                   </button>
                               </h2>
                               <div id="panelsStayOpen-{{$column['column']}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-id-{{$column['column']}}">
                                   <div class="accordion-body">
                                       @if($column['contentType'] == 'images')
                                           @foreach($entity->{$column['child']} as $image)
                                               <div class="image">
                                                   <img src="{{asset('storage/'.$image['thumbnail'])}}" width="50" height="50" alt="no img"/>
                                                   <button onclick="$(this).parent('.image').remove()">delete</button>
{{--                                                   TODO delete--}}
                                                   <br/>
                                               </div>
                                           @endforeach
                                           <img src="" width="50" height="50" alt="no img"/>
                                           <input type="file" name="{{$column['child']}}[]"/>
                                           <br/>
                                       @elseif($column['contentType'] == 'tabs')
                                           @foreach($entity->{$column['child']} as $tab)
                                               <div class="tab">
                                                   <input type="text" name="{{$tab['title']}}[]"/>
                                                   <input type="text" name="{{$tab['content']}}[]"/>
                                                   <br/>
                                               </div>
                                           @endforeach
                                           <div class="tab">
                                               @foreach($column['fields'] as $childField)
                                                   <input type="text" name="{{$column['child']}}_{{$childField}}[]"/>
                                               @endforeach
                                                   <br/>
                                           </div>
                                       @endif
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endif
               @endforeach
               <script>
                   $(".select2").select2();

                   $(".relation-select").select2({multiple: true});

                   ClassicEditor.create( document.querySelector( '#desc' ) )
                   ClassicEditor.create( document.querySelector( '#short_desc' ) )

               </script>
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white" onclick="window.location='{{ route($routeSuffix.".list") }}'">
                       Cancel
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
