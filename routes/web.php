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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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


Route::get('/gerencia/gestion','GerenciaController@getIndex');
Route::post('/gerencia/pabellon/nichos','PabellonController@postVerNichos');

Route::get('/gerencia/pabellon/nicho','NichoController@getVerNicho');
Route::get('/gerencia/pabellon/nicho/comprar','ContratoController@postComprarNicho');

//AJAX
Route::get('/ajax/get/ObtenerPabellonesPorCementerio','PabellonController@getAjaxObtenerPabellonesPorCementerio');
