<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Contrato;
use sicem\Convenio;
use sicem\PlanPago;
use carbon\carbon;

class PlanPagoController extends Controller
{
    //
    public function getIndex()
    {
        $now = Carbon::now();

        $contrato = Contrato::all();
        $planpago = \DB::select("SELECT * FROM t_planpago WHERE ppago_fechaven > 0 and ppago_saldocuota>0 GROUP BY 'conv_id'");
        $planpagos = PlanPago::hydrate($planpago);
        return view('gerencia.deudas.deudas',['planpagos'=>$planpagos]);
    }
    public function getDetalleDeuda(Request $request)
    {
        $this->validate($request, [
            'conv_id' => 'required',
        ]);
        $now = Carbon::now();
        $conv_id=$request->get('conv_id');
        $planpago = PlanPago::where('conv_id',$conv_id)->orderBy('ppago_fechaven')->get();
        $contrato = Contrato::where('conv_id',$conv_id)->get()[0];
        return view('gerencia.deudas.detalle',['planpago'=>$planpago,'now'=>$now,'contrato'=>$contrato]);
 
    }
}
