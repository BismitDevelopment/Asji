@extends('layouts.app')

@section('content')
    <h2 class="text-center" style="font-weight: bold">{{ $profile->first_name." ".$profile->last_name }} Profile</h2>

    <a style="" href="{{ route('profiles.show', ['profile'=>$profile->id])}}"></a>
    <div class="row">
        <div class="col-md-3 mx-auto">
            <div class="card text-center">
                @if (count($profile->images)!=0)
                    <img src="{{ asset('images/'.$profile->images[0]->path)}}" alt="{{ $profile->first_name."'s Image"}}" class="card-img-top">
                @else
                    <img src="{{ asset('icon/user.svg')}}" alt="No Image" class="card-img-top">
                @endif
            </div>

            <div class="back-icon text-center py-5">
                <a href="{{ route('profiles.index')}}">
                    <img src="{{asset('icon/back.svg')}}" alt="Back to Members List" width="25%">
                </a>
            </div>
        </div>

        <div class="col-md-9 mx-auto">
            <div class="card text-left">
                <div class="card-body">
                    <h5 class="card-text detail-options" >Profession:</h5>
                    <h5 class="card-text detail-content" >{{$profile->profession}}</h5>
    
                    <h5 class="card-text detail-options" >Affiliation:</h5>
                    <h5 class="card-text detail-content" >{{$profile->affiliation}}</h5>
                    
                    <h5 class="card-text detail-options" >Discipline:</h5>
                    <h5 class="card-text detail-content" >{{$profile->discipline}}</h5>
    
                    <h5 class="card-text detail-options" >Education:</h5>
                    <h5 class="card-text detail-content" >{{$profile->education}}</h5>
    
                    <h5 class="card-text detail-options" >Membership:</h5>
                    <h5 class="card-text detail-content" >{{$profile->membership}}</h5>
    
                    <h5 class="card-text detail-options" >Experience:</h5>
                    <h5 class="card-text detail-content" >{{$profile->experience}}</h5>
                    
                    <h5 class="card-text detail-options" >Address:</h5>
                    <h5 class="card-text detail-content" >{{$profile->address}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection