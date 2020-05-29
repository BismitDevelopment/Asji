@extends('layouts.app')

@section('content')
    <h2 class="text-center" style="font-weight: bold">Journals</h2>
    <div class="table-responsive-md">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cover</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Written By</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($journals); $i++)
                    <tr>
                    @if (count($journals[$i]->images)!=0)
                        <th scope="row"><img src="{{ asset('images/'.$journals[$i]->images[0]->path) }}" alt="" style="max-width: 200px"></th>
                    @else
                        <th scope="row"><img src="{{ asset('icon/user.svg') }}" alt=""></th>
                    @endif
                        <td>
                            <a href="{{ route('journals.show', ['journal'=>$journals[$i]->id]) }}">
                                {{ $journals[$i]->title }}
                            </a>
                        </td>
                        <td>{{ strftime("%b, %d %Y", strtotime($journals[$i]->publish_date)) }}</td>
                        <td>{{ $journals[$i]->writer }}</td>
                        <td>
                            {{ substr($journals[$i]->description,0, 30)." ..." }}
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    {{ $journals->links() }}
@endsection