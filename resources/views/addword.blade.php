@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header bg-secondary bg-opacity-25">
                        <h5 class="text-center fw-bold my-0">Add New Word</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::has('status'))
                            <div class="alert alert-success">{{ Session::get('status') }}
                            </div>
                        @endif
                        <form id="wordForm" action="{{ route('createword') }}" method="POST">
                            @csrf
                            <div class="row my-4">
                                <label class="col-1" for="word"><b>Word</b></label>
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="word" id="word"
                                            placeholder="enter word" value="{{ old('word') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-1" for="roman"><b>Roman</b></label>
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="roman" id="roman"
                                            placeholder="enter roman">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-1" for="meaning"><b>Meaning</b></label>
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="meaning" id="meaning"
                                            placeholder="enter meanings semparated by comma" value="{{ old('meaning') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-1" for="stem"><b>Stem</b></label>
                                <div class="col-5">
                                    <input class="form-control" type="text" name="stem" id="stem"
                                        placeholder="enter stem" value="{{ old('stem') }}">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1">
                                    <label for="sentiment"><b>Sentiment</b></label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="sentiment" id="sentiment">
                                            <option value="">--Select one--</option>
                                            <option value="neutral" {{old('sentiment') === 'neutral'?'selected':''}}>Neutral</option>
                                            <option value="happiness" {{old('sentiment') === 'happiness'?'selected':''}}>Happiness</option>
                                            <option value="sadness" {{old('sentiment') === 'sadness'?'selected':''}}>Sadness</option>
                                            <option value="fear" {{old('sentiment') === 'fear'?'selected':''}}>Fear</option>
                                            <option value="disgust" {{old('sentiment') === 'disgust'?'selected':''}}>Disgust</option>
                                            <option value="anger" {{old('sentiment') === 'anger'?'selected':''}}>Anger</option>
                                            <option value="surprise" {{old('sentiment') === 'surprise'?'selected':''}}>Surprise</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-1" for="vulgar"><b>Vulgar</b></label>
                                <div class="col-5">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="vulgar" id="vulgar">
                                            <option value="">--Select one--</option>
                                            <option value="1" {{old('vulgar') === '1'?'selected':''}}>Not Vulgar</option>
                                            <option value="2" {{old('vulgar') === '2'?'selected':''}}>Sligtly Vulgar</option>
                                            <option value="3" {{old('vulgar') === '3'?'selected':''}}>Vulgar</option>
                                            <option value="4" {{old('vulgar') === '4'?'selected':''}}>Very Vulgar</option>
                                            <option value="5" {{old('vulgar') === '5'?'selected':''}}>Extremely Vulgar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <label class="col-1" for="ner"><b>Name of</b></label>
                                <div class="col-4">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="ner" id="ner">
                                            <option value="">--Select one--</option>
                                            <option value="location" {{ old('ner') === 'location'? "selected":''}}>Location</option>
                                            <option value="person" {{ old('ner') === 'person'? "selected":''}}>Person</option>
                                            <option value="other" {{ old('ner') === 'other'? "selected":''}}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- <h4 class="fw-bold text-center text-muted  my-4">Part of Speach</h4>
                            <div class="form-check">
                                <input class="form-check-input" id='checkNoun' type="radio" name='postype'
                                    value="n" data-bs-toggle="collapse" href="#collapseNoun">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkNoun"><b>Noun</b></label>
                            </div>
                            <div class="collapse" id="collapseNoun">
                                <div class="card my-2 p-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="numberSingular" value="singular">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="numberSingular">Singular</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="numberPlural" value="plural">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="numberPlural">Plural</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbCommon" value="common">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbCommon">Common</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbProper" value="proper">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbProper">Proper</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="genderMasculine" value="masculine">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="genderMasculine">Masculine</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="genderFeminine" value="feminine">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="genderFeminine">Feminine</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="nounDirect" value="direct">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="nounDirect">Direct</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="nounOblique" value="oblique">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="nounOblique">Oblique</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" id="checkVerb" type="radio" name='postype'
                                    value="v" data-bs-toggle="collapse" href="#collapseVerb">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkVerb"><b>Verb</b></label>
                            </div>
                            <div class="collapse" id="collapseVerb">
                                <div class="card my-2 p-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="presentVerb" value="vs">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="presentVerb">Present Verb</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="pastVerb" value="vt">
                                                    <label class="form-check-label pb-1 ps-2 pe-4" for="pastVerb">Past
                                                        Verb</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbInfinitive" value="vi">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbInfinitive">Infinitive Verb</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbProper" value="va">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbProper">Auxiliary Verb</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbPresentCopula" value="vsc">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbPresentCopula">Present Copula Verb</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="verbPastCopula" value="vtc">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="verbPastCopula">Past Copula Verb</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="futureParticle" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="futureParticle">Future Particle</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" id="checkPronoun" type="radio" name='postype'
                                    value="p" data-bs-toggle="collapse" href="#collapsePronoun">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkPronoun"><b>Pronoun</b></label>
                            </div>
                            <div class="collapse" id="collapsePronoun">
                                <div class="card my-2 p-2">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="personalNoun" value="vs">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="personalNoun">Personal Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="possessivePronoun" value="vt">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="possessivePronoun">Possessive Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="demPronoun" value="vi">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="demPronoun">Demonstrative Pronoun</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="indPronoun" value="va">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="indPronoun">Indefinite Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="refPrnoun" value="vsc">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="refPrnoun">Reflexive Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="recPronoun" value="vtc">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="recPronoun">Reciprocal Pronoun</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="intPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="intPronoun">Intensive Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="interrPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="interrPronoun">Interrogative Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="relPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="relPronoun">Relative Pronoun</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="direcPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="direcPronoun">Directional Pronoun

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="cliticPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="cliticPronoun">Clitic Pronoun</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pos"
                                                        id="distPronoun" value="pf">
                                                    <label class="form-check-label pb-1 ps-2 pe-4"
                                                        for="distPronoun">Distributive Pronoun</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input pos" id="checkPre" type="radio" name='postype'
                                    value="pre">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkPre"><b>Preposition</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input pos" id="checkPost" type="radio" name='postype'
                                    value="post">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkPost"><b>Postposition</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input pos" id="checkNum" type="radio" name='postype'
                                    value="num">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkNum"><b>Numeral</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input pos" id="checkInt" type="radio" name='postype'
                                    value="int">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkInt"><b>Interjection
                                    </b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input pos" id="checkConj" type="radio" name='postype'
                                    value="conj">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkConj"><b>Conjunction
                                    </b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkAdv" type="radio" name='postype'
                                    value="adv">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdv"><b>Adverb</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkAdj" type="radio" name='postype'
                                    value="adj">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdj"><b>Adjectives</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkFw" type="radio" name='postype'
                                    value="fw">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkFw"><b>Foreign Word</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkAbb" type="radio" name='postype'
                                    value="abb">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkAbb"><b>Abbreviation</b></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="checkSym" type="radio" name='postype'
                                    value="sym">
                                <label class="form-check-label pb-1 ps-2 pe-4" for="checkSym"><b>Symbol</b></label>
                            </div> --}}
                            
                            <div id="oldPostype" data-postype = {{old('postype')}}></div>
                            <div id="oldPos" data-pos={{old('pos')}}></div>
                            <pos-component posType = "{{old('postype')}}" pos={{old('pos')}}></pos-component>
                            <hr>
                            <div class="row justify-content-md-end">
                                <div class="col-lg-9"></div>
                                <div class="col-3  d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function onCheck(e){
            const checkBox = document.getElementByClass('pos');
            const toUnCheck = document.getElementByName('postype')
            checkBox.onCheck(
                toUnCheck.checked = false;
            ) 
        }
    </script> --}}
@endsection
