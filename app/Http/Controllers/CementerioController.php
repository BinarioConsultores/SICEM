<?php

namespace sicem\Http\Controllers;

use sicem\Cementerio;
use Illuminate\Http\Request;

class CementerioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $cementerios = Cementerio::all();
        return view('cementerio.mostrar',['cementerios'=>$cementerios]);
    }

    public function getCrear()
    {
        return view('cementerio.crear');
    }

    public function postCrear(Request $request)
    {
      $this->validate($request,['cement_nom' =>'required|unique:t_cementerio']);
      Cementerio::create($request->all());

      return redirect('/admin/cementerio')->with('creado','Creado correctamente'); 
    }

    public function getEditar(Request $request)
    {
      $this->validate($request,['cement_id'=>'required']);
      $cement_id=$request->get('cement_id');
      $cementerio = Cementerio::find($cement_id);

      return $cementerio; 
    }

    public function postEditar(Request $request)
    {
      $this->validate($request,['cement_nom'=>'required']);
      $cement_nom=$request->get('cement_nom');
      $cement_id=$request->get('cement_id');

      $cementerio= Cementerio::find($cement_id);
      $cementerio->cement_nom = $cement_nom;
      $cementerio->save();

      return redirect('/admin/cementerio')->with('editado','Editado correctamente');
    }

     public function getEliminar(Request $request)
    {
      $this->validate($request,['cement_id'=>'required']);
      $cement_id=$request->get('cement_id');
      $cementerio = Cementerio::find($cement_id);
      $cementerio->delete();      

      return redirect('/admin/cementerio')->with('eliminado','Eliminado correctamente'); 
    }


    public function missingMethod($parameters=array()){
      abort(404);
    }
}
