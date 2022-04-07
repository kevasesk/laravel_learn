@extends('layouts.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')
    <section class="shop-list-v3-page">
        <div class="container">
            <div class="heading-sub">
                <ul class="other-link-sub pull-right">
                    <li><a href="#home">Home</a></li>
                    <li><a class="active" href="#shop">Shop</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="widget-banner">
                <a href="#" class="images"><img src="{{asset('storage/'.$category['thumbnail'])}}" alt="images" class="img-responsive" style="max-height: 200px;"></a>
                <div class="banner-text">
                    <h2>{{$category->title}}</h2>
                    <p>Mini camera by Instax(hardcode)</p>
                </div>
                <div class="banner-button">
                    <a class="btn-getit">Get It</a>
                </div>
            </div>
            @include('product.list')
        </div>
    </section>
@endsection
