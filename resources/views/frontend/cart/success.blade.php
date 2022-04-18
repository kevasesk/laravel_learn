@extends('frontend.layouts.main')

@section('title')
    Success
@endsection

@section('content')
    <ul class="breadcrumb">
        <li>
            <a href="#">01. Shopping Cart</a>
        </li>
        <li>
            <a href="#">02. Check Out</a>
        </li>
        <li>
            <a class="active" href="#" title="">03. Order Complete</a>
        </li>
    </ul>
    <div class="complete-page text-center">
        <h2 class="status">
            <span class="ion-checkmark-circled fa-4 icon-check"></span>
            Congratulations! You’ve
            <span>completed</span> payment. Your order number is # {{$orderIncrement}}
        </h2>
    </div>
@endsection


