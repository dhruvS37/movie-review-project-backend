<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function showInsertCastForm()
    {
        return view('cast');
    }

    public function insertCast(Request $request)
    {
        $cast = new Cast();

        $cast->cast_name = $request->input('cast');

        if ($cast->save())
            return response()->json(['message' => 'Cast Added successfully']);
        else
            return response()->json(['message' => 'An error ocuurs. Please try again!']);
    }
}
