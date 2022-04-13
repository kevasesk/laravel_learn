@extends('layouts.main')

@section('title')
    {{ $product->title }}
@endsection

@section('content')
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
                        <form action="{{route('cart.add')}}" class="cart" method="GET">
                            <input type="hidden" name="id" value="{{$product->id}}"/>
                            <div class="quantity">
                                <button type="button" class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                                    <span class="minus-icon"></span>
                                </button>
                                <input type="qty" name="qty" value="1" id="quantity">
                                <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                    <span class="plus-icon"></span>
                                </button>
                            </div>
                            <div class="button-ver2">
                                <button class="link-ver1 addcart-ver2" data-field="" {{$addToCartAttribute}}>
                                    Add to Cart
                                </button>
                            </div>
                        </form>
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
@endsection


