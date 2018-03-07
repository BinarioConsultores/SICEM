<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;
use sicem\Solicitante;

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
            'nicho_id' => 'required',
            'paso' => 'required',
        ]);

        if ($request->get('paso')==1) {
            $this->validate($request, [
                'sol_nombre' => 'required',
                'sol_telefono' => 'required',
                'sol_dir' => 'required',
                'sol_dni' => 'required',
            ]);
            $solicitante = new Solicitante();
            $solicitante->sol_nombre = $request->get('sol_nombre');
            $solicitante->sol_telefono = $request->get('sol_telefono');
            $solicitante->sol_dir = $request->get('sol_dir');
            $solicitante->sol_dni = $request->get('sol_dni');
            session(['solicitante' => $solicitante]);
            session(['paso' => 1]);
        }else {
            if ($request->get('paso')==2) {
                $this->validate($request, [
                    'dif_nom' => 'required',
                    'dif_ape' => 'required',
                    'dif_dni' => 'required',
                    'dif_fechadef' => 'required',
                    'dif_obser' => 'required',
                ]);
                $difunto = new difunto();
                $difunto->dif_nom = $request->get('dif_nom');
                $difunto->dif_ape = $request->get('dif_ape');
                $difunto->dif_dni = $request->get('dif_dni');
                $difunto->dif_fechadef = $request->get('dif_fechadef');
                $difunto->dif_obser = $request->get('dif_obser');                
                session(['difunto' => $difunto]);
                session(['paso' => 2]);
            }
        }

        $nicho = Nicho::findOrFail($request->get('nicho_id'));
    
        return view('gerencia.nicho.comprar',['nicho'=>$nicho]);
        
        
    }
}