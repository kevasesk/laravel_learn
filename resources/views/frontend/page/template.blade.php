@extends('frontend.layouts.main')

@isset($page['title'])
    @section('title')
        {{ $page['title'] }}
    @endsection
@endisset

@section('content')
    @if($page['content'])
        <p>{!! $page['content'] !!}</p>
    @else
        <div class="container" style="min-height: 100px;">
            <h1>No content</h1>
        </div>
    @endif
@endsection


