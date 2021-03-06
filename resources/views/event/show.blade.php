@extends('layouts.app')

@section('title')
    <title>
        {{ $event->event_name }}
    </title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/eventEvent.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <div id="event-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if (($images = $event->images) && count($event->images)!=0)
                        @for ($i = 0; $i < count($images); $i++)
                            <li data-target="#event-carousel" data-slide-to="{{$i}}" class="@if($i===0) active @endif"></li>
                        @endfor
                    @else
                        <li data-target="#event-carousel" data-slide-to="0"></li>
                        <li data-target="#event-carousel" data-slide-to="1"></li>
                        <li data-target="#event-carousel" data-slide-to="2"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (($images = $event->images) && count($event->images)!=0)
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
                <a class="carousel-control-prev" href="#event-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#event-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="event-detail my-4">
                <h1 class="text-center" style="font-weight: bold;">{{$event->event_name}}</h1>
                <div class="location mx-auto col-md-4" style="display: flex; align-items:center; justify-content:center;">
                    <img src="{{ asset('icon/location.png')}}" alt=""><span>{{$event->event_location."  "}}</span> 
                    <img src="{{ asset('icon/today.png')}}" alt=""><span>{{date('F j, Y', strtotime($event->event_date))}}</span> 
                </div>
                <div class="event-description">
                    {{ $event->event_description }}
                </div>
            </div>
            @auth
            @if(auth()->user()->is_admin)
            <div class="row">
                <div class="col">
                    <a href="{{ route('admin.events.edit', ['event'=>$event->id]) }}">
                        <button type="button" class="btn btn-primary" style="width: 100%">Edit</button>
                    </a>
                </div>
                <div class="col">
                    <form action="{{ route('admin.events.destroy', ['event'=>$event->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width: 100%">Delete</button>
                    </form>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>
    
@endsection
