@extends('layouts.app')

@section('content')
<div class="container">
    <table width=800 class="table table-striped">
        <thead>
            <th>Word</th>
            <th>Rank</th>
            <th>Meaning</th>
            <th>Stem</th>
        </thead>
        @foreach($words as $key => $data)
        <tr>
            <td>{{$data->word}}</td>
            <td>{{$data->rank}}</td>
            <td>{{$data->meaning}}</td>
            <td>{{$data->stem}}</td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex pt-3">
        {!! $words->links() !!}
    </div>
</div>
@endsection