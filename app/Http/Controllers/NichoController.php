<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;
use sicem\User;
use sicem\Contrato;
use sicem\Difunto;
use sicem\Solicitante;
use sicem\Convenio;
use sicem\PlanPago;
use Carbon\Carbon;
use sicem\CSExtra;


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
        $now = Carbon::now(); 
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        $usuarios = User::where('tipo','administrador')->get();
        $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
        $difunto  = Difunto::where('dif_id',$contrato->dif_id)->get()[0];
        $solicitante = Solicitante::where('sol_id',$contrato->sol_id)->get()[0];
        $CSExtras = CSExtra::where('cont_id',$contrato->cont_id)->get();
        if ($nicho->nicho_est == "libre") {
            return view('gerencia.nicho.comprar',['nicho'=>$nicho, 'usuarios'=>$usuarios]);
        }
        return view('gerencia.nicho.mostrar',['nicho'=>$nicho,'contrato'=>$contrato,'now'=>$now]);

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