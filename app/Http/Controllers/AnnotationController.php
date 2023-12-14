<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class AnnotationController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function annotation() {
        $sentence = Checkup::orderBy('annotation_count', 'DESC' )->orderBy('id', 'ASC' )->first();
        // $sentence = Sentence::where('id','>', 72834)->where('status',0)->orderBy( 'id', 'ASC' )->first();

        // $sentence = Sentence::where( 'offensive', 1 )->where('status', 0)->orderBy( 'id', 'ASC' )->first();

        // $sentence = json_decode( $sentence, true );
        return view('annotation', [ 'checkup' => $sentence ]);
    }

    // public function edit( Request $request, $id ) {
    //     echo 'Hello=================';
    //     $data = json_encode( $request->checkup, JSON_UNESCAPED_UNICODE );
    //     $checkup = Checkup::where( 'id', $id )->update( [ 'annotation_count' => 1 ] );
    //     return json_encode( [ 'msg'=>'Success', 'status'=>200 ] );
    // }

    public function skip( Request $request, $id ) {
        $data = json_encode( $request->data, JSON_UNESCAPED_UNICODE );
        $checkup = Checkup::where( 'id', $id )->update( [ 'annotation_count' => 1 ] );
        return json_encode( [ 'msg'=>'Success', 'status'=>200 ] );
    }
    
    public function previouse( Request $request, $id ) {
        $data = json_encode( $request->sentence, JSON_UNESCAPED_UNICODE );
        $sentence = Sentence::where( 'id' , '<', $id )->orderBy('id', 'desc')->first();
        if(!$sentence){
            $sentence = Sentence::where('id', '>', 0)->orderBy('id', 'asc')->first();
        }
        return view( 'annotation', [ 'sentence' => $sentence ] );
    }

}
