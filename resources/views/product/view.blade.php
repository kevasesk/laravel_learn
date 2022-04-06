@extends('layouts.main')

@section('title')
    {{ $product->title }}
@endsection

@section('content')
    <section class="shop-single-page">
        <div class="container">
            <div class="heading-sub">
                <ul class="other-link-sub pull-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a class="active" href="#detail">Detail</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="widget-shop-single">
                <div class="row">
                    <div class="col-md-5">
                        @include('product.gallery')
                    </div>
                    <div class="col-md-7">
                        <div class="shop-sing-item-detail">
                            <h3>{{ $product->title }}</h3>
                            <div class="prod-price">
                                @if($product->getOldPrice())
                                    <span class="price old">{{$product->getOldPrice()}} $</span>
                                @endif
                                <span class="price">{{$product->price}} $</span>
                            </div>
                            @if($product->desc)
                                <div class="description">
                                    {!! $product->desc !!}
                                </div>
                            @endif
                            <div class="group-button">
                                <form action="#" class="cart">
                                    <div class="quantity">
                                        <button type="button" class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                                            <span class="minus-icon"></span>
                                        </button>
                                        <input type="qty" name="qty" value="1" id="quantity">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                            <span class="plus-icon"></span>
                                        </button>
                                    </div>
                                </form>
                                <div class="button-ver2">
                                    <a href="#" class="link-ver1 addcart-ver2"><span class="icon"></span>ADD TO CART</a>
                                    <a href="#" class="link-ver1 addcart-ver2"><span class="icon"></span>ADD TO wishlist</a>
                                </div>
                            </div>
                            <div class="product-feature">
                                <ul class="product-feature-1">
                                    <li><strong>Instock:</strong> {{$product->getIsInStock() ? 'Yes' : 'No'}}</li>
                                    <li><strong>Vendor:</strong> Armani(hardcode)</li>
                                </ul>
                                <ul class="product-feature-2">
                                    <li><strong>SKU:</strong> {{$product->sku}}</li>
                                    <li><strong>Category:</strong> Laptops & Computer, Ultrabooks(hardcode)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @include('product.tabs')
            </div>
            @include('product.upsell')
        </div>
    </section>
@endsection


