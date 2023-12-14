@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <table width=800 class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            @foreach ($users as $key => $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        @if ($data->role == 0)
                            User
                        @endif
                        @if ($data->role == 1)
                            Editer
                        @endif
                        @if ($data->role == 2)
                            Admin
                        @endif
                    </td>
                    <td>
                        {{-- <a  onclick="delete({{route('user.delete', ['id'=>$data->id])}})">Delete</a> --}}
                        |
                        <a href="{{route('user.show', ['id'=>$data->id])}}">Edit</a>
                        |
                        <a href="{{route('users.contributions', ['id'=>$data->id])}}">Show Contribution</a>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
