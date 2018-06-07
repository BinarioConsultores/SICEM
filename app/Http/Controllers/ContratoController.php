<?php

namespace sicem\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use sicem\Nicho;
use sicem\Traslado;
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

    public function postEliminarContrato(Request $request){
        $this->validate($request, [
            'cont_id' => 'required',
            'pab_id' => 'required',
        ]);
        $contrato = Contrato::findOrFail($request->get('cont_id'));
        $pabellon = Pabellon::findOrFail($request->get('pab_id'));

        if ($contrato->cont_tipopago == "credito") {
            \DB::transaction(function() use ($contrato){
                $cont_id = $contrato->cont_id;
                $sol_id = $contrato->sol_id;
                $dif_id = $contrato->dif_id;
                $conv_id = $contrato->conv_id;
                $contrato->delete();
                $planPagos = PlanPago::where('conv_id',$conv_id)->delete();
                if (Contrato::where('cont_id','!=',$cont_id)->where('sol_id',$sol_id)->count() == 0) {
                    Solicitante::where('sol_id',$sol_id)->delete();
                }
                if (Contrato::where('cont_id','!=',$cont_id)->where('dif_id',$dif_id)->count() == 0) {
                    Difunto::where('dif_id',$dif_id)->delete();
                }
                $nicho = $contrato->Nicho;
                $nicho->nicho_est = 'libre';
                $nicho->save();
                Convenio::where('conv_id',$conv_id)->delete();
                
            });
        }else{
            if ($contrato->cont_tipopago == "contado") {

                \DB::transaction(function() use ($contrato){
                    
                    $cont_id = $contrato->cont_id;
                    $sol_id = $contrato->sol_id;
                    $dif_id = $contrato->dif_id;
                    $contrato->delete();
                    if (Contrato::where('cont_id','!=',$cont_id)->where('sol_id',$sol_id)->count() == 0) {
                        Solicitante::where('sol_id',$sol_id)->delete();
                    }
                    if (Contrato::where('cont_id','!=',$cont_id)->where('dif_id',$dif_id)->count() == 0) {
                        Difunto::where('dif_id',$dif_id)->delete();
                    }
                    $nicho = $contrato->Nicho;
                    $nicho->nicho_est = 'libre';
                    $nicho->save();
                    

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

        return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('eliminado', 'Contrado Eliminado de Manera Correcta');
        //return view('caja.compraexitosa');

    }

    public function postSolicitarSextra(Request $request){
        $this->validate($request, [
            'cont_id' => 'required',
            'sextra_id' => 'required',
        ]);

        $contrato = Contrato::findOrFail($request->get('cont_id'));
        $sextra = ServicioExtra::findOrFail($request->get('sextra_id'));
        $csextra = new CSExtra();
        $csextra->cont_id = $contrato->cont_id;
        $csextra->sextra_id = $sextra->sextra_id;
        $csextra->bolde_id = 1;
        $csextra->save();
        return redirect()->action(
            'NichoController@getVerNicho', ['nicho_id' => $contrato->Nicho->nicho_id]
        );

    }

    public function postComprarNicho(Request $request){
        $this->validate($request, [
            'nicho_id' => 'required',
            'paso' => 'required',
        ]);
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        $usuarios = User::where('tipo','administrador')->get();
        /**
         * Si el paso es 1, debemos guardar en SESION, los datos del solicitante
         */
        
        if ($request->get('paso')==0) {
            session()->forget('difunto');
        }


        if ($request->get('paso')==1) {
            $this->validate($request, [
                'sol_nombre' => 'required',
                'sol_telefono' => 'required',
                'sol_dir' => 'required',
                'sol_dni' => 'required',
                'solselected' => 'required',
            ]);
            if ($request->get('solselected')==0) {
                $solicitante = new Solicitante();
                $solicitante->sol_nombre = $request->get('sol_nombre');
                $solicitante->sol_telefono = $request->get('sol_telefono');
                $solicitante->sol_dir = $request->get('sol_dir');
                $solicitante->sol_dni = $request->get('sol_dni');
                session(['solicitante.existe' => "no"]);
                session(['solicitante.sol' => $solicitante]);  
            }
            else{
                session(['solicitante.existe' => "si"]);
                session(['solicitante.sol_id' => $request->get('solselected')]);  
            }
            session(['paso' => 1]);
            return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
            
        }else {
            /**
             * Si el paso es 2, guardamos en SESION, los datos del difunto
             */
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
                return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
            }
            else{
                /**
                 * Si el paso es 3, guardamos el contrato como tal
                 */
                if ($request->get('paso')==3) {
                
                    $this->validate($request, [
                        'cont_fecha' => 'required',
                        'cont_tipopago' => 'required',
                        'cont_concepto' => 'required',
                        'cont_tipouso' => 'required',
                        'cont_tiempo' => 'required',
                        'cont_monto' => 'required',
                        'cont_diffechsep' => 'required',
                        'cont_estado' => 'required',
                        'nicho_id' => 'required',
                        'usu_id_auto' => 'required',
                    ]);

                    if ($request->get('cont_tipopago') == 'credito'){
                        if (!$request->has('conv_cuotaini') && !$request->has('conv_nrocuota')){
                            return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios])->with('error','Debe enviar los datos con cuota inicial y un número de cuotas');
                        }
                    }

                    $contrato = new Contrato();

                    /**
                     * Empezamos a crear el Solicitante si los datos del contrato son validados
                     *
                     * @var        Solicitante
                     */
                    if (session('solicitante.existe')=="no") {
                        $solicitante = new Solicitante();
                        $solicitante->sol_nombre = session('solicitante.sol')->sol_nombre;
                        $solicitante->sol_telefono = session('solicitante.sol')->sol_telefono;
                        $solicitante->sol_dir = session('solicitante.sol')->sol_dir;
                        $solicitante->sol_dni = session('solicitante.sol')->sol_dni;
                        $solicitante->save();
                        $contrato->sol_id = $solicitante->sol_id;      
                    }
                    else{
                        if (session('solicitante.existe')=="si") {
                            $contrato->sol_id=session('solicitante.sol_id');
                        }
                    }
                    $difunto = new Difunto();
                    $difunto->dif_nom = session('difunto')->dif_nom;
                    $difunto->dif_ape = session('difunto')->dif_ape;
                    $difunto->dif_dni = session('difunto')->dif_dni;
                    $difunto->dif_fechadef = session('difunto')->dif_fechadef;
                    $difunto->dif_obser = session('difunto')->dif_obser;

                    if ($difunto->save()) {
                        /**
                         * Si el Difunto es guardado, se crea el contrato
                         *
                         * @var        Contrato
                         */
                        $contrato->cont_fecha = $request->get('cont_fecha');
                        $contrato->cont_tipopago = $request->get('cont_tipopago');
                        $contrato->cont_concepto = "compra"; 
                        $contrato->cont_tipouso = $request->get('cont_tipouso');
                        $contrato->cont_tiempo = $request->get('cont_tiempo'); 
                        $contrato->cont_monto = $request->get('cont_monto');
                        $contrato->cont_estado = "tramite";
                        $contrato->cont_diffechsep = $request->get('cont_diffechsep');
                        $contrato->dif_id = $difunto->dif_id;
                        $contrato->nicho_id = $nicho->nicho_id;
                        $contrato->conv_id = 1;
                        $contrato->usu_id_reg = Auth::user()->id;
                        $contrato->usu_id_auto = $request->get('usu_id_auto');
                        $contrato->bolde_id = 1;
                        if ($contrato->cont_tipopago == "credito"){
                            if ($contrato->save()) {
                                $convenio = new Convenio();
                                $convenio->conv_fecha = Carbon::now();
                                $convenio->conv_cuotaini = $request->get('conv_cuotaini');
                                $convenio->conv_nrocuota = $request->get('conv_nrocuota');
                                
                                if ($convenio->save()){
                                    $contrato->conv_id = $convenio->conv_id;
                                    $contrato->save();

                                    $subtotal = 0;
                                    $subtotal=$contrato->cont_monto - $convenio->conv_cuotaini;
                                    $residuo=$subtotal%$convenio->conv_nrocuota;
                                    $cuotamensual=($subtotal-$residuo)/$convenio->conv_nrocuota;
                                    if($residuo>0){
                                        $xpricuota=$cuotamensual+1;
                                    }
                                    else{
                                        $xpricuota=$cuotamensual;
                                    }

                                    $now = Carbon::now();
                                    $dia_hoy = $now->day;
                                    $dia_hoyX = $dia_hoy;
                                    $mes_hoy = $now->month+1;
                                    $ano_hoy = $now->year; 

                                    $planPago = new PlanPago();
                                    $planPago->ppago_fechaven = Carbon::now();
                                    $planPago->ppago_nrocuota = 0;
                                    $planPago->ppago_montocuota = $convenio->conv_cuotaini;
                                    $planPago->ppago_saldocuota = $convenio->conv_cuotaini;
                                    $planPago->conv_id = $convenio->conv_id;
                                    $planPago->save();

                                    for($j=1; $j<=$convenio->conv_nrocuota; $j++){
                                        $planPago = new PlanPago();
                                        $planPago->ppago_nrocuota = $j;
                                         
                                        if($mes_hoy>12)
                                        {   
                                            $mes_hoy=1;
                                            $ano_hoy=$ano_hoy+1;
                                        }
                                        
                                        if (($dia_hoy== 31) &&($mes_hoy==4 || $mes_hoy==6 || $mes_hoy==9 || $mes_hoy==11 )) 
                                            $dia_hoyX = 30;
                                        
                                        if( $mes_hoy == 2 && $dia_hoy>27)
                                        {
                                        if (($dia_hoy==29 || $dia_hoy==30 || $dia_hoy==31) &&  (($ano_hoy % 4 == 0) && !($ano_hoy % 100 == 0 && $ano_hoy % 400!= 0)))
                                            $dia_hoyX = 29;
                                        else 
                                            $dia_hoyX = 28;
                                        }
                                        $planPago->ppago_fechaven = Carbon::create($ano_hoy, $mes_hoy, $dia_hoyX, 0, 0, 0);
                                        if($j<=$residuo)
                                        {
                                            $planPago->ppago_montocuota=round($xpricuota,0);
                                        }
                                        else
                                        {   
                                            $planPago->ppago_montocuota=round($cuotamensual,0);
                                        }
                                        $planPago->ppago_saldocuota = $planPago->ppago_montocuota; 
                                        $dia_hoyX = $dia_hoy;
                                        $mes_hoy=$mes_hoy+1;    
                                        $planPago->conv_id = $convenio->conv_id;
                                        $planPago->save();
                                    }

                                    $pabellon = new Pabellon();
                                    $pabellon = $nicho->Pabellon;
                                    $nrofil = $pabellon->pab_nrofil;
                                    $nrocol = $pabellon->pab_nrocol;
                                    $nichos[0][0]=0;
                                    $nicho->nicho_est = "tramite";
                                    $nicho->save();
                                    for($i=1;$i<=$nrofil;$i++){
                                        for($j=1;$j<=$nrocol;$j++){
                                          $nichos[$i-1][$j-1]=Nicho::where('pab_id',$pabellon->pab_id)->where('nicho_fila',$i)->where('nicho_col',$j)->get()[0];
                                        }
                                    }
                                    
                                    self::borrarSesion();
                                    return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('creado', 'Nicho Reservado de Manera Correcta');
                                }
                            }
                        }
                        else{
                            $pabellon = new Pabellon();
                            $pabellon = $nicho->Pabellon;
                            $nrofil = $pabellon->pab_nrofil;
                            $nrocol = $pabellon->pab_nrocol;
                            $nichos[0][0]=0;
                            $nicho->nicho_est = "tramite";
                            $nicho->save();
                            for($i=1;$i<=$nrofil;$i++){
                                for($j=1;$j<=$nrocol;$j++){
                                  $nichos[$i-1][$j-1]=Nicho::where('pab_id',$pabellon->pab_id)->where('nicho_fila',$i)->where('nicho_col',$j)->get()[0];

                                }
                            }
                            if ($contrato->save()) {
                                self::borrarSesion();
                                return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('creado', 'Nicho Reservado de Manera Correcta');
                            }
                        }
                    }
                }
            }
        }
        
        return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
        
    }

    public function postTrasladarDifunto(Request $request){


        if ($request->get('paso')==0) {

            $this->validate($request, [
                'sol_nombre' => 'required',
                'sol_telefono' => 'required',
                'sol_dir' => 'required',
                'sol_dni' => 'required',
                'solselected' => 'required',
                'cont_id' => 'required',
                'nicho_id' => 'required',
                'paso' => 'required',
            ]);

            $nicho = Nicho::findOrFail($request->get('nicho_id'));
            $usuarios = User::where('tipo','administrador')->get();
            $contrato = Contrato::findOrFail($request->get('cont_id'));

            if ($request->get('solselected')==0) {
                $solicitante = new Solicitante();
                $solicitante->sol_nombre = $request->get('sol_nombre');
                $solicitante->sol_telefono = $request->get('sol_telefono');
                $solicitante->sol_dir = $request->get('sol_dir');
                $solicitante->sol_dni = $request->get('sol_dni');
                session(['solicitante.existe' => "no"]);
                session(['solicitante.sol' => $solicitante]);  
            }
            else{
                session(['solicitante.existe' => "si"]);
                session(['solicitante.sol_id' => $request->get('solselected')]);  
            }
            session(['pasot' => 1]);
            return view('gerencia.nicho.trasladar', ['contrato'=>$contrato,'nicho'=>$nicho,'usuarios'=>$usuarios]);
            
        }else {
            /**
             * Si el paso es 1, se genera el contrato
             */
            
                if ($request->get('paso') == 1) {
                    $this->validate($request, [
                        'cont_id_ant' => 'required',
                        'cont_fecha' => 'required',
                        'cont_tipopago' => 'required',
                        'cont_concepto' => 'required',
                        'cont_tipouso' => 'required',
                        'cont_tiempo' => 'required',
                        'cont_monto' => 'required',
                        'cont_diffechsep' => 'required',
                        'cont_estado' => 'required',
                        'nicho_id' => 'required',
                        'usu_id_auto' => 'required',
                    ]);
                    $nicho = Nicho::findOrFail($request->get('nicho_id'));

                    if ($request->get('cont_tipopago') == 'credito'){
                        if (!$request->has('conv_cuotaini') && !$request->has('conv_nrocuota')){
                            return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios])->with('error','Debe enviar los datos con cuota inicial y un número de cuotas');
                        }
                    }

                    $contrato = new Contrato();
                    /**
                     * Empezamos a crear el Solicitante si los datos del contrato son validados
                     *
                     * @var        Solicitante
                     */
                    if (session('solicitante.existe')=="no") {
                        $solicitante = new Solicitante();
                        $solicitante->sol_nombre = session('solicitante.sol')->sol_nombre;
                        $solicitante->sol_telefono = session('solicitante.sol')->sol_telefono;
                        $solicitante->sol_dir = session('solicitante.sol')->sol_dir;
                        $solicitante->sol_dni = session('solicitante.sol')->sol_dni;
                        $solicitante->save();
                        $contrato->sol_id = $solicitante->sol_id;      
                    }
                    else{
                        if (session('solicitante.existe')=="si") {
                            $contrato->sol_id=session('solicitante.sol_id');
                        }
                    }

                    $contrato_antiguo = Contrato::findOrFail($request->get('cont_id_ant'));
                    
                    $contrato->cont_fecha = $request->get('cont_fecha');
                    $contrato->cont_tipopago = $request->get('cont_tipopago');
                    $contrato->cont_concepto = 'traslado'; 
                    $contrato->cont_tipouso = $request->get('cont_tipouso');
                    $contrato->cont_tiempo = $request->get('cont_tiempo'); 
                    $contrato->cont_monto = $request->get('cont_monto');
                    $contrato->cont_estado = "tramite";
                    $contrato->cont_diffechsep = $request->get('cont_diffechsep');
                    $contrato->dif_id = $contrato_antiguo->dif_id;
                    $contrato->nicho_id = $nicho->nicho_id;
                    $contrato->conv_id = 1;
                    $contrato->usu_id_reg = Auth::user()->id;
                    $contrato->usu_id_auto = $request->get('usu_id_auto');
                    $contrato->bolde_id = 1;
                    if ($contrato->cont_tipopago == "credito"){
                        if ($contrato->save()) {
                            $convenio = new Convenio();
                            $convenio->conv_fecha = Carbon::now();
                            $convenio->conv_cuotaini = $request->get('conv_cuotaini');
                            $convenio->conv_nrocuota = $request->get('conv_nrocuota');
                            
                            if ($convenio->save()){
                                $contrato->conv_id = $convenio->conv_id;
                                $contrato->save();

                                $subtotal = 0;
                                $subtotal=$contrato->cont_monto - $convenio->conv_cuotaini;
                                $residuo=$subtotal%$convenio->conv_nrocuota;
                                $cuotamensual=($subtotal-$residuo)/$convenio->conv_nrocuota;
                                if($residuo>0){
                                    $xpricuota=$cuotamensual+1;
                                }
                                else{
                                    $xpricuota=$cuotamensual;
                                }

                                $now = Carbon::now();
                                $dia_hoy = $now->day;
                                $dia_hoyX = $dia_hoy;
                                $mes_hoy = $now->month+1;
                                $ano_hoy = $now->year; 

                                $planPago = new PlanPago();
                                $planPago->ppago_fechaven = Carbon::now();
                                $planPago->ppago_nrocuota = 0;
                                $planPago->ppago_montocuota = $convenio->conv_cuotaini;
                                $planPago->ppago_saldocuota = $convenio->conv_cuotaini;
                                $planPago->conv_id = $convenio->conv_id;
                                $planPago->save();

                                for($j=1; $j<=$convenio->conv_nrocuota; $j++){
                                    $planPago = new PlanPago();
                                    $planPago->ppago_nrocuota = $j;
                                     
                                    if($mes_hoy>12)
                                    {   
                                        $mes_hoy=1;
                                        $ano_hoy=$ano_hoy+1;
                                    }
                                    
                                    if (($dia_hoy== 31) &&($mes_hoy==4 || $mes_hoy==6 || $mes_hoy==9 || $mes_hoy==11 )) 
                                        $dia_hoyX = 30;
                                    
                                    if( $mes_hoy == 2 && $dia_hoy>27)
                                    {
                                    if (($dia_hoy==29 || $dia_hoy==30 || $dia_hoy==31) &&  (($ano_hoy % 4 == 0) && !($ano_hoy % 100 == 0 && $ano_hoy % 400!= 0)))
                                        $dia_hoyX = 29;
                                    else 
                                        $dia_hoyX = 28;
                                    }
                                    $planPago->ppago_fechaven = Carbon::create($ano_hoy, $mes_hoy, $dia_hoyX, 0, 0, 0);
                                    if($j<=$residuo)
                                    {
                                        $planPago->ppago_montocuota=round($xpricuota,0);
                                    }
                                    else
                                    {   
                                        $planPago->ppago_montocuota=round($cuotamensual,0);
                                    }
                                    $planPago->ppago_saldocuota = $planPago->ppago_montocuota; 
                                    $dia_hoyX = $dia_hoy;
                                    $mes_hoy=$mes_hoy+1;    
                                    $planPago->conv_id = $convenio->conv_id;
                                    $planPago->save();
                                }

                                $pabellon = new Pabellon();
                                $pabellon = $nicho->Pabellon;
                                $nrofil = $pabellon->pab_nrofil;
                                $nrocol = $pabellon->pab_nrocol;
                                $nichos[0][0]=0;
                                $nicho->nicho_est = "tramite";
                                $nicho->save();
                                for($i=1;$i<=$nrofil;$i++){
                                    for($j=1;$j<=$nrocol;$j++){
                                      $nichos[$i-1][$j-1]=Nicho::where('pab_id',$pabellon->pab_id)->where('nicho_fila',$i)->where('nicho_col',$j)->get()[0];
                                    }
                                }
                                
                                self::borrarSesion();
                                return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('creado', 'Nicho Reservado de Manera Correcta');
                            }
                        }
                    }
                    else{
                        $pabellon = new Pabellon();
                        $pabellon = $nicho->Pabellon;
                        $nrofil = $pabellon->pab_nrofil;
                        $nrocol = $pabellon->pab_nrocol;
                        $nichos[0][0]=0;
                        $nicho->nicho_est = "ttramite";
                        $nicho->save();
                        for($i=1;$i<=$nrofil;$i++){
                            for($j=1;$j<=$nrocol;$j++){
                              $nichos[$i-1][$j-1]=Nicho::where('pab_id',$pabellon->pab_id)->where('nicho_fila',$i)->where('nicho_col',$j)->get()[0];

                            }
                        }
                        if ($contrato->save()) {

                            $nicho_antiguo = Nicho::findOrFail($contrato_antiguo->nicho_id);
                            $nicho_antiguo->nicho_est = 'ttramite';
                            $nicho_antiguo->save();

                            $traslado = new Traslado();
                            $traslado->tras_fecha = Carbon::now();
                            $traslado->tras_est = 'ttramite';
                            $traslado->cont_id_ant = $contrato_antiguo->cont_id;
                            $traslado->cont_id_nue = $contrato->cont_id;
                            $traslado->save();

                            self::borrarSesion();
                            return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos])->with('creado', 'Traslado de Difunto reservado de Manera Correcta');
                        }
                    }
                }
        }
        
        return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
        
    }

    public function getAtras1($nicho_id){
        $usuarios = User::where('tipo','administrador')->get();
        $nicho = Nicho::findOrFail($nicho_id);
        session()->forget('solicitante');
        session()->forget('difunto');
        session(['paso' => 0]);
        return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
    }

    public function getAtras2($nicho_id){
        $usuarios = User::where('tipo','administrador')->get();
        $nicho = Nicho::findOrFail($nicho_id);
        session()->forget('difunto');
        session(['paso' => 1]);
        return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios'=>$usuarios]);
    }

    public function borrarSesion()
    {
        session()->forget('difunto');
        session()->forget('paso');
        session()->forget('pasot');
        session()->forget('solicitante');
    }

    public function postBuscar(Request $request)
    {
      $this->validate($request, [
            'busqueda' => 'required',
        ]);

        $busqueda = $request->get('busqueda'); 
        $contratos = \DB::select("SELECT c.*,s.*,d.* from t_contrato c,t_solicitante s, t_difunto d WHERE (c.sol_id = s.sol_id AND c.dif_id = d.dif_id) AND (s.sol_nombre LIKE '%$busqueda%' OR s.sol_dni LIKE '%$busqueda%' OR d.dif_nom LIKE '%$busqueda%' OR  d.dif_ape LIKE '%$busqueda%' OR d.dif_dni LIKE '%$busqueda%')");
        
        return $contratos;
    }

    public function getTraslado($cont_id)
    {
        session(['contrato' => $cont_id]);
        $cementerios = Cementerio::all();
        return view('gestion.gestion',['cementerios'=>$cementerios]);
    }
}

