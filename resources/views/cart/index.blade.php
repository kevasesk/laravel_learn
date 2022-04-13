@extends('layouts.main')

@section('title')
    Shop Cart
@endsection

@section('content')
    <section class="checkout-page">
        <div class="container">
            <div class="heading-sub">
                <h3 class="pull-left">shop cart</h3>
                <ul class="other-link-sub pull-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a class="active" href="#cart">Cart</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('cart')}}" class="active">01. Shopping Cart</a>
                </li>
                <li>
                    <a href="{{route('cart.checkout')}}">02. Check Out</a>
                </li>
                <li>
                    <a href="#" title="">03. Order Complete</a>
                </li>
            </ul>
            <div class="checkout-cart-form">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <table class="table shop_table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">IMAGE</th>
                                    <th class="product-name">PRODUCT NAME</th>
                                    <th class="product-price">PRICE</th>
                                    <th class="quantity">QUANTITY</th>
                                    <th class="product-subtotal">TOTAL</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="cart_item">
                                        <td class="product-thumbnail">
                                            <a href="{{url($product->url)}}">
                                                <img src="{{$product->getImage(100,75)}}" alt="{{$product->title}}" class="img-responsive">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{url($product->url)}}">{{$product->title}}</a>
                                        </td>
                                        <td class="product-price">
                                            <p class="price">{{$product->price}}</p>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity">
                                                <input type="text" name="quantity" value="{{$cart['items'][$product->id]['qty']}}">
                                            </div>
                                        </td>
                                        <td class="product-price product-subtotal">
                                            <p class="price">{{$cart['items'][$product->id]['qty'] * $product->price}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                    </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="aside-shopping-cart-total">
                            <h2>CART TOTALS</h2>
                            <ul>
                                <li><span class="text">Subtotal:</span><span class="cart-number">{{$cart['subtotal']}}</span></li>
                                <li><span class="text">Shipping:</span>
                                    <div class="shipping">
                                        <form method="get" action="#" role="search">
                                            <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                            <label for="radio1">FLAT RATE: $12.00</label>
                                            <input type="radio" name="gender" value="Free" id="radio2">
                                            <label for="radio2">Free Shipping</label>
                                            <input type="radio" name="gender" value="Delivery" id="radio3">
                                            <label for="radio3">FLAT RATE: $60.00</label>
                                            <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                            <label for="radio4">LOCAL DELIVERY: $5.00</label>
                                        </form>
                                    </div>
                                </li>
                                <li><span class="text calculate">Calculate shipping</span>
                                </li>
{{--                                need to add shiping--}}
                                <li><span class="text">Total:</span><span class="cart-number big-total-number">{{$cart['subtotal']}}</span></li>
                            </ul>
                            <div class="process">
                                <form method="GET" action="{{route('cart.checkout')}}">
                                    @csrf
                                    <button type="submit" class="btn-checkout">PROCEED TO CHECKOUT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shopping-cart-option">
                    <div class="button-option">
                        <a href="{{route('cart.back')}}" class="btn-continue-shopping active">Continue shopping </a>
                        <a href="{{route('cart.clear')}}" class="btn-clear">Clear Cart</a>
                    </div>
                    <div class="shopping-cart-coupon">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <form action="{{route('cart.coupon.add', ['id' => $cart['id']])}}" method="POST" class="coupon-form">
                                    <div class="form-group">
                                        <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code">
                                        <span class="icon-coupon"></span>
                                    </div>
                                    <button type="submit" class="btn-submit"></button>
                                </form>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <a href="#" class="btn-update-cart">UPDATE CART</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


