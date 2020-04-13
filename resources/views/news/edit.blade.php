@extends('layouts.app')

@section('title')
<title>Edit Data</title>
@endsection

@section('script')
<!-- Text-Editor CDN -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{ asset('js/news.js') }}"></script>
@endsection

@section('css')
    
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('content')
<div class="container my-4">
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div> 
      @endif
    <form method="post" action="">
        {{csrf_field()}}
        @method('patch')
        <!-- Input -->
        <h3 class="jumbotron my-4 bg-dark text-light">Add News</h3>
        <div class="form-group">
            <label for="news_title">News Title :</label>
            <input type="text" class="form-control @error('news_title') is-invalid @enderror" id="news_title" name="news_title" value="{{ $news->news_title }}">
            @error('news_title')
            <div class="alert alert-danger my-3">{{ $message }}</div>
            @enderror
        <div class="form-group">
            <label for="news_body">News Body :</label>
            <textarea class="form-control" id="news_body" name="news_body" rows="3"> {{ $news->news_body }}</textarea>
            @error('news_body')
            <div class="alert alert-danger my-3">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
    </form>
</div>
@endsection