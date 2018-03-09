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
use sicem\User;

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
    public function postComprarNicho(Request $request)
    {
        $this->validate($request, [
            'nicho_id' => 'required',
            'paso' => 'required',
        ]);
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
        $usuarios = User::where('tipo','administrador')->get();
        /**
         * Si el paso es 1, debemos guardar en SESION, los datos del solicitante
         */
        if ($request->get('paso')==1) {
            $this->validate($request, [
                'sol_nombre' => 'required',
                'sol_telefono' => 'required',
                'sol_dir' => 'required',
                'sol_dni' => 'required',
            ]);
            $solicitante = new Solicitante();
            $solicitante->sol_nombre = $request->get('sol_nombre');
            $solicitante->sol_telefono = $request->get('sol_telefono');
            $solicitante->sol_dir = $request->get('sol_dir');
            $solicitante->sol_dni = $request->get('sol_dni');
            session(['solicitante' => $solicitante]);
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
                        'conv_cuotaini' => 'required',
                        'conv_nrocuota' => 'required',
                    ]);
                    /**
                     * Empezamos a crear el Solicitante si los datos del contrato son validados
                     *
                     * @var        Solicitante
                     */
                    $solicitante = new Solicitante();
                    $solicitante->sol_nombre = session('solicitante')->sol_nombre;
                    $solicitante->sol_telefono = session('solicitante')->sol_telefono;
                    $solicitante->sol_dir = session('solicitante')->sol_dir;
                    $solicitante->sol_dni = session('solicitante')->sol_dni;
                    if ($solicitante->save()) {
                        /**
                         * Si el solicitante es creado de manera correcta, se crea el difunto
                         *
                         * @var        Difunto
                         */
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
                            $contrato = new Contrato();
                            $contrato->cont_fecha = $request->get('cont_fecha');
                            $contrato->cont_tipopago = $request->get('cont_tipopago');
                            $contrato->cont_concepto = $request->get('cont_concepto');
                            $contrato->cont_tipouso = $request->get('cont_tipouso');
                            $contrato->cont_tiempo = $request->get('cont_tiempo');
                            $contrato->cont_monto = $request->get('cont_monto');
                            $contrato->cont_estado = "tramite";
                            $contrato->cont_diffechsep = $request->get('cont_diffechsep');
                            $contrato->sol_id = $solicitante->sol_id;
                            $contrato->dif_id = $difunto->dif_id;
                            $contrato->nicho_id = $nicho->nicho_id;
                            $contrato->conv_id = 1;
                            $contrato->usu_id_reg = Auth::user()->id;
                            $contrato->usu_id_auto = $request->get('usu_id_auto');
                            $contrato->bolde_id = 1;
                            if ($contrato->cont_tipopago == "credito") {
                                if ($contrato->save()) {
                                    $convenio = new Convenio();
                                    $convenio->conv_fecha = Carbon::now();
                                    $convenio->conv_cuotaini = $request->get('conv_cuotaini');
                                    $convenio->conv_nrocuota = $request->get('conv_nrocuota');
                                    
                                    if ($convenio->save()) {
                                        /**
                                         * Si el convenio es correctamente creado, procedemos a llenar la tabla plan pago con los 
                                         * pagos y el siguiente algoritmo
                                         */
                                        
                                        /**
                                         * El subtotal es el pago total del nicho menos la cuota inicial.
                                         *
                                         * @var        integer
                                         */
                                        $subtotal = 0;
                                        $subtotal=$contrato->cont_monto - $convenio->conv_cuotaini;
                                        $residuo=$subtotal%$convenio->conv_nrocuota;
                                        $cuotamensual=($subtotal-$residuo)/$convenio->conv_nrocuota;
                                        if($residuo>0)
                                        {
                                            $xpricuota=$cuotamensual+1;
                                        }
                                        else
                                        {
                                            $xpricuota=$cuotamensual;
                                        }

                                        $now = Carbon::now();
                                        $dia_hoy = $now->day;
                                        $dia_hoyX = $dia_hoy;
                                        $mes_hoy = $now->month+1;
                                        $ano_hoy = $now->year; 



                                        for($j=1; $j<=$convenio->conv_nrocuota; $j++) 
                                        {
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
                // else{

                // }
            }
        }
        
        return view('gerencia.nicho.comprar',['nicho'=>$nicho,'usuarios',$usuarios]);
        
    }

    public function borrarSesion()
    {
        session()->forget('difunto');
        session()->forget('paso');
        session()->forget('solicitante');
    }
}