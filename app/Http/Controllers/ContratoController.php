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
                            $contrato->nicho_id = $difunto->nicho_id;
                            $contrato->usu_id_reg = Auth::user()->id;
                            $contrato->usu_id_auto = $request->get('usu_id_auto');
                            $contrato->bolde_id = 1;
                            if ($contrato->tipopago == "credito") {
                                if ($contrato->save()) {
                                    $convenio = new Convenio();
                                    $convenio->conv_fecha = Carbon::now();
                                    $convenio->conv_cuotaini = $request->get('conv_cuotaini');
                                    $convenio->conv_nrocuota = $request->get('conv_nrocuota');
                                    $convenio->cont_id = $contrato->cont_id;
                                    if ($convenio->save()) {
                                        
                                    }
                                }
                            }
                            else{
                                if ($contrato->save()) {
                                    
                                }
                            }
                        }
                    }

                }
            }
        }

        $nicho = Nicho::findOrFail($request->get('nicho_id'));
    
        return view('gerencia.nicho.comprar',['nicho'=>$nicho]);
        
        
    }
}