@extends('layouts.app')

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/date.js')}}"></script>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
@endsection

@section('content')

<div >
    <h2 class="text-center"><b>Edit Journal</b></h2>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ route('admin.journals.update', ['journal'=> $journal->id ])}}" >
    @csrf
    @method('PUT')
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputTitle">Journal Title</label>
            <input class="form-control" placeholder="Title" type="text" name="title" id="inputTitle" value="{{ $journal->title }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputWriter">Jounal Writer</label>
            <textarea rows="2" class="form-control" placeholder="Who are the writers?" type="text" name="writer" id="inputWriter" >{{ $journal->writer }}</textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputDescription">Jounal Description</label>
            <textarea rows="4" class="form-control" placeholder="Describe the journal!" type="text" name="description" id="inputDescription" >{{ $journal->description }}</textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <div style="margin-bottom:8px">Publish Date</div>
            <input style="width:100%" placeholder="YYYY-MM-DD" id="inputDate" class="datepicker" data-date-format="yyyy-mm-dd" name="publish_date" value="{{ $journal->publish_date }}">
        </div>
    </div>
    
    <div class="row">
        Images
    </div>
    <div class="form-row" style="padding-bottom:8px">
        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile1" name="image[]">
            <label class="custom-file-label" for="customFile1">Choose cover image</label>
        </div>
        
        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile2" name="image[]">
            <label class="custom-file-label" for="customFile2">Choose image 2</label>
        </div>
        
        <div class="custom-file col">
            <input type="file" class="custom-file-input" id="customFile3" name="image[]">
            <label class="custom-file-label" for="customFile3">Choose image 3</label>
        </div>
    </div>
    
    <div class="row">
        Documents
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