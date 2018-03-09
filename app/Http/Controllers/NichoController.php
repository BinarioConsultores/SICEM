<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;
use sicem\User;

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
        $usuarios = User::where('tipo','administrador')->get();
        if ($nicho->nicho_est == "libre") {
            return view('gerencia.nicho.comprar',['nicho'=>$nicho, 'usuarios'=>$usuarios]);
        }
        return view('gerencia.nicho.mostrar',['nicho'=>$nicho]);
    }

    public function getVerNichoAdmin(Request $request)
    {
        $this->validate($request, [
            'nicho_id' => 'required',
        ]);

        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        
        return view('nicho.mostrar',['nicho'=>$nicho]);
    }
}