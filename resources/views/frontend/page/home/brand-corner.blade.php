<aside class="widget brand-v1">
    <div class="heading-v1">
        <h3>BRAND CORNER</h3>
    </div>
    <div class="brand-list-v1">
        @foreach($branded as $product)
            <div class="product-item ver1">
                <div class="prod-item-img">
                    <a href="{{url($product->url)}}"><img src="{{Resizer::get($product->thumbnail, 600, 600)}}" alt="images" class="img-responsive"></a>
                </div>
                <div class="prod-info">
                    <h3><a href="{{url($product->url)}}">{{$product->title}}</a></h3>
                    <div class="p-price">
                        <span class="price black">{{$product->price}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</aside>
