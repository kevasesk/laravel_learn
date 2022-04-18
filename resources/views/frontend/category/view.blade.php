@extends('frontend.layouts.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')
    <div class="widget-banner">
        <a href="#" class="images"><img src="{{ Resizer::get($category->thumbnail, 1170, 270) }}" alt="images" class="img-responsive"></a>
        <div class="banner-text">
            <h2>{{$category->title}}</h2>
            <p>{{$category->desc}}</p>
        </div>
        <div class="banner-button">
            <a class="btn-getit">Get It</a>
        </div>
    </div>
    @include('frontend.product.list')
@endsection
