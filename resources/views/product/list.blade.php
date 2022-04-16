<div class="widget-product-list">
    <div class="row">
        <div class="col-md-3">
           @include('product.list.filters')
        </div>
        <div class="col-md-9">
            @include('product.list.filter-header')
            <div class="product-list">
                <div class="product-list grid_full grid_sidebar grid-uniform">
                    @foreach($products as $product)
                        <div class="product-list-item">
                            <div class="product-item-img">
                                <a href="{{ url($product->url) }}">
                                    <img src="{{Resizer::get($product->thumbnail, 370, 170)}}" alt="images" class="img-responsive">
                                </a>
                                <div class="label label-2 red label-top-20">Hot</div>
                            </div>
                            <div class="product-item-info">
                                <h3><a href="{{ url($product->url) }}" title="">{{$product->title}}</a></h3>
                                <div class="prod-price">
                                    <span class="price black">${{$product->price}}</span>
                                </div>
                                {!! $product->short_desc !!}
                                <div class="button-ver2">
                                    <a href="#" class="addcart-ver2" title="Add to cart"><span class="icon"></span>ADD TO CART</a>
                                    <a href="#" class="wishlist" title="wishlist"><i class="ion-heart fa-4" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$products->links('layouts.struct.paginator')}}
            </div>
        </div>
    </div>
</div>
