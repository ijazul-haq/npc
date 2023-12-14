<?php


namespace App\Http\Controllers;

use App\Models\Homograph;
use Illuminate\Http\Request;

class HomographController extends Controller
{
    public function create(Request $request)
    {

        $record = $request->all();
        unset($record['_token']);
        $hg = Homograph::Create($record);
        return redirect('/edit');
    }
}
