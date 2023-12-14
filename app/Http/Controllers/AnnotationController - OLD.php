<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Sentence;
use App\Models\Editing;
use App\Models\Sentiment;
use App\Models\Vulgar;
use App\Models\Homograph;
use App\Models\Ner;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class AnnotationController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function annotation() {

        $sentence = Sentence::where('status',0)->orderBy( 'id', 'ASC' )->first();
        // $sentence = Sentence::where('id','>', 72834)->where('status',0)->orderBy( 'id', 'ASC' )->first();

        // $sentence = Sentence::where( 'offensive', 1 )->where('status', 0)->orderBy( 'id', 'ASC' )->first();

        // $sentence = json_decode( $sentence, true );
        return view( 'annotation', [ 'sentence' => $sentence ] );
    }

    public function edit( Request $request, $id ) {
        $data = json_encode( $request->sentence, JSON_UNESCAPED_UNICODE );
        $homoGraphs = json_encode( $request->homographs, JSON_UNESCAPED_UNICODE );
        $homoGraphs = json_decode($homoGraphs, JSON_UNESCAPED_UNICODE);

        // return;
        $sentence = Sentence::where( 'id', $id )->update( [ 'sentence' => $data, 'status'=>$request->status, 'edited_by'=>$request->edited_by ] );
        
        // for ($i=0; $i < count($homoGraphs); $i++) { 
        //     # code...

        // }
        Homograph::insert($homoGraphs);
        return json_encode( [ 'msg'=>'Success', 'status'=>200 ] );
    }

    public function skip( Request $request, $id ) {
        $data = json_encode( $request->sentence, JSON_UNESCAPED_UNICODE );
        // return;
        $sentence = Sentence::where( 'id', $id )->update( [ 'status' => 1 ] );
        return json_encode( [ 'msg'=>'Success', 'status'=>200 ] );
    }

    public function changeAllTags(Request $request){
        // $data = json_encode( $request->word, JSON_UNESCAPED_UNICODE );
        $userId = Auth::user()->id;
        $wordToReplace = $request->word;
        print_r($wordToReplace['word']);
        $sentences = Sentence::where('sentence', 'like', '%'.$wordToReplace['word'].'%')->get();
        for ($i=0; $i < count($sentences); $i++) { 
            $editors = explode(',',$sentences[$i]->edited_by);
            $newEditors = $sentences[$i]->edited_by===''?$userId:(!in_array($userId, $editors)?$sentences[$i]->edited_by.','.$userId:$sentences[$i]->edited_by);
            $words = json_decode($sentences[$i]->sentence, JSON_UNESCAPED_UNICODE);
            foreach ($words as &$word) {
                # code...
                if($word[0] === $wordToReplace['word']){
                    $word[1] = $wordToReplace['tag'];
                };
            }
            $words = json_encode($words, JSON_UNESCAPED_UNICODE);
            $updated = Sentence::where('id', $sentences[$i]->id)->update(['sentence'=>$words, 'edited_by'=>$newEditors]);
        }
        return json_encode(["data"=>$sentences],  JSON_UNESCAPED_UNICODE);
    }

    public function search(Request $request){
        $search = $request->input('search');
        // $sentences = Sentence::where('sentence', 'like', '%"'.$search.'"%')->limit(200)->where('id','>',72833)->where('status',0)->get();
        // $sentences = Sentence::where('sentence', 'like', '%"'.$search.'"%')->whereRaw('status=0 AND (id<30000 OR (id>72833 AND id<90000))')->limit(300)->get();
        $sentences = Sentence::where('sentence', 'like', '%"'.$search.'"%')->limit(300)->get();
        // $sentences = Sentence::where('sentence', 'like', '%"'.$search.'"%')->whereRaw('status=0')->limit(200)->get();
        // $sentences = Sentence::where('sentence', 'like', '%'.$search.'%')->whereRaw('status=0')->limit(200)->get();
        
        // 72834

        return view('multannotation', ['sentences'=>$sentences, 'query'=>$search]);
    }
    public function next( Request $request, $id ) {
        $sentence = Sentence::where( 'id', '>', $id )->orderBy( 'id', 'asc' )->first();
        return view( 'annotation', [ 'sentence' => $sentence ] );
    }
    public function previouse( Request $request, $id ) {
        $data = json_encode( $request->sentence, JSON_UNESCAPED_UNICODE );
        // return;
        // $id = $id == 1 ? $id : $id;
        $sentence = Sentence::where( 'id' , '<', $id )->orderBy('id', 'desc')->first();
        if(!$sentence){
            $sentence = Sentence::where('id', '>', 0)->orderBy('id', 'asc')->first();
        }
        return view( 'annotation', [ 'sentence' => $sentence ] );
    }

    public function remove(Request $request, $id){
        $sentence = Sentence::where( 'id', $id )->update( [ 'status' => 5 ] );
        return json_encode( [ 'msg'=>'Success', 'status'=>200 ] );
    }

}
