<?php

namespace sicem\Http\Controllers;

use sicem\Cementerio;
use sicem\Pabellon;
use sicem\Nicho;
use Illuminate\Http\Request;

class PerukaterController extends Controller
{
	public function __construct()
    {
        
    }
    public function getBienvenida()
    {
      return view('perukater.construccion');
    }
    
}