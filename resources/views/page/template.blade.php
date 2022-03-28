@extends('layouts.main')

@section('title')
    {{ $page['title'] }}
@endsection

@section('content')
    <p>{!! $page['content'] !!}</p>
@endsection
