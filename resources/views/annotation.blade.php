@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-secondary bg-opacity-25">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Annotation</b></h4>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('sentence.search')}}" method="GET">
                                @csrf
                                <input type="text" name="search" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <anno-component :checkup="{{json_encode($checkup)}}" :baseurl="'{{url('')}}'" csrf={{csrf_token()}} :user="{{json_encode(Auth::user())}}"></anno-component>
            </div>
        </div>
    </div>
</div>
@endsection