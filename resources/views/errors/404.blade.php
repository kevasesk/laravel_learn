@extends('layouts.main')

@section('title')
    404 Page
@endsection

@section('content')
    <section class="error">
        <div class="container">
            <div class="heading-sub">
                <h3 class="pull-left">404 error</h3>
                <ul class="other-link-sub pull-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#pages">pages</a></li>
                    <li><a class="active" href="#error">404 page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="error-content">
                <div class="error-img text-center">
                    <a href="#"><img src="/img/about/404.jpg" alt="images" class="img-responsive"></a>
                </div>
                <div class="error-text text-center">
                    <h2>Oops 404 Again! That Page Can't Be Found.</h2>
                    <p>It looks like nothing was found at this location. Maybe try a search?</p>
                </div>
            </div>
        </div>
    </section>
@endsection
