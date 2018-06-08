<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;
use sicem\Solicitante;
use sicem\Difunto;
use Carbon\Carbon;
use sicem\Contrato;
use sicem\Convenio;
use sicem\PlanPago;
use sicem\Pabellon;
use sicem\CSExtra;
use sicem\User;
use sicem\ServicioExtra;
use sicem\Cementerio;
use sicem\Traslado;

class TrasladoController extends Controller
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

    public function postEliminarTraslado(Request $request){
        $this->validate($request, [
            'tras_id' => 'required',
            'pab_id' => 'required',
        ]);
        $traslado = Traslado::findOrFail($request->get('tras_id'));
        $pabellon = Pabellon::findOrFail($request->get('pab_id'));


        $contrato_ant = Contrato::findOrFail($traslado->cont_id_ant);
        $contrato_nue = Contrato::findOrFail($traslado->cont_id_nue);

        if ($contrato_nue->cont_tipopago == "credito") {
            \DB::transaction(function() use ($contrato_nue,$traslado,$contrato_ant){
                $cont_id = $contrato_nue->cont_id;
                $sol_id = $contrato_nue->sol_id;
                $dif_id = $contrato_nue->dif_id;
                $conv_id = $contrato_nue->conv_id;
                $traslado->delete();
                $contrato_nue->delete();
                $planPagos = PlanPago::where('conv_id',$conv_id)->delete();
                if (Contrato::where('cont_id','!=',$cont_id)->where('sol_id',$sol_id)->count() == 0) {
                    Solicitante::where('sol_id',$sol_id)->delete();
                }
                if (Contrato::where('cont_id','!=',$cont_id)->where('dif_id',$dif_id)->count() == 0) {
                    Difunto::where('dif_id',$dif_id)->delete();
                }
                $nicho = $contrato_nue->Nicho;
                $nicho->nicho_est = 'libre';
                $nicho->save();
                Convenio::where('conv_id',$conv_id)->delete();
                $nicho_ant = $contrato_ant->Nicho;
                $nicho_ant->nicho_est = 'ocupado';
                $nicho_ant->save();
            });
        }
        else{
            if ($contrato_nue->cont_tipopago == "contado") {

                \DB::transaction(function() use ($contrato_nue,$traslado,$contrato_ant){
                    
                    $cont_id = $contrato_nue->cont_id;
                    $sol_id = $contrato_nue->sol_id;
                    $dif_id = $contrato_nue->dif_id;
                    $traslado->delete();
                    $contrato_nue->delete();
                    if (Contrato::where('cont_id','!=',$cont_id)->where('sol_id',$sol_id)->count() == 0) {
                        Solicitante::where('sol_id',$sol_id)->delete();
                    }
                    if (Contrato::where('cont_id','!=',$cont_id)->where('dif_id',$dif_id)->count() == 0) {
                        Difunto::where('dif_id',$dif_id)->delete();
                    }
                    $nicho = $contrato_nue->Nicho;
                    $nicho->nicho_est = 'libre';
                    $nicho->save();
                    $nicho_ant = $contrato_ant->Nicho;
                    $nicho_ant->nicho_est = 'ocupado';
                    $nicho_ant->save();
                });  
            }
        }

        $pab_id=$request->get('pab_id');
        $nrofil = $pabellon->pab_nrofil;
        $nrocol = $pabellon->pab_nrocol;
        $nichos[0][0]=0;

        for($i=1;$i<=$nrofil;$i++)
        {
            for($j=1;$j<=$nrocol;$j++)
            {
                $nichos[$i-1][$j-1]=Nicho::where('pab_id',$pab_id)->where('nicho_fila',$i)->where('nicho_col',$j)->get()[0];
            }
        }

        return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('eliminado', 'Traslado Eliminado de Manera Correcta');
        //return view('caja.compraexitosa');

    }
}

