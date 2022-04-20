<section class="featured-product">
    <div class="container">
        <div class="heading-v1">
            <h3 class="pull-left">featured products</h3>
            <ul class="otherr-link pull-right">
                @foreach($featuredMap as $brand => $products)
                    <li class="@if($loop->first) active @endif"><a data-toggle="pill" href="#{{$brand}}">{{$brand}}</a></li>
                @endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="tab-content">
            @foreach($featuredMap as $brand => $products)
                <div id="{{$brand}}" class="tab-pane fade in @if($loop->first) active @endif">
                    <div class="prod-fea-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-15 col-sm-4 col-xs-6">
                                    <div class="product-item ver2">
                                        <div class="prod-item-img bd-style-2">
                                            <a href="{{url($product->url)}}"><img src="{{Resizer::get($product->thumbnail, 600,600)}}" alt="images" class="img-responsive"></a>
                                            <div class="button">
                                                <a href="#" class="addcart">ADD TO CART (TODO)</a>
                                                <a href="{{url($product->url)}}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="prod-info">
                                            <h3><a href="{{url($product->url)}}">{{$product->title}}</a></h3>
                                            <div class="prod-price">
                                                <span class="price black">{{$product->price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
