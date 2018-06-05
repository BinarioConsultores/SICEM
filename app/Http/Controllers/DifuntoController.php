<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Difunto;
//use sicem\Solicitante;
use sicem\Contrato;
use sicem\PlanPago;
use sicem\Nicho;
use Carbon\Carbon;

class DifuntoController extends Controller
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
    
    public function postEditarDifunto(Request $request){
        $this->validate($request, [
            'dif_id' => 'required',
            'dif_dni' => 'required',
            'dif_nom' => 'required',
            'dif_ape' => 'required',
            'dif_fechadef' => 'required',
            'dif_obser' => 'required',
            'nicho_id' => 'required',
        ]);
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        $now = Carbon::now();

        $difunto = Difunto::findOrFail($request->get('dif_id'))->update($request->all());

        $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->where('cont_estado','<>','fenecido')->get()[0];
        $serviciosextra = \DB::select("SELECT * FROM t_servicioextra WHERE t_servicioextra.sextra_id NOT IN (SELECT cs.sextra_id FROM t_csextra cs WHERE cs.cont_id = '$contrato->cont_id')");
        
        $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
        $planpagos = PlanPago::where('conv_id',$contrato->Convenio->conv_id)->orderBy('ppago_fechaven')->get();
        return view('gerencia.nicho.mostrar',['nicho'=>$nicho,'contrato'=>$contrato,'now'=>$now,'planpagos'=>$planpagos,'serviciosextra'=>$serviciosextra])->with('editado', 'Difunto editado exitósamente');

    }
}