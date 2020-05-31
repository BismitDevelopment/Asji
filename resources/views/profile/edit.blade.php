@extends('layouts.app')

@section('title')
    <title>Edit Profile</title>
@endsection

@section('content')

<div >
    <h2 class="text-center"><b>Edit Profile</b></h2>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ route('profiles.update', $profile->id)}}" >
    @csrf
    @method('PUT')
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputFirstName">First Name</label>
            <input class="form-control" placeholder="First Name" type="text" name="first_name" id="inputFirstName" value="{{ $profile->first_name}}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputLastName">Last Name</label>
            <input class="form-control" placeholder="Last name" type="text" name="last_name" id="inputLastName" value="{{ $profile->last_name }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputProfession">Profession</label>
            <input class="form-control" placeholder="ex: Educatuor, Researcher, ..." type="text" name="profession" id="inputProfession" value="{{ $profile->profession }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputAffiliation">Affiliation</label>
            <input class="form-control" placeholder="ex: Lecturer Japanese Department, ..." type="text" name="affiliation" id="inputAffiliation" value="{{ $profile->affiliation }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputDiscipline">Discipline</label>
            <input class="form-control" placeholder="ex: History in General, Folklore, ..." type="text" name="discipline" id="inputDiscipline" value="{{ $profile->discipline }}">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEducation">Education</label>
            <input class="form-control" placeholder="ex: Universitas Indonesia, Japanese Area Studies Program, ..." type="text" name="education" id="inputEducation" value="{{ $profile->education }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputMembership">Professional Membership</label>
            <input class="form-control" placeholder="ex: The Indonesian Association for Japanese Studies, ..." type="text" name="membership" id="inputMembership" value="{{ $profile->membership }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputExperience">Professional Experience</label>
            <input class="form-control" placeholder="ex: Lecturer, Faculty of Humanities, Universitas Indonesia" type="text" name="experience" id="inputExperience" value="{{ $profile->experience }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputAddress">Address</label>
            <textarea class="form-control" placeholder="ex: Universitas Indonesia, Depok 1624, Indonesia" rows="3" type="text" name="address" id="inputAddress" >{{ $profile->address }}</textarea>
        </div>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputFile1" name="file[]">
        <label class="custom-file-label" for="inputFile1">Choose file</label>
    </div>
    </div>

    <input class="btn btn-primary" type="submit" value="SUBMIT">

</form>
@endsection