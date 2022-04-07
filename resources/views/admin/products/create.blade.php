@extends('admin.layouts.main')

@section('title')
    Products
@endsection

@section('content')
    <div class="card">
       <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $product->id }}"/>
           <div class="border-top">
               <div class="card-body">
                   <button type="submit" class="btn btn-success text-white">
                       Save
                   </button>
                   <button type="button" class="btn btn-danger text-white"
                           onclick="window.location='{{ route("admin.products.list") }}'"
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
                           <option value="1" {{ $product->is_active ? 'selected': '' }}>Yes</option>
                           <option value="0" {{ !$product->is_active ? 'selected': '' }}>No</option>
                       </select>
                   </div>
               </div>
               <div class="form-group">
                   <label>Is In Stock</label>
                   <div class="col-md-9">
                       <select name="is_in_stock" class="select2 form-select shadow-none">
                           <option value="1" {{ $product->is_in_stock ? 'selected': '' }}>Yes</option>
                           <option value="0" {{ !$product->is_in_stock ? 'selected': '' }}>No</option>
                       </select>
                   </div>
               </div>
               <div class="form-group">
                   <label>Categories</label>
                   <div class="col-md-9">
                       <select name="categories[]" class="categories-select form-select shadow-none">
                           @foreach($categories as $category)
                               <option value="{{$category['id']}}" >{{$category['title']}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
               <div class="form-group">
                   <label>Sku</label>
                   <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                   <span class="text-danger">@error('sku'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                   <span class="text-danger">@error('title'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Url</label>
                   <input type="text" name="url" class="form-control" value="{{ $product->url }}">
                   <span class="text-danger">@error('url'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Qty</label>
                   <input type="text" name="qty" class="form-control" value="{{ $product->qty }}">
                   <span class="text-danger">@error('qty'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Price</label>
                   <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                   <span class="text-danger">@error('price'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Sale Price</label>
                   <input type="text" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
                   <span class="text-danger">@error('sale_price'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Sale Price From</label>
                   <input type="text" name="sale_price_from" class="form-control" value="{{ $product->sale_price_from }}">
                   <span class="text-danger">@error('sale_price_from'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Sale Price To</label>
                   <input type="text" name="sale_price_to" class="form-control" value="{{ $product->sale_price_to }}">
                   <span class="text-danger">@error('sale_price_to'){{$message}}@enderror</span>
               </div>
               <div class="form-group">
                   <label>Description</label>
                   <textarea name="desc" style="width: 100%;" id="desc" rows="10">{!! trim($product->desc) !!}</textarea>
               </div>
               <div class="form-group">
                   <label>Short Description</label>
                   <textarea name="short_desc" style="width: 100%;" id="short_desc" rows="10">{!! trim($product->short_desc) !!}</textarea>
               </div>
               <div class="form-group">
                   <label>Thumbnail</label>
                   <img src="{{ asset('storage/'.$product['thumbnail']) }}" alt="no image" width="100px" height="100px"/>
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
                           onclick="window.location='{{ route("admin.products.list") }}'"
                   >
                       Cancel
                   </button>
               </div>
           </div>
           <script>
               $(".select2").select2();

               $(".categories-select").select2({multiple: true});
               $(".categories-select").val({{$product->getCategoryIds()}}).trigger('change');

               ClassicEditor.create( document.querySelector( '#desc' ) )
               ClassicEditor.create( document.querySelector( '#short_desc' ) )
           </script>
       </form>
    </div>
@endsection
