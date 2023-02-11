<section class="popular-product">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="heading-v2">
                    <ul class="breadcrumb-ver1">
                        <li class="active"><a data-toggle="pill" href="#popular">{{__('popular')}}</a></li>
                        <li><a data-toggle="pill" href="#top">{{__('top rated')}}</a></li>
                        <li><a data-toggle="pill" href="#new">{{__('newest')}}</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="popular" class="tab-pane fade in active">
                        <div class="pp-list">
                            <div class="row top-row">
                                @foreach($popular as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <div class="product-item ver2">
                                            <div class="prod-item-img bd-style-2">
                                                <a href="{{$product->getUrl()}}"><img src="{{Resizer::get($product->thumbnail, 600,600)}}" alt="images" class="img-responsive"></a>
                                                <div class="button">
                                                    <a href="#" class="addcart addcart-v2">ADD TO CART</a>
                                                    <a href="{{$product->getUrl()}}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="prod-info">
                                                <h3><a href="{{$product->getUrl()}}">{{$product->title}}</a></h3>
                                                <div class="p-price">
                                                    <span class="price old">{{$product->price}}</span>
                                                    <span class="price">{{$product->sale_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="top" class="tab-pane fade">
                        <div class="pp-list">
                            <div class="row top-row">
                                @foreach($topRated as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <div class="product-item ver2">
                                            <div class="prod-item-img bd-style-2">
                                                <a href="{{$product->getUrl()}}"><img src="{{Resizer::get($product->thumbnail, 600,600)}}" alt="images" class="img-responsive"></a>
                                                <div class="button">
                                                    <a href="#" class="addcart addcart-v2">ADD TO CART</a>
                                                    <a href="{{$product->getUrl()}}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="prod-info">
                                                <h3><a href="{{$product->getUrl()}}">{{$product->title}}</a></h3>
                                                <div class="p-price">
                                                    <span class="price old">{{$product->price}}</span>
                                                    <span class="price">{{$product->sale_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="new" class="tab-pane fade">
                        <div class="pp-list">
                            <div class="row top-row">
                                @foreach($newest as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <div class="product-item ver2">
                                            <div class="prod-item-img bd-style-2">
                                                <a href="{{$product->getUrl()}}"><img src="{{Resizer::get($product->thumbnail, 600,600)}}" alt="images" class="img-responsive"></a>
                                                <div class="button">
                                                    <a href="#" class="addcart addcart-v2">ADD TO CART</a>
                                                    <a href="{{$product->getUrl()}}" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="prod-info">
                                                <h3><a href="{{$product->getUrl()}}">{{$product->title}}</a></h3>
                                                <div class="p-price">
                                                    <span class="price old">{{$product->price}}</span>
                                                    <span class="price">{{$product->sale_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                @include('frontend.page.home.brand-corner')
            </div>
        </div>
    </div>
</section>
