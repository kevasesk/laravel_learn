@extends('layouts.main')

@section('title')
    Checkout
@endsection

@section('content')
    <ul class="breadcrumb">
        <li>
            <a href="{{route('cart')}}">01. Shopping Cart</a>
        </li>
        <li>
            <a href="{{route('cart.checkout')}}" class="active">02. Check Out</a>
        </li>
        <li>
            <a href="#" title="">03. Order Complete</a>
        </li>
    </ul>
    <div class="orders">
        <div class="row">
            <form method="post" action="{{route('cart.create')}}">
                @csrf
                <div class="col-md-7">
                    <div class="login-required">
                        <p>Returning Custumer? CLICK <a href="#" title="" class="login">HERE</a> TO LOGIN</p>
                        <p>Have a coupon? CLICK <a href="#" title="" class="coupon-code">HERE</a> TO ENTER YOUR CODE</p>
                    </div>
                    <div class="billing-details">
                        <div class="billing-details-heading">
                            <h2 class="billing-title">
                                Billing Details
                            </h2>
                        </div>
                        <div class="billing-details-content">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>First Name *</strong>
                                        <input type="text" name="firstname" class="form-control" value="">
                                        <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Last Name *</strong>
                                        <input type="text" name="lastname" class="form-control" value="">
                                        <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Company Name</strong>
                                        <input type="text" name="company" class="form-control" value="">
                                        <span class="text-danger">@error('company'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Email Address *</strong>
                                        <input type="text" name="email" class="form-control" value="">
                                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Phone *</strong>
                                        <input type="text" name="phone" class="form-control" value="">
                                        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Country *</strong>
                                        <input type="text" name="country" id="country" class="form-control"/>
                                        <span class="text-danger">@error('country'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Address *</strong>
                                        <textarea name="address" class="form-control form-textarea" rows="5"></textarea>
                                        <span class="text-danger">@error('address'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Postcode / ZIP *</strong>
                                        <input type="text" name="postcode" class="form-control" value="">
                                        <span class="text-danger">@error('postcode'){{$message}}@enderror</span>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Town / City *</strong>
                                        <input type="text" name="city" class="form-control" value="">
                                        <span class="text-danger">@error('city'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" name="acc"> Create an account?
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong>Order Note</strong>
                                        <textarea name="note" tabindex="2" class="form-control form-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="aside-order">
                        <h2>YOUR ORDER</h2>
                        <table class="table table-product">
                            <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th></th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="product-name">{{$product->title}}</td>
                                    <td class="product-quantity">x {{$cart[$product->id]['qty']}}</td>
                                    <td class="product-total">{{$cart[$product->id]['qty'] * $cart[$product->id]['price']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="tabs-first">
                            <li><span class="text">Subtotal:</span><span class="cart-number sub-number pull-right">$1,750.00</span></li>
                            <li><span class="text">Shipping:</span>
                                <div class="shipping">
                                    <form action="#">
                                        <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                        <label for="radio1">FLAT RATE: <span class="shipping-number">$12.00</span></label>
                                        <input type="radio" name="gender" value="Free" id="radio2">
                                        <label for="radio2">Free Shipping</label>
                                        <input type="radio" name="gender" value="Delivery" id="radio3">
                                        <label for="radio3">FLAT RATE: <span class="shipping-number">$60.00</span></label>
                                        <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                        <label for="radio4">LOCAL DELIVERY: <span class="shipping-number indent">$5.00</span></label>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li><span class="text">Total:</span><span class="cart-number big-total-number pull-right">{{$subtotal}}</span></li>
                        </ul>
                        <div class="order-transfer clearfix">
                            <ul class="tabs">
                                <li class="active">
                                    <i class="icon"></i>
                                    <h4>Direct Bank Transfer
                                        <span>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account. </span></h4>
                                </li>
                                <li>
                                    <i class="icon"></i>
                                    <h4>Check Payments</h4>
                                </li>
                                <li>
                                    <i class="icon"></i>
                                    <h4>Cash On Delivery</h4>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="btn-order">place order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


