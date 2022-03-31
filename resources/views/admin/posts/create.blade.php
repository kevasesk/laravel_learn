@extends('admin.layouts.main')

@section('title')
    Posts Form
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
           @csrf
           <div class="card-body">
               <div class="form-group">
                   <label>Is Active</label>
                   <div class="col-md-9">
                       <select
                           name="is_active"
                           class="select2 form-select shadow-none"
                           style="width: 100%; height: 36px"
                       >
                           <option value="1">Active</option>
                           <option value="0">Disable</option>
                       </select>
                       <script>
                           $(".select2").select2();
                       </script>
                   </div>
               </div>
               <div class="form-group">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control">
                   <span class="text-danger">@error('title'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Url</label>
                   <input type="text" name="url" class="form-control">
                   <span class="text-danger">@error('url'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Desc</label>
                   <textarea id="editor" name="desc" style="width: 100%;"></textarea>
                   <script>
                       var quill = new Quill("#editor", {
                           theme: "snow",
                       });
                   </script>
               </div>
               <div class="form-group">
                   <label>Thumbnail</label>
                   <img src="" alt="no image" width="100px" height="100px"/>
                   <input name="thumbnail" type="file">
                   <span class="text-danger">@error('thumbnail'){{$message}}@enderror</span>
               </div>
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-primary">Reset</button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route("admin.posts.index") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
