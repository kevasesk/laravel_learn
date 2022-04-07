@extends('admin.layouts.main')

@section('title')
    Posts Form
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $post->id }}"/>
           <div class="card-body">
               <div class="form-group">
                   <label>Is Active</label>
                   <div class="col-md-9">
                       <select
                           name="is_active"
                           class="select2 form-select shadow-none"
                       >
                           <option value="1" {{ $post->is_active ? 'selected': '' }}>Yes</option>
                           <option value="0" {{ !$post->is_active ? 'selected': '' }}>No</option>
                       </select>
                       <script>
                           $(".select2").select2();
                       </script>
                   </div>
               </div>
               <div class="form-group">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                   <span class="text-danger">@error('title'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Url</label>
                   <input type="text" name="url" class="form-control" value="{{ $post->url }}">
                   <span class="text-danger">@error('url'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Desc</label>
                   <textarea name="desc" style="width: 100%;">{!! trim($post->desc) !!}</textarea>
               </div>
               <div class="form-group">
                   <label>Thumbnail</label>
                   <img src="{{ asset('storage/'.$post['thumbnail']) }}" alt="no image" width="100px" height="100px"/>
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
                           onclick="window.location='{{ route("admin.blog.posts.index") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
