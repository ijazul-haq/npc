<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\User;
use App\Models\Editing;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
 {

    public function index() {
        $users = User::where('id','!=' ,auth()->user()->id)->get();
        return view( 'users/users', [ 'users'=>$users ] );
    }

    public function store( Request $request ) {
        $validated = $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'role'=>'required',
            'password'=>'required|confirmed'
        ] );
        $password = Hash::make( $request->password );
        $record = $request->all();
        unset( $record[ '_token' ] );
        $record[ 'password' ] = $password;
        $user = User::create( $record );
        if ( $user ) {
            session()->flash( 'message', 'User successfully added.' );
            return redirect( '/adduser' );
        }
    }

    public function contributions($id){
        $conts = DB::table('editings')
        ->join('users', 'users.id', '=', 'editings.user_id')
        ->join('words', 'words.id', '=', 'editings.word_id')
        ->select('editings.*', 'users.email', 'users.name','words.rank' ,'words.word', 'words.meaning', 'words.stem', 'words.sentiment', 'words.vulgar')
        ->where('editings.user_id', '=',$id)
        ->get();
        return view('admin/users/contributions', ['conts'=>$conts]);
        // echo "<pre>";
        // print_r($conts);
    }

    public function getAddUserPage() {
        return view( 'users/add' );
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        return view('users/edit', ['user'=>$user]);
    }

    public function edit(Request $request){
        $validated = $request->validate( [
            'name' => 'required',
            'role'=>'required',
            'id'=>'required'
        ] );
        $record = $request->all();
        unset( $record[ '_token' ] );
        $user = User::where('id', $request->id)->update( $record );
        if ( $user ) {
            session()->flash( 'message', 'Successfully updated.' );
            return redirect( '/users' );
        }
    }

    public function destroy($id){
        User::where('id', $id)->delete();
        session()->flash( 'message', 'Successfully deleted.' );
        return redirect( '/users' );
    }
}
