@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="text-center py-5">
                        <h3>Show user's contributios here</h3>
                        <!-- <h4>Please contribute with us</h4> -->
                        <div class="mt-4">
                            <!-- <a href="/addword" class="btn btn-info mx-1">Add New Word</a> -->
                            <!-- <a href="/edit" class="btn btn-primary mx-1">Tag Words</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection