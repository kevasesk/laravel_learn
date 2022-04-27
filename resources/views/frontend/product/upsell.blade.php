<div class="related-product-page">
    <div class="heading-shop">
        <h3>UPSELL PRODUCT</h3>
    </div>
    <div class="widget-product-related">
        <div class="owl-carousel owl-theme js-owl-product">
            @foreach($product->getUpsellProducts() as $childProduct)
                <div class="product-item">
                    <div class="product-item-img-related prod-item-img">
                        <a href="{{$childProduct->getUrl()}}"><img src="{{Resizer::get($childProduct->thumbnail, 600,600)}}" alt="images" class="img-responsive"></a>
                        <div class="button">
                            <a href="#" class="addcart">ADD TO CART(TODO)</a>
                            <a href="{{$childProduct->getUrl()}}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-item-info-related">
                        <h3><a href="{{$childProduct->getUrl()}}">{{$childProduct->title}}</a></h3>
                        <div class="prod-price">
                            <span class="price black">{{$childProduct->price}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
