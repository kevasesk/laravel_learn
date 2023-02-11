@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route($routeSuffix.'.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $entity->id }}"/>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white" onclick="window.location='{{ route($routeSuffix.".list") }}'">
                       Back
                   </button>
               </div>
           </div>
           <div class="card-body">
               @foreach($columns as $column)
                   @continue(isset($column['hiddenInForm']) && $column['hiddenInForm'])
                   @if(!isset($column['type']))              @include('admin.crud.elements.text')
                   @elseif($column['type'] == 'select')      @include('admin.crud.elements.select')
                   @elseif($column['type'] == 'categories')  @include('admin.crud.elements.categories')
                   @elseif($column['type'] == 'boolean')     @include('admin.crud.elements.yesno')
                   @elseif($column['type'] == 'text')        @include('admin.crud.elements.editor')
                   @elseif($column['type'] == 'image')       @include('admin.crud.elements.image')
                   @elseif($column['type'] == 'container')   @include('admin.crud.elements.container')
                   @endif
               @endforeach
               <script>
                   $(".relation-select").select2({multiple: true});

               </script>
           </div>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white" onclick="window.location='{{ route($routeSuffix.".list") }}'">
                       Back
                   </button>
               </div>
           </div>
       </form>
    </div>
@endsection
