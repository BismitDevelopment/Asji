@extends('layouts.app')

@section('script')
<script src="{{ asset('js/news.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('content')
    <div class="content">
        <h1 class="header-show">{{$news->news_title}}</h1>
        <span class="text-muted">{{ date('j F, Y', strtotime($news->created_at)) }}</span>
        <div class="news_body">
             {!! $news->news_body !!}
        </div>
    </div>
@endsection