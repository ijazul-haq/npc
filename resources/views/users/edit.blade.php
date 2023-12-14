@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form action="{{ route('user.edit') }}" method="POST" class="col-md-6">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="0" @if ($user->role == 0) selected @endif>User</option>
                    <option value="1" @if ($user->role == 1) selected @endif>Editer</option>
                    <option value="2" @if ($user->role == 2) selected @endif>Admin</option>
                </select>
                <input type="hidden" value="{{$user->id}}" name="id">
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
        </form>
    </div>
@endsection
