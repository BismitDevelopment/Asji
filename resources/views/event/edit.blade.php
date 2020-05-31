@extends('layouts.app')

@section('title')
    <title>Edit Event</title>
@endsection

@section('script')
  <!-- Text-Editor CDN -->
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="{{ asset('js/events.js')}}"></script>
@endsection

@section('css')
    
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('content')
    
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div> 
@endif
<form class="form-update" method="post" action="{{ route('admin.events.store')}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Image Upload -->
    <button type="button"></button>
    <><i class="material-icons">cloud_upload</i> Add Image</h3> 
    <div class="form-row" style="padding-bottom:8px">
        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile1" name="file[]">
            <label class="custom-file-label" for="customFile1">Choose file 1</label>
        </div>

        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile2" name="file[]">
            <label class="custom-file-label" for="customFile2">Choose file 2</label>
        </div>

        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile3" name="file[]">
            <label class="custom-file-label" for="customFile3">Choose file 3</label>
        </div>
    </div>

    @error('file')
    <div class="alert alert-danger my-3">{{ $message }}</div>
    @enderror
    
    <!-- Add Data -->
    <h3 class="jumbotron my-4 bg-dark text-light">Add Data</h3>

    <div class="form-group">
        <label for="event_name">Your event name:</label>
        <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name" value="{{ $event->event_name }}">
        @error('event_name')
        <div class="alert alert-danger my-3">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="event_date">Pick your event date:</label>
        <div class="input-group">
            <input class="date form-control @error('event_date') is-invalid @enderror" id="event_date" autocomplete="off" name="event_date" value="{{ date('d-m-Y', strtotime($event->event_date)) }}">
            <div class="input-group-append">
                <span for="event_date" class="input-group-text" id="basic-addon2"><i class="material-icons">calendar_today</i></span>
            </div>
        </div>
        @error('event_date')
        <div class="alert alert-danger my-3">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="event_location">Your event location:</label>
        <input type="text" class="form-control @error('event_location') is-invalid @enderror" name="event_location" id="event_location" value="{{ $event->event_location }}">
        @error('event_location')
        <div class="alert alert-danger my-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="event_description">Your event description:</label>
        <textarea class="form-control" id="event_description" name="event_description" rows="5">{{ $event->event_description }}</textarea>
        @error('event_description')
        <div class="alert alert-danger my-3">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
</form>
@endsection