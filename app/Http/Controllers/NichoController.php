<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;

class NichoController extends Controller
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
    public function getVerNicho(Request $request)
    {
        $this->validate($request, [
            'nicho_id' => 'required',
        ]);

        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        
        return view('gerencia.nicho.mostrar',['nicho'=>$nicho]);
    }
}