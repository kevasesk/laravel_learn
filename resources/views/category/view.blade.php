@extends('layouts.main')

@section('title')
    {{ $category->title }}
@endsection

@section('content')
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
@endsection
