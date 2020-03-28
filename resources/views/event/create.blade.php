@extends('layouts.app')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{ asset('js/date.js')}}"></script>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">

@endsection

@section('content')
  <form method="post" action="{{ route('admin.events.store')}}" enctype="multipart/form-data">
      @csrf
      <!-- Image Upload -->
      <h3 class="jumbotron my-4 bg-dark text-light"><i class="material-icons">cloud_upload</i> Image Upload</h3> 
      <div class="input-group control-group " >
        <input type="file" name="file[]" class="form-control">
      </div>

      <div class="control-group input-group" style="margin-top:10px">
        <input type="file" name="file[]" class="form-control">
      </div>

      <div class="control-group input-group" style="margin-top:10px">
        <input type="file" name="file[]" class="form-control">
      </div>
      @error('file_name')
        <div class="alert alert-danger my-3">{{ $message }}</div>
      @enderror
      <!-- Yang lain -->
      <h3 class="jumbotron my-4 bg-dark text-light">Add Data</h3>
      <div class="form-group">
          <label for="event_name">Your event name:</label>
          <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name" value="{{ old('event_name') }}">
          @error('event_name')
          <div class="alert alert-danger my-3">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="datepicker">Pick your event date:</label>
          <div class="input-group">
              <input class="date form-control datepicker @error('event_date') is-invalid @enderror" id="datepicker" autocomplete="off" name="event_date" value="{{ old('event_date') }}">
              <div class="input-group-append">
                  <span for="datepicker" class="input-group-text" id="basic-addon2"><i class="material-icons">calendar_today</i></span>
              </div>
          </div>
          @error('event_date')
          <div class="alert alert-danger my-3">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="event_location">Your event location:</label>
          <input type="text" class="form-control @error('event_location') is-invalid @enderror" name="event_location" id="event_location" value="{{ old('event_location') }}">
          @error('event_location')
          <div class="alert alert-danger my-3">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
          <label for="event_description">Your event description:</label>
          <textarea class="form-control" id="event_description" name="event_description" rows="3"> {{ old('event_description') }}</textarea>
          @error('event_description')
          <div class="alert alert-danger my-3">{{ $message }}</div>
          @enderror
      </div>
      <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
  </form>
@endsection