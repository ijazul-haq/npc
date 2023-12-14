<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Editing;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
 {

    public function dashboard() {
        // $words = Word::all();
        $words = Word::simplePaginate( 20 );
        return view( 'admin.dashboard', [ 'words'=>$words ] );
    }

}
