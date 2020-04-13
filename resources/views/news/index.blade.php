@extends('layouts.app')

@section('script')
<script src="{{ asset('js/news.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="about d-flex flex-column">
        <div class="header d-flex flex-column align-self-center align-items-center">
            <h3>About</h3>
            <span class="line"></span>
        </div>
        <div class="p">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus elit a eros convallis, eu consequat
                purus fringilla. Aliquam erat volutpat. Vestibulum convallis accumsan nisi, eu suscipitquam. Mauris eget
                condimentum turpis. Maecenas quis diam efficitur, imperdiet orci at, porta est. In ut bibendum ex. Aenean
                porta efficitur hendrerit. Vestibulum efficitur est id varius lacinia.</p><br>
            <p>Quisque vestibulum ut ante sit amet congue. Nunc suscipit efficitur ligula, lacinia molestie velit placerat
                sed. Mauris suscipit, enim sit amet tristique posuere, sem velit blandit nisi, nontincidunt purus dui sit
                amet mauris. Suspendisse tempor molestie mi, quis efficitur lectus sollicitudin a.</p><br>
            <p>Morbi at laoreet neque. Fusce porttitor erat nec orci condimentum, hendrerit tempor lacus bibendum.</p>
        </div>
    </div>
    <div class="news d-flex flex-column">
        <div class="header d-flex flex-column align-self-center align-items-center">
            <h3>News</h3>
            <span class="line"></span>
        </div>
        <div class="news-list">
            @foreach ($news as $item)
                @php
                    // date
                    $date = date('j F, Y', strtotime($item->created_at));
                    // news body snippet
                    $bodyList = explode("\r\n", $item->news_body);
                    $bodySnippet = "";
                        foreach ($bodyList as $itemList) {
                        if(strpos($itemList, "<p>") === 0){
                            $bodySnippet .= $itemList;
                            break;
                        }
                    }
                    $bodySnippet = str_replace(array('<p>', '<p>'), '', $bodySnippet);
                    $bodySnippet = substr($bodySnippet, 0, 500) . "...";
                @endphp
                <div class="news-item my-5" onclick="location.href='{{ route('news.show', ['news'=>$item->id]) }}'"
                    style="display: none">
                    <span><b>{{$item->news_title}},</b><span class="text-muted"> at {{$date}}</span></span>
                    <p> {!! $bodySnippet !!}</p>
                </div>
            @endforeach
        </div>

        {{-- Load More --}}
        <div class="w-100 my-2 d-flex justify-content-center" id="loadMore">
            <button class="btn btn-black" style="display: none">Load More</button>
        </div>
    </div>
@endsection
