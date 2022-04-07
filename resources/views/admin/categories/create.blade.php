@extends('admin.layouts.main')

@section('title')
    Category
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $entity->id }}"/>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route("admin.categories.list") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
           <div class="card-body">
               <div class="form-group">
                   <label>Is Active</label>
                   <div class="col-md-9">
                       <select name="is_active" class="select2 form-select shadow-none">
                           <option value="1" {{ $entity->is_active ? 'selected': '' }}>Yes</option>
                           <option value="0" {{ !$entity->is_active ? 'selected': '' }}>No</option>
                       </select>
                   </div>
               </div>
               <div class="form-group">
                   <label>Parent ID</label>
                   <input type="text" name="parent_id" class="form-control" value="{{ $entity->parent_id }}">
                   <span class="text-danger">@error('parent_id'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $entity->title }}">
                   <span class="text-danger">@error('title'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Url</label>
                   <input type="text" name="url" class="form-control" value="{{ $entity->url }}">
                   <span class="text-danger">@error('url'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Description</label>
                   <textarea name="desc" style="width: 100%;" id="desc" rows="10">{!! trim($entity->desc) !!}</textarea>
               </div>
               <div class="form-group">
                   <label>Thumbnail</label>
                   <img src="{{ asset('storage/'.$entity['thumbnail']) }}" alt="no image" width="100px" height="100px"/>
                   <input name="thumbnail" type="file">
                   <span class="text-danger">@error('thumbnail'){{$message}}@enderror</span>
               </div>
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route("admin.categories.list") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
           <script>
               $(".select2").select2();

               ClassicEditor.create( document.querySelector( '#desc' ) )
           </script>
       </form>
    </div>
@endsection
