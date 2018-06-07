<?php
use Illuminate\Support\Facades\Route;
use sicem\Cementerio;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::resourceVerbs([
    'create' => 'crear',
    'edit' => 'editar', 
]);*/


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/cementerio/crear','CementerioController@getCrear');
Route::post('/admin/cementerio/crear','CementerioController@postCrear');
Route::get('/admin/cementerio/editar','CementerioController@getEditar');
Route::post('/admin/cementerio/editar','CementerioController@postEditar');
Route::post('/admin/cementerio/eliminar','CementerioController@getEliminar');
Route::get('/admin/cementerio','CementerioController@getIndex');



Route::get('/admin/cementerio/pabellones','PabellonController@getPabellonesPorCementerio');
Route::get('/admin/pabellon','PabellonController@getIndex');
Route::get('/admin/pabellon/crear','PabellonController@getCrear');
Route::post('/admin/pabellon/crear','PabellonController@postCrear');
Route::get('/admin/pabellon/nichos','PabellonController@getVerNichos');
Route::post('/admin/pabellon/postCambiarPrecioFila','PabellonController@postCambiarPrecioFila');

Route::get('/admin/pabellon/nicho','NichoController@getVerNichoAdmin');

Route::post('/admin/nicho/imagen/editar','NichoController@postEditarImagenNicho');
Route::post('/admin/solicitante/editar','SolicitanteController@postEditarSolicitante');
Route::post('/admin/difunto/editar','DifuntoController@postEditarDifunto');

Route::get('/gerencia/gestion','GerenciaController@getIndex');
Route::post('/gerencia/pabellon/nichos','PabellonController@postVerNichos');

Route::get('/gerencia/pabellon/nicho','NichoController@getVerNicho');
Route::post('/gerencia/pabellon/nicho/comprar','ContratoController@postComprarNicho');
Route::get('/gerencia/pabellon/nicho/comprar','ContratoController@postComprarNicho');
Route::get('/gerencia/pabellon/nicho/comprar/atras1/{nicho_id}','ContratoController@getAtras1');
Route::get('/gerencia/pabellon/nicho/comprar/atras2/{nicho_id}','ContratoController@getAtras2');

Route::get('/gerencia/pabellon/nicho/traslado/{cont_id}','ContratoController@getTraslado');

Route::get('/gerencia/pabellon/nicho/trasladar','ContratoController@postTrasladarDifunto');
Route::post('/gerencia/pabellon/nicho/trasladar','ContratoController@postTrasladarDifunto');

Route::post('/gerencia/pabellon/nicho/solicitarsextra','ContratoController@postSolicitarSextra');

Route::get('/gerencia/busqueda','GerenciaController@getBusqueda');

Route::get('/createC','DocumentoController@createConstancia');
Route::get('/createA','DocumentoController@createAutorizacion');
Route::get('/createN','DocumentoController@createNotificacion');
Route::get('/createPDF','DocumentoController@createPDF');
Route::get('/createContrato','DocumentoController@createContrato');
//Deudas
Route::get('/gerencia/deudas','PlanPagoController@getIndex');
Route::get('/gerencia/deudas/detalles','PlanPagoController@getDetalleDeuda');
Route::post('/gerencia/contrato/eliminar','ContratoController@postEliminarContrato');


//Caja
Route::get('/caja','CajaController@getIndex');
Route::post('/caja/buscar','ContratoController@postBuscar');
Route::get('/caja/buscar/detalles','PlanPagoController@getDetallePagos');
Route::get('/caja/pagospendientes','CajaController@getPagosPendientes');
Route::post('/caja/pagospendientes/pagar','CajaController@postPagarPagosPendientes');
Route::post('/caja/pagoscuotas/pagar','CajaController@postPagarCuotas');

//--Pruebas
Route::get('/prueba','PruebaController@index');




//AJAX
Route::get('/ajax/get/ObtenerPabellonesPorCementerio','PabellonController@getAjaxObtenerPabellonesPorCementerio');
Route::get('/ajax/get/ObtenerSolicitantesPorNombre','SolicitanteController@getAjaxObtenerSolicitantesPorNombre');
Route::get('/ajax/get/ObtenerSolicitantesPorDNI','SolicitanteController@getAjaxObtenerSolicitantesPorDNI');

Route::get('/ajax/get/ObtenerContratosPagar','ContratoController@postBuscar');


Route::get('/exito', function(){
	return view('caja.compraexitosa');
});