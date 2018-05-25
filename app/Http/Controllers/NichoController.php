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
use sicem\ServicioExtra;


class NichoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       
    }

    public function getVerNicho(Request $request)
    {
        $this->validate($request, [
            'nicho_id' => 'required',
        ]);
        $now = Carbon::now();
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        
        $usuarios = User::where('tipo','administrador')->get();
        if ($nicho->nicho_est == "libre"){
            return view('gerencia.nicho.comprar',['nicho'=>$nicho, 'usuarios'=>$usuarios]);
        }
        if ($nicho->nicho_est == "tramite"){
            
            $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->where('cont_estado','tramite')->get()[0];

            $planpagos = PlanPago::where('conv_id',$contrato->Convenio->conv_id)->orderBy('ppago_fechaven')->get();
            return view('gerencia.nicho.tramite',['contrato'=>$contrato,'nicho'=>$nicho,'planpagos'=>$planpagos,'now'=>$now]);
        }
        if ($nicho->nicho_est == "ocupado") {

            $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->where('cont_estado','<>','fenecido')->get()[0];
            $serviciosextra = \DB::select("SELECT * FROM t_servicioextra WHERE t_servicioextra.sextra_id NOT IN (SELECT cs.sextra_id FROM t_csextra cs WHERE cs.cont_id = '$contrato->cont_id')");
            
            $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
            $planpagos = PlanPago::where('conv_id',$contrato->Convenio->conv_id)->orderBy('ppago_fechaven')->get();
            return view('gerencia.nicho.mostrar',['nicho'=>$nicho,'contrato'=>$contrato,'now'=>$now,'planpagos'=>$planpagos,'serviciosextra'=>$serviciosextra]);
        }
        else{
            return "Contacte al administrador para ver este nicho";       
        }
    }

    public function getVerNichoAdmin(Request $request){
        $this->validate($request, [
            'nicho_id' => 'required',
        ]);

        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        
        return view('nicho.mostrar',['nicho'=>$nicho]);
    }
}