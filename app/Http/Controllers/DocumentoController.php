<?php

namespace sicem\Http\Controllers;

use Illuminate\Http\Request;
use \PhpOffice\PhpWord;
use sicem\Cementerio;
use carbon\carbon;
use sicem\ServicioExtra;
use sicem\User;
use sicem\Nicho;
use sicem\Contrato;
use sicem\PlanPago;
use PDF;

class DocumentoController extends Controller
{
   public function createConstancia(Request $request)
   {
	   $this->validate($request, [
	            'nicho_id' => 'required',
        ]);
        $now = Carbon::now();
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
   		$contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
   		return view('gerencia.documentos.constancia',['contrato'=>$contrato,'now'=>$now]); 		
   }

   public function createAutorizacion(Request $request)
   {
   		
   		$this->validate($request, [
            'nicho_id' => 'required',
        ]);
        $now = Carbon::now();
        $nicho = Nicho::findOrFail($request->get('nicho_id'));
   		  $contrato = Contrato::where('nicho_id',$nicho->nicho_id)->orderBy('cont_fecha','DESC')->get()[0];
   		return view('gerencia.documentos.autorizacion',['contrato'=>$contrato,'now'=>$now]);


   	}
    public function createNotificacion(Request $request)
    {
         $this->validate($request, [
            'conv_id' => 'required',
        ]);
        $now = Carbon::now();
        $conv_id=$request->get('conv_id');
        $planpago = PlanPago::where('conv_id',$conv_id)->orderBy('ppago_nrocuota')->get();
        $contrato = Contrato::where('conv_id',$conv_id)->get()[0];
        return view('gerencia.documentos.notificacion',['planpago'=>$planpago,'now'=>$now,'contrato'=>$contrato]);
    }
    public function createPDF(Request $request)
    {
      $this->validate($request, [
            'conv_id' => 'required',
        ]);
        $now = Carbon::now();
        $conv_id=$request->get('conv_id');
        $planpago = PlanPago::where('conv_id',$conv_id)->orderBy('ppago_fechaven')->get();
        $contrato = Contrato::where('conv_id',$conv_id)->get()[0];

      if($request->has('conv_id')){
          // Set extra option
          PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Times New Roman']);
          // pass view file
          $pdf = PDF::loadView('gerencia.documentos.reporte',['planpago'=> $planpago,'now'=>$now,'contrato'=>$contrato]);
          // download pdf
          return $pdf->download('pdfview.pdf');
        }
       
    }
}
