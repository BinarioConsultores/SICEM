<?php

namespace sicem\Http\Controllers;

use Illuminate\Http\Request;
use sicem\Contrato;
use sicem\CSExtra;
use sicem\Boleta;
use sicem\BoletaDetalle;
use sicem\Nicho;
use sicem\PlanPago;
use sicem\Traslado;
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
    public function postPagarCuotas(Request $request){
    	$this->validate($request, [
            'bol_nro' => 'required',
            'bol_dni' => 'required',
            'bol_nom' => 'required',
            'bol_fecha' => 'required',
        ]);

    	$conv_id = $request->get('conv_id');
        
        if ($request->has('ppagos')) {
        	\DB::transaction(function() use ($request){
	    		$boleta = new Boleta($request->all());
	        	$boleta->save();
	        	$ppagos = $request->get('ppagos');

	        	foreach ($ppagos as $i => $ppago_id) {
	        		$planpago = PlanPago::findOrFail($ppago_id);
	        		$planpago->ppago_saldocuota = 0;
	        		$planpago->save();

	        		$boletadetalle = new BoletaDetalle();
	        		$boletadetalle->bolde_concepto = 'Pago de Cuota';
	        		$boletadetalle->bolde_monto = $planpago->ppago_montocuota;
	        		$boletadetalle->bol_id = $boleta->bol_id;
	        		$boletadetalle->save();

	        		$bdppago = new BDPPago();
	        		$bdppago->ppago_id = $planpago->ppago_id;
	        		$bdppago->bolde_id = $boletadetalle->bolde_id;
	        		$bdppago->save();

	        	}
			});
        }
        else{
    		return "error, los pagos no pudieron ser procesados - contacte al administrador del sistema";    	
        }
    	
      return redirect('/caja/buscar/detalles?conv_id='.$conv_id);
        
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
    		if ($request->has('contratos')) {
	    		if (sizeof($contratos)>0) {
	    			foreach ($contratos as $i => $cont_id){
			    		$contrato = new Contrato();
			    		$contrato = Contrato::findOrFail($cont_id);
			    		
			    		$nicho = Nicho::findOrFail($contrato->Nicho->nicho_id);
			    		if ($contrato->cont_tipopago == "contado") {

			    			$traslados = Traslado::where('cont_id_nue',$contrato->cont_id)->where('tras_est','ttramite')->get();
			    			if (sizeof($traslados)>0) {
			    				$traslado = new Traslado;
			    				$traslado = $traslados[0];
			    				$nicho_antiguo = Nicho::findOrFail($traslado->ContratoAnt->Nicho->nicho_id);
				    			$nicho_antiguo->nicho_est = 'ltraslado';
				    			$nicho_antiguo->save();
			    			}

			    			
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

			    				$traslados = Traslado::where('cont_id_nue',$contrato->cont_id)->where('tras_est','ttramite')->get();
				    			if (sizeof($traslados)>0) {
				    				$traslado = new Traslado;
				    				$traslado = $traslados[0];
				    				$nicho_antiguo = Nicho::findOrFail($traslado->ContratoAnt->Nicho->nicho_id);
					    			$nicho_antiguo->nicho_est = 'ltraslado';
					    			$nicho_antiguo->save();
				    			}


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
    		}
    		if ($request->has('csextras')) {
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
	    	
    	}
    	return view('caja.compraexitosa');
    }
}
