@extends('layouts.app')

@section('title')
    <title>
        {{ $journal->title }}
    </title>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <div id="journal-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @if (($images = $journal->images) && count($journal->images)!=0)
                        @for ($i = 0; $i < count($images); $i++)
                            <li data-target="#journal-carousel" data-slide-to="{{$i}}" class="@if($i===0) active @endif"></li>
                        @endfor
                    @else
                        <li data-target="#journal-carousel" data-slide-to="0"></li>
                        <li data-target="#journal-carousel" data-slide-to="1"></li>
                        <li data-target="#journal-carousel" data-slide-to="2"></li>
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (($images = $journal->images) && count($journal->images)!=0)
                        @for ($i = 0; $i < count($images); $i++)
                            <div class="carousel-item @if($i===0) active @endif">
                                <img class="d-block w-100" src="{{ asset('images/'.$images[$i]->path) }}" alt="Slide">
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
                <a class="carousel-control-prev" href="#journal-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#journal-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="card-body bg-light">
            
            <div class="journal-detail my-4">
                <h1 class="text-center" style="font-weight: bold;">{{ $journal->title }}</h1>
                <div class="journal-detail mx-auto col-md-4" style="display: flex; align-items:center; justify-content:center;">
                    <img src="{{ asset('icon/create.png')}}" alt=""><span>{{$journal->writer}}</span>
                    <img src="{{ asset('icon/today.png')}}" alt=""><span>{{date('F j, Y', strtotime($journal->publish_date))}}</span> 
                </div>
                <div class="journal-description">
                    {{ $journal->description }}
                </div>
            </div>

            @if ($documents = $journal->documents)
                @foreach ($documents as $doc)
                    <div class="row mx-auto my-2">
                        <div class="col">
                            <a href="{{ route('show_pdf', ['document'=>$doc->id]) }}">
                                <button type="button" class="btn btn-secondary" style="width: 100%">SHOW PDF</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            @auth
                @if(auth()->user()->is_admin)
                <div class="row mx-auto">
                    <div class="col">
                        <a href="{{ route('admin.journals.edit', ['journal'=>$journal->id]) }}">
                            <button type="button" class="btn btn-primary" style="width: 100%">Edit</button>
                        </a>
                    </div>
                    <div class="col">
                        <form action="{{ route('admin.journals.destroy', ['journal'=>$journal->id]) }}" method="post">
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
    <div class="row">

    </div>
@endsection

