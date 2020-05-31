@extends('layouts.app')
    
@section('title')
    <title>
        Public Lecture
    </title>
@endsection

@section('content')
    <h2 class="text-center" style="font-weight: bold">Public Lectures</h2>
    @auth
    @if (Auth::user()->is_admin)
        <a href="{{ route('admin.lectures.create') }}">
            <button type="button" class="btn btn-primary btn-lg btn-block my-2">Create Public Lecture</button>
        </a>
    @endif
    @endauth
    <div class="table-responsive-md">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Details</th>
                <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($lectures); $i++)
                    <tr>
                        <th scope="row">{{ $i + (($lectures->currentPage()-1) * $lectures->perPage()) + 1 }}</th>
                        <td>{{ strftime("%b, %d %Y", strtotime($lectures[$i]->lecture_date)) }}</td>
                        <td>
                            <a href="{{ route('lectures.show', ['lecture'=>$lectures[$i]->id]) }}">
                                {{ substr($lectures[$i]->description,0, 30)." ..." }}
                            </a>
                        </td>
                        <td>{{ $lectures[$i]->location }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    {{ $lectures->links() }}
@endsection