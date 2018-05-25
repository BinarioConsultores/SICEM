<?php

namespace sicem\Http\Controllers;

use Illuminate\Http\Request;
use sicem\Contrato;
use sicem\CSExtra;
use sicem\Boleta;
use sicem\BoletaDetalle;
use sicem\Nicho;
use sicem\PlanPago;
use sicem\BDPPago;

class CajaController extends Controller
{
    public function getIndex(){
	    return view('layouts.appcaja');
    }

    public function getPagosPendientes(Request $request){
    	$csextras = CSExtra::where('bolde_id','1')->get();
    	$contratos = Contrato::where('cont_estado','tramite')->get();
    	return view('caja.pagospendientes',['contratos'=>$contratos, 'csextras'=>$csextras]);
    }
    public function postPagarPagosPendientes(Request $request){
    	$this->validate($request, [
            'bol_nro' => 'required',
            'bol_dni' => 'required',
            'bol_nom' => 'required',
            'bol_fecha' => 'required',
        ]);
    	$contratos = $request->get('contratos');
    	$csextras = $request->get('csextras');
    	$boleta = new Boleta($request->all());
    	if ($boleta->save()) {
    		if (sizeof($contratos)>0) {
    			foreach ($contratos as $i => $cont_id){
		    		$contrato = new Contrato();
		    		$contrato = Contrato::findOrFail($cont_id);
		    		
		    		$nicho = Nicho::findOrFail($contrato->Nicho->nicho_id);
		    		if ($contrato->cont_tipopago == "contado") {
		    			$boletadetalle = new BoletaDetalle();
		    			$boletadetalle->bolde_concepto = "Compra de nicho al contado";
		    			$boletadetalle->bolde_monto = $contrato->cont_monto;
		    			$boletadetalle->bol_id = $boleta->bol_id;
		    			$boletadetalle->save();
		    			$contrato->cont_estado = "realizado";
		    			$nicho->nicho_est = "ocupado";
		    			$nicho->save();
		    			$contrato->save();
		    		}
		    		else{
		    			if ($contrato->cont_tipopago == "credito") {
		    				$boletadetalle = new BoletaDetalle();
			    			$boletadetalle->bolde_concepto = "Compra de nicho al credito - Cuota inicial";
			    			$boletadetalle->bolde_monto = $contrato->Convenio->conv_cuotaini;
			    			$boletadetalle->bol_id = $boleta->bol_id;
			    			$boletadetalle->save();

			    			$planpago = PlanPago::where('conv_id',$contrato->Convenio->conv_id)->where('ppago_nrocuota','0')->get()[0];
			    			$planpago->ppago_saldocuota = 0;
			    			$planpago->save();

			    			$bdppago = new BDPPago();
			    			$bdppago->ppago_id = $planpago->ppago_id;			    			
			    			$bdppago->bolde_id = $boletadetalle->bolde_id;
			    			$bdppago->save();
			    			
			    			$contrato->cont_estado = "realizado";
			    			$nicho->nicho_est = "ocupado";
		    				$nicho->save();
			    			$contrato->save();
		    			}
		    		}
		    	}
    		}
    		
	    	if (sizeof($csextras)>0) {
	    		foreach ($csextras as $j => $csextra_id){
		    		$csextra = new CSExtra();
		    		$csextra = CSExtra::findOrFail($csextra_id);
	    			$boletadetalle = new BoletaDetalle();
	    			$boletadetalle->bolde_concepto = "Servicio de ".$csextra->ServicioExtra->sextra_desc;
	    			$boletadetalle->bolde_monto = $csextra->ServicioExtra->sextra_costo;
	    			$boletadetalle->bol_id = $boleta->bol_id;
	    			$boletadetalle->save();
	    			$csextra->bolde_id = $boletadetalle->bolde_id;
	    			$csextra->save();
		    	}	
	    	}
    	}

    	return view('caja.compraexitosa');
		
    }

}
