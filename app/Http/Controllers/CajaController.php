<?php

namespace sicem\Http\Controllers;

use Illuminate\Http\Request;

class CajaController extends Controller
{
    

    public function getIndex()
    {
	    return view('layouts.appcaja');
    }

}
