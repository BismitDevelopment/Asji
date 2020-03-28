@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/profile.js')}}"></script>
@endsection

{{-- {{ $profiles[0]->images }} --}}
@section('content')
    <h2 class="text-center mb-3" style="font-weight: bold">ASJI's Members</h2>
    @for ($i = 0; $i < count($profiles)/4; $i++)
        <div class="card-deck row" style="display: none;">
            @for ($j = 0 + ($i * 4); $j < ($i*4) + 4 && $j < count($profiles); $j++)
                @if ($profiles[$j] && $profiles[$j]->user->is_member)
                    <div class="card col-md-2 col-sm-3 col-5 mx-auto text-center">
                        <a style="" href="{{ route('profiles.show', ['profile'=>$profiles[$j]->id])}}">
                            @if (count($profiles[$j]->images)!=0)
                                <img src="{{ asset('images/'.$profiles[$j]->images[0]->path)}}" alt="{{ $profiles[$j]->first_name."'s Image"}}" class="card-img-top">
                            @else
                                <img src="{{ asset('icon/user.svg')}}" alt="No Image" class="card-img-top">
                            @endif
                            <div class="card-body px-0">
                                <h5 class="card-text "><b>{{ $profiles[$j]->last_name.", ".$profiles[$j]->first_name }}</b></h5>
                            </div>
                        </a>
                    </div>
                @endif
            @endfor
            
        </div>
    @endfor
    <div class="w-100 my-2 d-flex justify-content-center" id="loadMore">
        <button class="btn btn-black" style="display: none">Load More</button>
    </div>
@endsection