<?php

namespace App\Http\Controllers\ulbtoiletmaps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UlbtoiletMapController extends Controller
{
    public function index(Request $request)
    {
        return view('ulbtoiletmaps/viewmap');
    }
}
