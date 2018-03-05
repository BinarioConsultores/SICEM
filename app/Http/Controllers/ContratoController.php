<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;

class ContratoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
    }
    public function postComprarNicho(Request $request)
    {
        $this->validate($request, [
            'paso' => 'required',
        ]);

       session(['paso' => $request->get('paso')]);
        
        return view('layouts.blank');
    }
}