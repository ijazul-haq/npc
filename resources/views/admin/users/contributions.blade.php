@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @php
                if(count($conts)!=0){
                    echo $conts[0]->name."'s Contributions";
                } else {
                    echo "No contributions";
                }
            @endphp
        </h2>
        <table width=800 class="table table-striped">
            <thead>
                <th>Word</th>
                <th>Rank</th>
                <th>Meaning</th>
                <th>Stem</th>
                <th>Updated at</th>
                <th>Total</th>
            </thead>
            @foreach ($conts as $key => $data)
                <tr>
                    <td>{{ $data->word }}</td>
                    <td>{{ $data->rank }}</td>
                    <td>{{ $data->meaning }}</td>
                    <td>{{ $data->stem }}</td>
                    <td>{{ $data->created_at }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <strong>
                    @php
                        echo count($conts);
                    @endphp
                    </strong>
                </td>
            </tr>
        </table>

        {{-- <div class="d-flex pt-3">
        {!! $words->links() !!}
    </div> --}}
    </div>
@endsection
