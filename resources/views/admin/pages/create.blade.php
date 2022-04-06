@extends('admin.layouts.main')

@section('title')
    Pages Form
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $page->id }}"/>
           <div class="card-body">
               <div class="form-group">
                   <label>Is Active</label>
                   <div class="col-md-9">
                       <select
                           name="is_active"
                           class="select2 form-select shadow-none"
                       >
                           <option value="1" {{ $page->is_active ? 'selected': '' }}>Yes</option>
                           <option value="0" {{ !$page->is_active ? 'selected': '' }}>No</option>
                       </select>
                       <script>
                           $(".select2").select2();
                       </script>
                   </div>
               </div>
               <div class="form-group">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $page->title }}">
                   <span class="text-danger">@error('title'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Url</label>
                   <input type="text" name="url" class="form-control" value="{{ $page->url }}">
                   <span class="text-danger">@error('url'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Content</label>
                   <textarea name="content" style="width: 100%;" id="editor" rows="20">{!! trim($page->content) !!}</textarea>
                   <script>
                       var quill = new Quill("#editor", {
                           theme: "snow",
                       });
                   </script>
               </div>
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route("admin.pages.index") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
