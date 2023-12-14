@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header bg-secondary bg-opacity-25">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><b>Sentence Annotation</b></h4>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('sentence.search') }}" method="GET">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <mult-component 
                    :sentences="{{ json_encode($sentences) }}" 
                    :baseurl="'{{ url('') }}'"
                    query="{{$query}}"
                    csrf={{ csrf_token() }} 
                    :user="{{ json_encode(Auth::user()) }}"
                    ></nult-component>
                </div>
            </div>
        </div>
    </div>
@endsection
