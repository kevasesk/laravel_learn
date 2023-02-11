@extends('frontend.layouts.homepage')

@section('title')
    {{env('APP_NAME')}}
@endsection

@section('content')
    <section class="slide">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    @include('frontend.page.home.slider')
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="sub-banner">
                                <a href="{{$images['home-page-top-left']['url']}}">
                                    <img src="{{ Resizer::get($images['home-page-top-left']['thumbnail'], 420, 220) }}" alt="images" class="img-reponsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="{{$images['home-page-top-right']['url']}}">
                                <img src="{{ Resizer::get($images['home-page-top-right']['thumbnail'], 420, 220) }}" alt="images" class="img-reponsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-banner"></div>
    </section>
    <section class="bigdeal">
        <div class="container">
            <div class="label label-1">{{__('ONSALE')}}</div>
            <div class="sale-list">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="product-item ver4 top-inner">
                            <div class="prod-item-img">
                                <a href="#"><img src="img/products/iwatch2.jpg" alt="images" class="img-reponsive"></a>
                                <div class="prod-choose">
                                    <div class="prod-color">
                                        <span class="dot"></span>
                                        <span class="dot yellow"></span>
                                        <span class="dot green"></span>
                                    </div>
                                    <div class="prod-price">
                                        <span class="price old">$200.50</span>
                                        <span class="price-ver2 price-lg">$125.00</span>
                                        <span class="productPriceDiscount">Save<br><span class="strong">$75.5</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="prod-info">
                                <h3><a class="prod-name" href="#" title="">Sony Smartwatch 3 - 2016</a></h3>
                                <p class="brand">SONY</p>
                                <div class="ratingstar">
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <span class="number">(12)</span>
                                </div>
                                <div class="prod-description">
                                    <ul>
                                        <li>Plays all your music, fomat type (WAV, MP4, ...)</li>
                                        <li>Fills the room with immersive</li>
                                        <li>Allows hands-free</li>
                                        <li>Controls lights, switches</li>
                                    </ul>
                                </div>
                                <div class="countdown" data-countdown="countdown" data-date="08-31-2018-00-00-00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 ">
                        <div class="product-item ver1 padding--bottom margin-r">
                            <div class="prod-item-img set--width">
                                <a class="image" href="#"><img src="img/products/ipad.jpg" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info ver1">
                                <h3><a href="#" title="">iPad Pro MLMX2CL/A (MLMX2LL/A) 9.7-inch</a></h3>
                                <div class="ratingstar sm">
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <span class="number">(12)</span>
                                </div>
                                <div class="prod-price">
                                    <span class="price old">$299.6</span>
                                    <span class="price">$210.25</span>
                                </div>
                            </div>
                            <div class="label label-2 blue">New</div>
                        </div>
                        <div class="product-item ver1 margin-r ">
                            <div class="prod-item-img set--width">
                                <a class="image" href="#"><img src="img/products/seiko.jpg" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info ver1">
                                <h3><a href="#" title="">Motorola Moto 360 Sport - 45mm, Black</a></h3>
                                <div class="ratingstar sm">
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                    <span class="number">(12)</span>
                                </div>
                                <div class="prod-price">
                                    <span class="price old">$399.6</span>
                                    <span class="price">$327.50</span>
                                </div>
                            </div>
                            <div class="label label-2 red">Hot</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.page.home.featured')
    <div class="banner_1">
        <div class="container">
            <a href="{{url($images['home-page-center']['url'] ?? '#')}}"><img src="{{Resizer::get($images['home-page-center']['thumbnail'], 1170,220)}}" alt="images" class="img-responsive"></a>
        </div>
    </div>
    @include('frontend.page.home.popular')
    <div class="banner_2 sub-banner">
        <div class="container">
            <a href="{{url($images['home-page-footer']['url'] ?? '#')}}"><img src="{{Resizer::get($images['home-page-footer']['thumbnail'], 1170,220)}}" alt="images" class="img-responsive"></a>
        </div>
    </div>
@endsection
