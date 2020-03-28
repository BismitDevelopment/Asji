@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <div id="lecture-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if (($images = $lecture->images) && count($lecture->images)!=0)
                    {{-- @php
                        dd($images);
                    @endphp --}}
                        @for ($i = 0; $i < count($images); $i++)
                            <li data-target="#lecture-carousel" data-slide-to="{{$i}}" class="@if($i===0) active @endif"></li>
                        @endfor
                    @else
                        <li data-target="#lecture-carousel" data-slide-to="0"></li>
                        <li data-target="#lecture-carousel" data-slide-to="1"></li>
                        <li data-target="#lecture-carousel" data-slide-to="2"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (($images = $lecture->images) && count($lecture->images)!=0)
                        @for ($i = 0; $i < count($images); $i++)
                            <div class="carousel-item @if($i===0) active @endif">
                                <img class="d-block w-100" src="{{ asset('images/'.$images[$i]->path) }}" alt="First slide">
                            </div>
                        @endfor
                    @else
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('icon/photo.svg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('icon/photo.svg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('icon/photo.svg')}}" alt="Third slide">
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#lecture-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#lecture-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="card-body bg-light">
            
            <div class="lecture-detail my-4">
                <h1 class="text-center" style="font-weight: bold;">{{ $lecture->title }}</h1>
                <div class="location mx-auto col-md-4" style="display: flex; align-items:center; justify-content:center;">
                    <img src="{{ asset('icon/location.png')}}" alt="">{{$lecture->location}}</span> 
                    <img src="{{ asset('icon/today.png')}}" alt=""><span>{{date('F j, Y', strtotime($lecture->lecture_date))}}</span> 
                </div>
                <div class="lecture-description">
                    {{ $lecture->description }}
                </div>
            </div>
        </div>
    </div>

@endsection

