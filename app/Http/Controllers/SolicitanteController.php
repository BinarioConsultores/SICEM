<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Solicitante;
use sicem\Contrato;
use sicem\PlanPago;
use sicem\Nicho;
use Carbon\Carbon;

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
    public function postEditarSolicitante(Request $request){
        $this->validate($request, [
            'sol_id' => 'required',
            'sol_dni' => 'required',
            'sol_nombre' => 'required',
            'sol_dir' => 'required',
            'sol_telefono' => 'required',
            'nicho_id' => 'required',
        ]);
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        $now = Carbon::now();

        $solicitante = Solicitante::findOrFail($request->get('sol_id'))->update($request->all());

        $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->where('cont_estado','<>','fenecido')->get()[0];
        $serviciosextra = \DB::select("SELECT * FROM t_servicioextra WHERE t_servicioextra.sextra_id NOT IN (SELECT cs.sextra_id FROM t_csextra cs WHERE cs.cont_id = '$contrato->cont_id')");
        
        $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
        $planpagos = PlanPago::where('conv_id',$contrato->Convenio->conv_id)->orderBy('ppago_fechaven')->get();
        return view('gerencia.nicho.mostrar',['nicho'=>$nicho,'contrato'=>$contrato,'now'=>$now,'planpagos'=>$planpagos,'serviciosextra'=>$serviciosextra])->with('editado', 'Solicitante editado exitosamente');

    }
}