<?php

namespace sicem\Http\Controllers;

use sicem\Cementerio;
use Illuminate\Http\Request;

class GerenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $cementerios = Cementerio::all();
        return view('gestion.gestion',['cementerios'=>$cementerios]);
    }

    public function getBusqueda()
    {
        return view('gerencia.busqueda');
    }

    public function missingMethod($parameters=array()){
      abort(404);
    }
}
