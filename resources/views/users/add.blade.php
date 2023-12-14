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
        <form action="{{ route('storeuser') }}" method="POST" class="col-md-6">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                <label for="password_confirmation">Confirm password:</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  value="{{ old('password_confirmation') }}">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="0">User</option>
                    <option value="1">Editer</option>
                    <option value="2">Admin</option>
                </select>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
        </form>
    </div>
@endsection
