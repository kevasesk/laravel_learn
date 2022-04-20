@extends('admin.layouts.main')

@section('title')
    Order
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <h3><b>Order</b> <span class="pull-right">#{{$order->increment_id}}</span></h3>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>

                                <h3>
                                    &nbsp;<b class="text-danger">{{$order->cart->firstname}} {{$order->cart->lastname}}</b>
                                </h3>
                                <p class="text-muted ms-1">
                                    {{$order->cart->address}}
                                </p>
                                <p class="mt-4">
                                    <b>Order Date :</b>
                                    <i class="mdi mdi-calendar"></i> {{$order->cart->created_at}}
                                </p>
                                <p class="mt-4">
                                    <b>Updated Date :</b>
                                    <i class="mdi mdi-calendar"></i> {{$order->cart->updated_at}}
                                </p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive mt-5" style="clear: both">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                    @foreach($order->cart->products as $product)
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>{{$product->title}}</td>
                                            <td class="text-end">{{$product->qty}}</td>
                                            <td class="text-end">{{$product->price}}</td>
                                            <td class="text-end">{{$product->price * $product->qty}}</td>
                                            @php $total = $total + ($product->price * $product->qty) @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right mt-4 text-end">
                            <p>Sub - Total amount: {{$total }}</p>
{{--                            TODO add shipping + payment or other--}}
                            <hr />
                            <h3><b>Total :</b> {{$total}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                        <div class="text-end">
                            <button class="btn btn-danger text-white" type="submit">
                                Send email
                            </button>
                            <button class="btn btn-danger text-white" type="submit">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
