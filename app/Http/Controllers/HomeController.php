<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        if(Auth::user()->tipo=='administrador'){
            return view('home');
        }else{
            if (Auth::user()->tipo=='gerencia') {
                return view('homegerencia');
            }
            if (Auth::user()->tipo=='caja') {
                return view('homecaja');
            }
            else{
                $this->guard()->logout();
            }
        }
        
    }
}