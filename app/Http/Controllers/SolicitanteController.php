<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Solicitante;

class SolicitanteController extends Controller
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
    public function getAjaxObtenerSolicitantesPorNombre(Request $request)
    {
        $this->validate($request, [
            'sol_nombre' => 'required',
        ]);
        $sol_nombre = $request->get('sol_nombre');
        $solicitantes = Solicitante::where('sol_nombre','like', '%' . $sol_nombre . '%')->get();

        return $solicitantes;
    }
    public function getAjaxObtenerSolicitantesPorDNI(Request $request)
    {
        $this->validate($request, [
            'sol_dni' => 'required',
        ]);
        $sol_dni = $request->get('sol_dni');
        $solicitantes = Solicitante::where('sol_dni','like', '%' . $sol_dni . '%')->get();

        return $solicitantes;
    }
    

}