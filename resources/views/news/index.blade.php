@extends('layouts.app')

@section('title')
<title>
    ASJI
</title>
@endsection

@section('script')
<script src="{{ asset('js/news.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/newsEvent.css') }}">
@endsection

@section('header')
    <div class="home">
        <img loading="lazy" class="bg-image" src="{{ asset('contents/home_jumbotron.png') }}" alt="home">
    </div>
@endsection

@section('content')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="about d-flex flex-column">
        <div class="d-flex flex-column align-self-center align-items-center">
            <h3 class="header-show">About ASJI</h3>
            <span class="line"></span>
        </div>
        <div class="body">
            <p class="italic">
                <b>
                    Motto: ASJI was born based on mutual agreement. Moral responsibility underlies the work steps.
                </b>
            </p>
            <p>
                Asosiasi Studi Jepang di Indonesia (ASJI) or The Indonesian Association for Japanese Studies or Indonesia Nihon Kenkyuu Kyookai was established on November 29, 1990 in Jakarta, to coincide with the holding of the 5th  National Seminar on Japanese Studies and ASJI First Congress. However, the forerunner of his birth has been pioneered since the holding of the Japanology 1st National Seminar at Padjadjaran University, Bandung (1982), Japanology 2nd National Seminar at IKIP Surabaya (1984), The third National Seminar on Japanese Studies at the University of Indonesia (1986), and the 4th National Japanese Studies Seminar at IKIP Bandung (1988).
            </p>
            <p>
                During that time until now, ASJI has carried out various activities to advance Japanese studies, and strengthen relations between the Indonesian and Japanese. One manifestation of concern for Japan, in the 4th National Seminar on Japanese Studies at the Center for Japanese Language Studies at Padjadjaran University, ASJI members succeeded in initiating an agreement known as "JATINANGOR MESSAGE", which essentially contained the determination of ASJI members to deepen understanding and insight into Japanese culture and Indonesia, deepening expertise in efforts to improve academic quality and professionalism in their respective fields, conducting scientific research involving various fields of science, as well as contributing ideas, real work and dedication - all of which are aimed at strengthening and promoting Japanese Government relations and Indonesia.
            </p>
            <p>
                In accordance with the regulations issued by the Directorate General of Social and Political Affairs of the Ministry of Home Affairs, ASJI then registered at the Institute to be recorded as a Scientific Professional Organization (1996). In the same year, ASJI became a member of the Indonesian Scientific Professional Organization Forum (FOPI), an institution under the auspices of the Indonesian Institute of Sciences (LIPI) - following the affirmation of the Minister of Education and Culture (at that time) Prof. Dr. Wardiman Djojonegoro, who said that the Ministry of Education and Culture would only be a coach for organizations that focus on scientific fields (Kompas, 1 May 1994).
            </p>
            <p>
                Since 2006, during the leadership of Mr. Bachtiar Alam, Ph. D the word kyookai in Indonesia Nihon Kenkyuu Kyookai changed to Indonesia Nihon Kenkyuu Gakkai. Now, at the age of 28th, ASJI has received broad responses from observers of Japanese Studies, both from within and outside the country, and to accommodate and disseminate information regarding this Japanese Study, ten Regional Administrators have been formed in several provinces in Indonesia (Northern Sumatra, Central-West Sumatra, Bali, East Java, Yogyakarta, Central Java, DKI Jakarta, West Java and North Sulawesi), although for the past few years the South Sumatra Region has been inactive. ASJI South Sulawesi Region has just been confirmed in conjunction with the ASJI Annual Symposium in Padang on October 4, 2017.
            </p>
            <p>
                Some news sources are extracted from: Organizational Reflections 1995-1999
            </p>
        </div>
    </div>
    <div id="news" class="py-4 news d-flex flex-column">
        <div class="d-flex flex-column align-self-center align-items-center">
            <h3 class="header-show">News</h3>
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

        <div class="w-100 my-2 d-flex justify-content-center" id="loadMore">
            <button class="btn btn-black" style="display: none">Load More</button>
        </div>
    </div>
@endsection
