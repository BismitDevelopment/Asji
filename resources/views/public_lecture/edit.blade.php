@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/date.js')}}"></script>
@endsection

@section('content')


{{-- {{$lecture}} --}}
<div >
    <h2 class="text-center"><b>Edit Lecture</b></h2>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.lectures.update', ['lecture'=>$lecture->id]) }}" >
    @csrf
    @method('PUT')
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputTitle">Lecture Title</label>
            <input class="form-control" placeholder="Title" type="text" name="title" id="inputTitle" value="{{ $lecture->title}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputDescription">Lecture Description</label>
            <input class="form-control" placeholder="Describe the lecture!" type="text" name="description" id="inputDescription" value="{{ $lecture->description }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputLocation">Location</label>
            <input class="form-control" placeholder="Where the public lecture will be held?" type="text" name="location" id="inputLocation" value="{{ $lecture->location}}">
        </div>
        
        <div class="form-group col-md-6">
            <div style="margin-bottom:8px">Date</div>
            <input style="width:100%" placeholder="Lecture Date?" id="inputDate" class="datepicker" data-date-format="yyyy-mm-dd" name="lecture_date" value="{{ $lecture->lecture_date}}">
        </div>
    </div>

    <div class="title-form">
        Images
    </div>
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

    <input class="btn btn-primary" type="submit" value="SUBMIT">

</form>
@endsection