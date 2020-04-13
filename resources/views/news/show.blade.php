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
        @auth
            @if(auth()->user()->is_admin)
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin.news.edit', ['news'=>$news->id]) }}">
                        <button type="button" class="btn btn-primary" style="width: 100%">Edit</button>
                    </a>
                </div>
                <div class="col">
                    <form action="{{ route('admin.news.destroy', ['news'=>$news->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width: 100%">Delete</button>
                    </form>
                </div>
            </div>
            @endif
        @endauth
    </div>
@endsection