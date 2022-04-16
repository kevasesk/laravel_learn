@extends('layouts.main')

@isset($page['title'])
@section('title')
    {{ $page['title'] }}
@endsection
@endisset

@section('content')
    <div class="widget-blog-collection">
        <div class="row top-row-blog-page">
            <div class="col-md-12">
                <div class="blog-item-img-ver1">
                    <a href="#" class="images"><img src="img/blog_1.jpg" alt="images" class="img-responsive"></a>
                    <span class="label-blog">Featured</span>
                    <div class="text">
                        <h2><a href="#" title="">How To Teach Viral Better Than Anyone Else</a></h2>
                        <p>Lets join this community now, you can easily add posts in PressGrid.</p>
                        <div class="tag">
                            <ul>
                                <li><a href="#"><i class="fa fa-pencil-square-o fa-3" aria-hidden="true"></i>ADMIN</a></li>
                                <li><a href="#"><i class="ion-eye fa-3a"></i>986</a></li>
                                <li><a href="#"><i class="ion-chatbubbles fa-3a"></i>125</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row top-row-blog-page">
            @foreach($posts as $post)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="blog-item-ver2">
                        <div class="blog-item img">
                            <a href="{{$post['url']}}"><img src="{{ Resizer::get($post->thumbnail, 370, 260) }}" alt="images" class="img-responsive"></a>
                        </div>
                        <div class="blog-info">
                            <h3><a href="{{$post['url']}}" title="">{{$post['title']}}</a></h3>
                            <p class="blog-description">{{substr($post['desc'], 0, 100)}}</p>
                            <a href="{{$post['url']}}" class="readmore">Continue Reading</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $posts->links('layouts.struct.paginator') }}
@endsection
