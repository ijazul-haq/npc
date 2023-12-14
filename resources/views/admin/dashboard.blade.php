@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('words.edited')}}">Edited</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('words.loaded')}}">Loaded</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('words.untouched')}}">Untouched</a>
            </li>
        </ul>
        <table width=800 class="table table-striped">
            <thead>
                <th>Word</th>
                <th>Rank</th>
                <th>Meaning</th>
                <th>Stem</th>
                <th>Status</th>
                <th>Actions</th>

            </thead>
            @foreach ($words as $key => $data)
                <tr>
                    <td>{{ $data->word }}</td>
                    <td>{{ $data->rank }}</td>
                    <td>{{ $data->meaning }}</td>
                    <td>{{ $data->stem }}</td>
                    <td>
                        @if ($data->status == 0)
                            <span style="color: rgb(38, 180, 10)">Untouched</span>
                        @endif
                        @if ($data->status == 1)
                            <span style="color: rgb(255, 196, 0)">Loaded</span>

                        @endif
                        @if ($data->status == 2)
                            <span style="color: rgb(255, 72, 0)">Edited</span>

                        @endif
                    </td>
                    <td>
                        <a href="{{route('words.show', ['id'=>$data->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex pt-3">
            {!! $words->links() !!}
        </div>
    </div>
@endsection
