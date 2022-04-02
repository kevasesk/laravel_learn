@extends('layouts.main')

@section('title')
    Pages list
@endsection

@section('content')
    <div class="card-container">
        @foreach($pages as $page)
            <div class="card-body">
                <h5 class="card-title">{{ $page['title'] }}</h5>
                <p class="card-text">{{ $page['content'] }}</p>
                <a href="{{ url($page['url']) }}" class="btn btn-primary">Go there</a>
            </div>
        @endforeach
    </div>
    {{ $pages->links('page.paginator') }}
@endsection

<style>
    .card-container{
        padding: 20px 5px;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 1em;
    }

    .card-body{
        border: 1px grey solid;
        border-radius: 5px;
        padding: 5px;
    }
</style>
