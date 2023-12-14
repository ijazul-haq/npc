<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Editing;
use App\Models\Sentiment;
use App\Models\Vulgar;
use App\Models\Ner;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use Session;


class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        // $words = Word::all();
        $words = Word::simplePaginate(20);
        return view('home');
    }

    public function edited(){
        // $words = Word::all();
        $words = Word::where('status', 2)->get();
        return view('admin/words/edited', ['words' => $words]);
    }
    public function loaded(){
        // $words = Word::all();
        $words = Word::where('status', 1)->get();
        return view('admin/words/loaded', ['words' => $words]);
    }
    public function untouched(){
        // $words = Word::all();
        $words = Word::where('status', 0)->paginate(30);
        // $words = Word::where( 'status', 0)->get();
        return view('admin/words/untouched', ['words' => $words]);
    }

    public function editword(Request $request){
        $validators = Validator::make($request->all(),[
            'id' => 'required',
            'roman'=>'required',
            'word'=>'required',
            'meaning'=>'required',
        ]);
        // $errors = $request->validate([
        //     'id' => 'required',
        //     'roman'=>'required',
        //     'word'=>'required',
        //     'meaning'=>'required',
        // ]);
        if($validators->fails()){
            $word = Word::where('id', $request->id)->first();
            return view('edit', ['word'=>$word])->withErrors($validators);
        }
        $record = $request->all();
        if(isset($record['postype'])){
            $record['pos'] = $record['postype'];
            unset($record['postype']);
        }
        
        // unset($record['postype']);
        unset($record['_token']);
        $record['status'] = 2;
        $word = Word::where('id', $request->id)->update($record);
        if ($word) {
            $edit = [
                'word_id' => $request->id,
                'user_id' => auth()->user()->id,
            ];
            $editing = Editing::Create($edit);
        };
        // Word::where( 'id', $request->id )->update( [ 'status'=>2 ] );

        $sentiment_class = $record['sentiment'];
        $Vulgar_class = $record['vulgar'];
        $ner_class = $record['ner'];
        $sentiment['word_id'] = $record['id'];
        $sentiment['word'] = $record['word'];
        // $sentiment[$sentiment_class] = 1;

        // dd($sentiment);
        // DB::table('sentiments')->upsert($sentiment, ['word_id', 'word']);
        Sentiment::updateOrCreate(['word_id'=>$record['id']], ['word'=>$record['word']]);
        if(isset($sentiment_class)){

            Sentiment::where('word_id', $record['id'])->increment($sentiment_class);
        }
        
        Vulgar::updateOrCreate(['word_id'=>$record['id']], ['word'=>$record['word']]);
        if($Vulgar_class){
            Vulgar::where('word_id', $record['id'])->increment($Vulgar_class);
        }

        Ner::updateOrCreate(['word_id'=>$record['id']], ['word'=>$record['word']]);
        if($ner_class){
            Ner::where('word_id', $record['id'])->increment($ner_class);
        }

        Session::flash('status', 'Task was successfull!'); 
        return redirect('/edit');
    }

    public function updateWord(Request $request){
        $validator = $request->validate([
            'id' => 'required'
        ]);
        $record = $request->all();
        unset($record['_token']);
        $word = Word::where('id', $request->id)->update($record);

        session()->flash('message', 'Updated successfully!');
        return redirect('/admin/dashboard');
    }

    public function skip(Request $request, $id){
        $word = Word::where('id', $id)->update( [ 'status'=>0 ] );
        return redirect('/edit');
    }

    public function addword(){
        return view('addword');
    }

    public function create(Request $request){
        $request->validate( [
            'word' => ['required', 'unique:words', 'max:255'],
            'meaning' => ['required'],
            'roman' => ['required'],
        ]);
        $record = $request->all();
        if(!$record['pos']){
            $record['pos'] = $record['postype'];
        }
        unset($record['postype']);
        $editing = Word::Create($record);
        Session::flash('status', 'Created successfully'); 
        return redirect('/addword');
    }

    public function store(StoreWordRequest $request){
    }

    public function show($id){
        $word = Word::where('id', $id)->first();
        return view('admin/words/word', ['word' => $word]);
    }

    public function edit(Word $word){
        // $word = Word::where('id', 4)->first();
        $word = Word::where('status', 0)->where('removed', 0)->inRandomOrder()->first();
        return view('edit', ['word' => $word]);
    }

    public function update($id){
        $word = Word::where('id', $id)->update(['removed' => 1]);
        return redirect('/edit');
    }

    public function destroy(Word $word){}
}
