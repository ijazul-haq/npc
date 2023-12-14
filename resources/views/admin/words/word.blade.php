@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="shadow-sm p-3">
            {{-- <h1 class="text-center">افغانستان</h1> --}}
            <h1 class="text-center">{{$word->word}}</h1>
            <h3 class="text-center">{{$word->rank}}</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- @if ($status->any())
                <div class="alert alert-success">{{$status}}</div>
            @endif --}}
            <div class="row">

            
            <form class="form col-md-6" action="{{ route('words.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="roman">Roman:</label>
                    <input class="form-control" type="text" name="roman" id="roman" value="{{$word->roman}}">
                </div>
                <div class="form-group">
                    <label for="meaning">Meaning:</label>
                    <input class="form-control" type="text" name="meaning" id="meaning" value="{{$word->meaning}}">
                </div>
                <div class="form-group">
                    <label for="stem">Stem:</label>
                    <input class="form-control" type="text" name="stem" id="stem" value="{{$word->stem}}">
                </div>
                <div class="form-group">
                    <label for="sentiment">Sentiment:</label>
                    <select class="form-control" name="sentiment" id="sentiment">
                        <option value="Natueral" @if ($word->sentiment == 'Natueral')selected @endif>Natueral</option>
                        <option value="Happiness" @if ($word->sentiment == 'Happiness')selected @endif>Happiness</option>
                        <option value="Sadness" @if ($word->sentiment == 'Sadness')selected @endif>Sadness</option>
                        <option value="Fear" @if ($word->sentiment == 'Fear')selected @endif>Fear</option>
                        <option value="Disgust" @if ($word->sentiment == 'Disgust')selected @endif>Disgust</option>
                        <option value="Anger" @if ($word->sentiment == 'Anger')selected @endif>Anger</option>X
                        <option value="Surprise" @if ($word->sentiment == 'Surprise')selected @endif>Surprise</option>X
                    </select>
                </div>
                <div class="form-group">
                    <label for="abuse">Abuse:</label>
                    <select class="form-control" name="abuse" id="abuse">
                        <option value="1" @if ($word->abuse == 1)selected @endif>Not abusive</option>
                        <option value="2" @if ($word->abuse == 2)selected @endif>Little abusive</option>
                        <option value="3" @if ($word->abuse == 3)selected @endif>More abusive</option>
                        <option value="4" @if ($word->abuse == 4)selected @endif>Very abusive</option>
                        <option value="5" @if ($word->abuse == 5)selected @endif>Extremely abusive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="abuse">Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="0" @if ($word->status == 0)selected @endif>Untouched</option>
                        <option value="1" @if ($word->status == 1)selected @endif>Loaded</option>
                        <option value="2" @if ($word->status == 2)selected @endif>Edited</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="{{$word->id}}">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
                
        </div>
    </div>
@endsection
