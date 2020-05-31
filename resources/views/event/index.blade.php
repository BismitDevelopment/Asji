@extends('layouts.app')

@section('title')
<title>
  Events
</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('content')
    
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div> 
@endif
    <h2 style="font-weight: bold" class="text-center">ASJI's Events</h2>
    <div class="event-list" id="eventList">
        @foreach ($event as $item)
        {{-- php for split data --}}
        @php
            // event date formating
            $date = date('F j, Y', strtotime($item->event_date));
            // snippet event_description
            $desList = explode("\r\n", $item->event_description);
            $desSnippet = "";
            foreach ($desList as $itemList) {
                if(strpos($itemList, "<p>") === 0){
                    $desSnippet .= $itemList;
                    break;
                }
            }
            $desSnippet = str_replace(array('<p>', '</p>'), '', $desSnippet);
            $desSnippet = substr($desSnippet, 0, 350) . "...";
        @endphp
        <div class="event-item" onclick="location.href='{{ route('events.show', ['event'=>$item->id])}}'">
            <span class="dot"></span>
            <h5 style="font-weight: bold;">{{$item->event_name}}</h5>
            <div class="location" style="display: flex; align-items:center">
              <img src="{{ asset('icon/today.png')}}" alt=""><span>{{$date}}</span> 
            </div>
            <div class="location" style="display: flex; align-items:center">
              <img src="{{ asset('icon/location.png')}}" alt=""><span>{{$item->event_location}}</span> 
            </div>
            <p>{!!  $desSnippet !!}</p>
        </div>
        @endforeach

        {{-- pagination --}}
        {{$event->links()}}
    </div>
</div>
@endsection