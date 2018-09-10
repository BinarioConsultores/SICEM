<?php

namespace sicem\Http\Controllers;

use sicem\Cementerio;
use sicem\Pabellon;
use sicem\Nicho;
use Illuminate\Http\Request;

class PabellonController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
      $pabellones = Pabellon::all();
      return view('pabellon.mostrar',['pabellones'=>$pabellones]);
    }
    public function getPabellonesPorCementerio(Request $request){
    	$this->validate($request,['cement_id'=>'required']);
    	$cement_id=$request->get('cement_id');
      	$cementerio = Cementerio::find($cement_id);
      	return view('pabellon.mostrar',['cementerio'=>$cementerio]);
    }

    public function getAjaxObtenerPabellonesPorCementerio(Request $request){
      $this->validate($request,['cement_id'=>'required']);
      $cement_id=$request->get('cement_id');
      $cementerio = Cementerio::findOrFail($cement_id);
      return $cementerio->pabellones;
    }

    public function getCrear(Request $request){
        $cement_id=$request->get('cement_id');
      	$cementerio = Cementerio::find($cement_id);
      	return view('pabellon.crear',['cementerio'=>$cementerio]);
    }

    public function postCrear(Request $request){

        $pabellon = new Pabellon();
        $pabellon->pab_nom = $request->get('pab_nom');
        $pabellon->pab_nrofil = $request->get('pab_nrofil');
        $pabellon->pab_nrocol = $request->get('pab_nrocol');
        $pabellon->pab_cantnicho = $request->get('pab_cantnicho');
        $pabellon->pab_tiponum = $request->get('pab_tiponum');
        $pabellon->cement_id = $request->get('cement_id');
        $pabellon->pab_pathimag = "no";
        $pabellon->save();

        $tiponum = $request->get('pab_tiponum');
        $nrofil = $request->get('pab_nrofil');
        $nrocol = $request->get('pab_nrocol');

        //$imagen = $request->file('pab_pathimag');
        //$ruta = '/assets/images/pabellones/';
      	//$nombre = $pabellon->pab_id.".".$imagen->guessExtension();
  	    //$pabellon->pab_pathimag = $pabellon->pab_id.".".$imagen->guessExtension();
    		//$pabellon->save();
    		//$imagen->move(getcwd().$ruta, $nombre);
    		$cementerio = Cementerio::find($pabellon->cement_id);

        $cont=1;
        if($tiponum=="A")
        {
          $cont=1;
          for($i=1;$i<=$nrofil;$i++)
          {
            for($j=1;$j<=$nrocol;$j++)
            {
              $nicho = new Nicho();
              $nicho->nicho_nro = $cont;
              $nicho->nicho_fila = $i;
              $nicho->nicho_col = $j;
              $nicho->nicho_est = "libre";
              $nicho->nicho_precio="0.00";
              $nicho->nicho_pathimag="default.jpg";
              $nicho->pab_id = $pabellon->pab_id;
              $nicho->save();
              $cont++;
            }
          }
        }
        else
        {
          if($tiponum=="B")
          {          
            for($i=1;$i<=$nrofil;$i++)
            {
              $cont=$i;
              for($j=1;$j<=$nrocol;$j++)
              {
                $nicho = new Nicho();
                $nicho->nicho_nro = $cont;
                $nicho->nicho_fila = $i;
                $nicho->nicho_col = $j;
                $nicho->nicho_est = "libre";
                $nicho->nicho_precio="0.00";
                $nicho->nicho_pathimag="default.jpg";
                $nicho->pab_id = $pabellon->pab_id;
                $nicho->save();
                $cont=$cont+$nrofil;
              }
            }
          }
          else
          {
            if($tiponum=="C")
            {         
              for($i=1;$i<=$nrofil;$i++)
              {
                $cont=$nrofil+1-$i;
                for($j=1;$j<=$nrocol;$j++)
                {
                  $nicho = new Nicho();
                  $nicho->nicho_nro = $cont;
                  $nicho->nicho_fila = $i;
                  $nicho->nicho_col = $j;
                  $nicho->nicho_est = "libre";
                  $nicho->nicho_precio="0.00";
                  $nicho->nicho_pathimag="default.jpg";
                  $nicho->pab_id = $pabellon->pab_id;
                  $nicho->save();
                  $cont=$cont+$nrofil;
                }
              }
            }
            else
            {
              if($tiponum=="D")             
              {
                for($i=1;$i<=$nrofil;$i++)
                {
                  $cont=$nrocol*$i;
                  for($j=1;$j<=$nrocol;$j++)
                  {
                    $nicho = new Nicho();
                    $nicho->nicho_nro = $cont;
                    $nicho->nicho_fila = $i;
                    $nicho->nicho_col = $j;
                    $nicho->nicho_est = "libre";
                    $nicho->nicho_precio="0.00";
                    $nicho->nicho_pathimag="default.jpg";
                    $nicho->pab_id = $pabellon->pab_id;
                    $nicho->save();
                    $cont=$cont-1;
                  }
                }
              }
              else
              {
                if($tiponum=="E")
                {       
                  for($i=1;$i<=$nrofil;$i++)
                  {
                    $cont=($nrocol*$nrofil)-($nrofil-$i);
                    for($j=1;$j<=$nrocol;$j++)
                    {
                      $nicho = new Nicho();
                      $nicho->nicho_nro = $cont;
                      $nicho->nicho_fila = $i;
                      $nicho->nicho_col = $j;
                      $nicho->nicho_est = "libre";
                      $nicho->nicho_precio="0.00";
                      $nicho->nicho_pathimag="default.jpg";
                      $nicho->pab_id = $pabellon->pab_id;
                      $nicho->save();
                      $cont=$cont-$nrofil;
                    }
                  }
                }
                else
                {
                  if($tiponum=="F")
                  {
                    $cont=$nrocol*$nrofil;        
                    for($i=1;$i<=$nrofil;$i++)
                    {
                      for($j=1;$j<=$nrocol;$j++)
                      {
                        $nicho = new Nicho();
                        $nicho->nicho_nro = $cont;
                        $nicho->nicho_fila = $i;
                        $nicho->nicho_col = $j;
                        $nicho->nicho_est = "libre";
                        $nicho->nicho_precio="0.00";
                        $nicho->nicho_pathimag="default.jpg";
                        $nicho->pab_id = $pabellon->pab_id;
                        $nicho->save();
                        $cont--;
                      }
                      $cont=($nrocol*$nrofil)-($nrocol*$i);
                    }
                  }
                  else
                  {
                    if($tiponum=="G")
                    {
                      for($i=1;$i<=$nrofil;$i++)
                      {
                        $cont=($nrocol*$nrofil)-(($nrocol*$i)-1);
                        for($j=1;$j<=$nrocol;$j++)
                        {
                          $nicho = new Nicho();
                          $nicho->nicho_nro = $cont;
                          $nicho->nicho_fila = $i;
                          $nicho->nicho_col = $j;
                          $nicho->nicho_est = "libre";
                          $nicho->nicho_precio="0.00";
                          $nicho->nicho_pathimag="default.jpg";
                          $nicho->pab_id = $pabellon->pab_id;
                          $nicho->save();
                          $cont++;
                        }
                      }
                    }
                    else
                    {
                      if($tiponum=="H")
                      {
                        for($i=1;$i<=$nrofil;$i++)
                        {
                          if(($nrofil-($i-1))%2==0)
                            $cont=($nrocol*$nrofil)-($nrocol*($i-1));
                          else
                            $cont=($nrocol*$nrofil)-(($nrocol*$i)-1);
                          for($j=1;$j<=$nrocol;$j++)
                          {
                            $nicho = new Nicho();
                            $nicho->nicho_nro = $cont;
                            $nicho->nicho_fila = $i;
                            $nicho->nicho_col = $j;
                            $nicho->nicho_est = "libre";
                            $nicho->nicho_precio="0.00";
                            $nicho->nicho_pathimag="default.jpg";
                            $nicho->pab_id = $pabellon->pab_id;
                            $nicho->save();
                            if(($nrofil-($i-1))%2==0)
                                $cont--;
                            else
                                $cont++;
                          }
                        }
                      }
                      else
                      {                                                                
                        if($tiponum=="I")
                        {
                          for($i=1;$i<=$nrofil;$i++)
                          {
                            if(($nrofil-($i-1))%2!=0)
                                $cont=($nrocol*$nrofil)-($nrocol*($i-1));
                            else
                                $cont=($nrocol*$nrofil)-(($nrocol*$i)-1);
                            for($j=1;$j<=$nrocol;$j++)
                            {
                              $nicho = new Nicho();
                              $nicho->nicho_nro = $cont;
                              $nicho->nicho_fila = $i;
                              $nicho->nicho_col = $j;
                              $nicho->nicho_est = "libre";
                              $nicho->nicho_precio="0.00";
                              $nicho->nicho_pathimag="default.jpg";
                              $nicho->pab_id = $pabellon->pab_id;
                              $nicho->save();
                              if(($nrofil-($i-1))%2!=0)
                                  $cont--;
                              else
                                  $cont++;
                            }
                          }
                        }
                        else
                        {
                          for($i=1;$i<=$nronichos;$i++)
                          {
                            $nicho = new Nicho();
                            $nicho->nicho_nro = $i;
                            $nicho->nicho_fila = -1;
                            $nicho->nicho_col = -1;
                            $nicho->nicho_est = "libre";
                            $nicho->nicho_precio="0.00";
                            $nicho->nicho_pathimag="default.jpg";
                            $nicho->pab_id = $pabellon->pab_id;
                            $nicho->save();
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
  	    return redirect('/admin/cementerio/pabellones?cement_id='.$cementerio->cement_id)->with('creado','Pabellón creado correctamente');
  	}

    public function getVerNichos(Request $request){

      $pab_id=$request->get('pab_id');
      $pabellon = Pabellon::find($pab_id);
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

      return view('pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos]);
    }

    public function postVerNichos(Request $request){

      $this->validate($request, [
        'pab_id' => 'required',
      ]);

      session()->forget('difunto');
      session()->forget('paso');
      session()->forget('solicitante');
       
      $pab_id=$request->get('pab_id');

      $pabellon = Pabellon::find($pab_id);
      
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

      return view('gerencia.pabellon.nichos',['pabellon'=>$pabellon,'nichos'=>$nichos]);
    }


    public function postCambiarPrecioFila(Request $request){
      
      $this->validate($request, [
        'pab_id' => 'required',
        'precio' => 'required|numeric',
        'fila' => 'required',
      ]);

      $pab_id=$request->get('pab_id');
      $fila=$request->get('fila');
      $precio=$request->get('precio');

      $nichos = Nicho::where('pab_id',$pab_id)->where('nicho_fila',$fila)->get();
      foreach ($nichos as $nicho) {
        $nicho->nicho_precio = $precio;
        $nicho->save();
      }

      return redirect('/admin/pabellon/nichos?pab_id='.$pab_id)->with('editado','El precio ha sido editado correctamente');
    }
}