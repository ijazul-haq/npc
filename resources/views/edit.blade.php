@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-header bg-secondary bg-opacity-25">
                        <div class="row">
                            <div class="col col-6">
                                <a href="/addword" class="btn btn-success btn-sm">New Word <i class="bi bi-plus-lg"></i></a>
                                <a href="{{ route('removeword', ['id' => $word->id]) }}"
                                    class="btn btn-danger ms-2 btn-sm">Remove Word</a>
                            </div>
                            <div class="col col-6" style="text-align: right;">
                                <span class="mx-1">ID: {{ $word->id }}</span>
                                <a href="{{ route('skip', ['id' => $word->id]) }}" class="btn btn-secondary btn-sm">Skip</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4" style="min-height: 130px;">
                            <div class="col bg-primary bg-opacity-25 p-2">
                                <div class="row" style="min-height: 65px;">
                                    <label for="homographs" class="col-2 col-form-label"><b>Word Senses</b><span
                                            class='fs-6 ms-1 badge bg-danger rounded-pill'>3</span><br><span
                                            class="text-muted">(Homographs)</span></label>
                                    <div class="col-1">
                                        <select form="wordForm" class="form-select" name="homographs" id="homographs">
                                            <option value="1" @if ($word->homographs == '1') selected @endif>1
                                            </option>
                                            <option value="2" @if ($word->homographs == '2') selected @endif>2
                                            </option>
                                            <option value="3" @if ($word->homographs == '3') selected @endif>3
                                            </option>
                                            <option value="4" @if ($word->homographs == '4') selected @endif>4
                                            </option>
                                            <option value="5" @if ($word->homographs == '5') selected @endif>5
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Add Sense</button>
                                    </div>
                                    <div class="col col-7" style="text-align: right;">
                                        <h2 class="my-0 fw-bold">{{ $word->word }}</h2>
                                        <h5 class="fs-5 text-muted">{{ $word->roman }}</h5>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div style="text-align: right;">
                                    <p>{{ $word->meaning }}</p>
                                </div>
                            </div>
                        </div>
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
                        <form id="wordForm" action="{{ route('editword') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-1" for="roman"><b>Roman</b></label>
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" value="{{ $word->roman }}"
                                            name="roman" id="roman" placeholder="enter roman">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-1" for="meaning"><b>Meaning</b></label>
                                <div class="col-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" value="{{ $word->meaning }}"
                                            name="meaning" id="meaning" placeholder="enter meanings semparated by comma">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-1" for="stem"><b>Stem</b></label>
                                <div class="col-5">
                                    <input class="form-control" type="text" name="stem" id="stem"
                                        placeholder="enter stem" value="{{ $word->stem }}">
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1">
                                    <label for="sentiment"><b>Sentiment</b></label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="sentiment" id="sentiment">
                                            <!-- <option value="">--Select one--</option> -->
                                            <option value="neutral" @if ($word->sentiment == 'neutral') selected @endif>
                                                neutral</option>
                                            <option value="happiness" @if ($word->sentiment == 'happiness') selected @endif>
                                                happiness</option>
                                            <option value="sadness" @if ($word->sentiment == 'sadness') selected @endif>
                                                sadness</option>
                                            <option value="fear" @if ($word->sentiment == 'fear') selected @endif>fear
                                            </option>
                                            <option value="disgust" @if ($word->sentiment == 'disgust') selected @endif>
                                                disgust</option>
                                            <option value="anger" @if ($word->sentiment == 'anger') selected @endif>anger
                                            </option>
                                            <option value="surprise" @if ($word->sentiment == 'surprise') selected @endif>
                                                surprise</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-1" for="vulgar"><b>Vulgar</b></label>
                                <div class="col-5">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="vulgar" id="vulgar">
                                            <!-- <option value="">--Select one--</option> -->
                                            <option value="not_vulgar" @if ($word->vulgar == 'not_vulgar') selected @endif>
                                                Not Vulgar</option>
                                            <option value="sligtly_vulgar"
                                                @if ($word->vulgar == 'sligtly_vulgar') selected @endif>Sligtly Vulgar</option>
                                            <option value="vulgar" @if ($word->vulgar == 'vulgar') selected @endif>
                                                Vulgar</option>
                                            <option value="very_vulgar"
                                                @if ($word->vulgar == 'very_vulgar') selected @endif>Very Vulgar</option>
                                            <option value="extremely_vulgar"
                                                @if ($word->vulgar == 'extremely_vulgar') selected @endif>Extremely Vulgar
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <label class="col-1" for="ner"><b>Name of</b></label>
                                <div class="col-4">
                                    <div class="form-group mb-4">
                                        <select class="form-select" name="ner" id="ner">
                                            <option value="">--Select one--</option>
                                            <option value="location" @if ($word->ner == 'location') selected @endif>
                                                Location</option>
                                            <option value="person" @if ($word->ner == 'person') selected @endif>
                                                Person</option>
                                            <option value="other" @if ($word->ner == 'other') selected @endif>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="oldPostype" data-postype={{ $word->pos }}></div>
                            <div id="oldPos" data-pos={{ $word->pos }}></div>
                            <pos-component posType="{{ old('postype') }}" pos={{ old('pos') }}></pos-component>
                            <hr>
                            {{-- <h4 class="fw-bold text-center text-muted  my-4">Part of Speach</h4> 
                    <div class="form-check">
                        <input class="form-check-input" id='checkNoun' type="radio" name='pos' value="n" data-bs-toggle="collapse" href="#collapseNoun" {{$word->pos=='n'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkNoun"><b>Noun</b></label>
                    </div>
                    <div class="collapse {{$word->pos=='n'?'show':''}}" id="collapseNoun">
                        <div class="card my-2 p-2">
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="number" id="numberSingular" value="singular" {{$word->number=='singular'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="numberSingular">Singular</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="number" id="numberPlural" value="plural" {{$word->number=='plural'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="numberPlural">Plural</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="CommonProper" id="verbCommon" value="common" {{$word->CommonProper=='common'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbCommon">Common</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="CommonProper" id="verbProper" value="proper" {{$word->CommonProper=='proper'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbProper">Proper</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderMasculine" value="masculine" {{$word->gender=='masculine'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="genderMasculine">Masculine</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="genderFeminine" value="feminine" {{$word->gender=='feminine'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="genderFeminine">Feminine</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="DirectOblique" id="nounDirect" value="direct" {{$word->DirectOblique=='direct'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="nounDirect">Direct</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="DirectOblique" id="nounOblique" value="oblique" {{$word->DirectOblique=='oblique'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="nounOblique">Oblique</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" id="checkVerb" type="radio" name='pos' value="v" data-bs-toggle="collapse" href="#collapseVerb" {{$word->pos=='v'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkVerb"><b>Verb</b></label>
                    </div>
                    <div class="collapse show" id="collapseVerb">
                        <div class="card my-2 p-2">
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="presentVerb" value="vs" {{$word->verb=='vs'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="presentVerb">Present Verb</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="pastVerb" value="vt" {{$word->verb=='vt'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="pastVerb">Past Verb</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="verbInfinitive" value="vi" {{$word->verb=='vi'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbInfinitive">Infinitive Verb</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="verbProper" value="va" {{$word->verb=='va'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbProper">Auxiliary Verb</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="verbPresentCopula" value="vsc" {{$word->verb=='vsc'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbPresentCopula">Present Copula Verb</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="verbPastCopula" value="vtc" {{$word->verb=='vtc'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="verbPastCopula">Past Copula Verb</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="verb" id="futureParticle" value="pf" {{$word->verb=='pf'?'checked':''}}>
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="futureParticle">Future Particle</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" id="checkPronoun" type="radio" name='pos' value="p" data-bs-toggle="collapse" href="#collapsePronoun" {{$word->pos=='p'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkPronoun"><b>Pronoun</b></label>
                    </div>
                    <div class="collapse {{$word->pos=='p'?'show':''}}" id="collapsePronoun">
                        <div class="card my-2 p-2">
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="personalNoun" value="vs">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="personalNoun">Personal Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="possessivePronoun" value="vt">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="possessivePronoun">Possessive Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="demPronoun" value="vi">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="demPronoun">Demonstrative Pronoun</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="indPronoun" value="va">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="indPronoun">Indefinite Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="refPrnoun" value="vsc">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="refPrnoun">Reflexive Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="recPronoun" value="vtc">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="recPronoun">Reciprocal Pronoun</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="intPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="intPronoun">Intensive Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="interrPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="interrPronoun">Interrogative Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="relPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="relPronoun">Relative Pronoun</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="direcPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="direcPronoun">Directional Pronoun

                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="cliticPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="cliticPronoun">Clitic Pronoun</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pronoun" id="distPronoun" value="pf">
                                            <label class="form-check-label pb-1 ps-2 pe-4" for="distPronoun">Distributive Pronoun</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" id="checkPre" type="radio" name='pos' value="pre" {{$word->pos=='pre'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkPre"><b>Preposition</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkPost" type="radio" name='pos' value="post" {{$word->pos=='post'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkPost"><b>Postposition</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkNum" type="radio" name='pos' value="num" {{$word->pos=='num'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkNum"><b>Numeral</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkInt" type="radio" name='pos' value="int" {{$word->pos=='int'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkInt"><b>Interjection
                            </b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkConj" type="radio" name='pos' value="conj" {{$word->pos=='conj'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkConj"><b>Conjunction
                            </b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkAdv" type="radio" name='pos' value="adv" {{$word->pos=='adv'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdv"><b>Adverb</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkAdj" type="radio" name='pos' value="adj" {{$word->pos=='adj'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdj"><b>Adjectives</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkFw" type="radio" name='pos' value="fw" {{$word->pos=='fw'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkFw"><b>Foreign Word</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkAbb" type="radio" name='pos' value="abb" {{$word->pos=='abb'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkAbb"><b>Abbreviation</b></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="checkSym" type="radio" name='pos' value="sym" {{$word->pos=='sym'?'checked':''}}>
                        <label class="form-check-label pb-1 ps-2 pe-4" for="checkSym"><b>Symbol</b></label>
                    </div> --}}
                            <input type="hidden" name="id" value="{{ $word->id }}">
                            <input type="hidden" name="word" value="{{ $word->word }}">
                            <hr>
                            <div class="row justify-content-md-end">
                                <div class="col-lg-7"></div>
                                <div class="col-3  d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary">Save and Next</button>
                                </div>
                                <div class="col-2 d-grid mx-auto">
                                    <a href="{{ route('skip', ['id' => $word->id]) }}" class="btn btn-warning">Skip</a>
                                </div>
                            </div>
                        </form>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title w-100 fw-bold">{{ $word->word }}</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="wordForm" action="{{ route('addhomograph') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label for="message-text" class="col-form-label">Meaning</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-2">
                                                <label for="recipient-name" class="col-form-label">Roman</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="mb-2">
                                                <label for="message-text" class="col-form-label">Stem</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                        </div>
                                        <input type="hidden" name="word_id" value="{{ $word->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"
                                                data-bs-dismiss="modal">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
