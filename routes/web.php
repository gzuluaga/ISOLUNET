<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin']], function() {
	
Route::get('/administracion_usuarios', 'Usuarios\UsuariosController@index')->name('admin_users');
Route::post('/store_usuarios', 'Usuarios\UsuariosController@store')->name('store_users');
Route::get('/edit_usuarios/{id}', 'Usuarios\UsuariosController@edit')->name('edit_users');
Route::post('/update_usuarios/{id}', 'Usuarios\UsuariosController@update')->name('update_users');
Route::get('/delete_usuarios/{id}', 'Usuarios\UsuariosController@destroy')->name('delete_users');

});



Route::get('/', 'HomeController@index')->name('home')->middleware('verified');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// Parametrizacion empresa
Route::get('parm_empresa', ['uses'=>'Parametrizacion\EmpresaController@index', 'as' => 'Mod_Parametrizacion::parm_empresa']);
Route::post('save_empresa', ['uses'=>'Parametrizacion\EmpresaController@store', 'as' => 'Mod_Parametrizacion::save_empresa']);
Route::get('edit_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@edit', 'as' => 'Mod_Parametrizacion::edit_empresa']);
Route::post('update_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@update', 'as' => 'Mod_Parametrizacion::update_empresa']);
Route::get('delete_empresa/{id}', ['uses'=>'Parametrizacion\EmpresaController@destroy', 'as' => 'Mod_Parametrizacion::delete_empresa']);

// parametrizacion datos corporativos
Route::get('parm_datos_corportativo', 'Parametrizacion\DatosCorporativosController@index');
Route::post('save_datos_corportativo', 'Parametrizacion\DatosCorporativosController@store');

// parametrizacion areas y cargos
Route::get('parm_areas', 'Parametrizacion\AreasCargoController@index_areas');
Route::post('save_areas', 'Parametrizacion\AreasCargoController@store_areas');
Route::get('edit_parm_areas/{id}', 'Parametrizacion\AreasCargoController@edit_areas');
Route::post('update_areas/{id}', 'Parametrizacion\AreasCargoController@update_areas');
Route::get('delete_parm_areas/{id}', 'Parametrizacion\AreasCargoController@destroy');

// Parametrizacion Cargo
Route::get('parm_cargo', 'Parametrizacion\AreasCargoController@index_cargos');
Route::post('save_cargo', 'Parametrizacion\AreasCargoController@store_cargos');
Route::get('edit_parm_cargos/{id}', 'Parametrizacion\AreasCargoController@edit_cargo');
Route::post('update_cargos/{id}', 'Parametrizacion\AreasCargoController@update_cargos');
Route::get('delete_parm_cargos/{id}', 'Parametrizacion\AreasCargoController@destroy_cargos');

// Parametrizacion Proceso
Route::get('parm_proceso', 						'Parametrizacion\ProcesosController@index');
Route::get('parm_proceso_gerenciales', 			'Parametrizacion\ProcesosController@index_gerenciales');
Route::get('parm_proceso_misionales', 			'Parametrizacion\ProcesosController@index_misionales');
Route::get('parm_proceso_apoyo', 				'Parametrizacion\ProcesosController@index_apoyo');
Route::post('parm_proceso_save', 				'Parametrizacion\ProcesosController@store_gerenciales');
Route::post('parm_proceso_save_misionales', 	'Parametrizacion\ProcesosController@store_misionales');
Route::post('parm_proceso_save_apoyo', 			'Parametrizacion\ProcesosController@store_apoyo');
Route::get('parm_proceso_gerencial_edit{id}', 	'Parametrizacion\ProcesosController@edit_proceso_gerencial');
Route::get('parm_proceso_misional_edit{id}', 	'Parametrizacion\ProcesosController@edit_proceso_misional');
Route::get('parm_proceso_apoyo_edit{id}', 		'Parametrizacion\ProcesosController@edit_proceso_apoyo');
Route::post('update_proceso_gerencial/{id}', 	'Parametrizacion\ProcesosController@update_proceso_gerencial');
Route::post('update_proceso_misionall/{id}', 	'Parametrizacion\ProcesosController@update_proceso_misional');
Route::post('update_proceso_apoyo/{id}', 		'Parametrizacion\ProcesosController@update_proceso_apoyo');
Route::get('parm_proceso_gerencial_delete/{id}','Parametrizacion\ProcesosController@destroy_proceso_gerencial');
Route::get('parm_proceso_misional_delete/{id}',	'Parametrizacion\ProcesosController@destroy_proceso_misional');
Route::get('parm_proceso_apoyo_delete/{id}',	'Parametrizacion\ProcesosController@destroy_proceso_apoyo');
Route::get('procesos', 							'Parametrizacion\ProcesosController@getProcesos');

// Parametrizacion Tipo Documento
Route::get ('parm_documento_index', 		'Parametrizacion\DocumentosController@index_documento');
Route::post('parm_documento_save', 			'Parametrizacion\DocumentosController@store_documento');
Route::get ('parm_documento_edit/{id}',		'Parametrizacion\DocumentosController@edit_documento');
Route::post('parm_documento_update/{id}', 	'Parametrizacion\DocumentosController@update_documento');
Route::get ('parm_documento_delete/{id}', 	'Parametrizacion\DocumentosController@destroy_documento');

// Parametrizacion Usuarios
Route::get('parm_usuarios', 'Parametrizacion\UsuariosController@index');
Route::post('parm_usuarios_save', 'Parametrizacion\UsuariosController@store');

// Parametrizacion Sistema de Gestion
Route::get('parm_sistema_gestion', 				 'Parametrizacion\SistemaGestionController@index');
Route::post('parm_save_sistema_gestion', 		 'Parametrizacion\SistemaGestionController@store');
Route::get('parm_edit_sistema_gestion/{id}', 	 'Parametrizacion\SistemaGestionController@edit');
Route::post('parm_update_sistema_gestion/{id}',  'Parametrizacion\SistemaGestionController@update');
Route::get('parm_eliminar_sistema_gestion/{id}', 'Parametrizacion\SistemaGestionController@destroy');

// Parametrizacion cambio de empresa usuario
Route::get('parm_usuarios_camb', 'Parametrizacion\UsuariosController@cambio_usuario');
Route::post('parm_usuarios_camb_update', 'Parametrizacion\UsuariosController@mover_usuario');

// Parametrizacion origen Anomalía
Route::get('parm_origen_anomalia', 'Parametrizacion\OrigenanomaliaController@origen_anomalia');
Route::get('view_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@edit_origen_anomalia');
Route::post('store_parm_origen_anomalia', 'Parametrizacion\OrigenanomaliaController@store');
Route::post('edit_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@edit');
Route::get('delete_parm_origen_anomalia/{id}', 'Parametrizacion\OrigenanomaliaController@delete');

// Parametrizacion Productos
Route::get('parm_producto', 'Parametrizacion\ProductoController@index');
Route::post('store_parm_producto', 'Parametrizacion\ProductoController@store');
Route::get('edit_parm_producto/{id}', 'Parametrizacion\ProductoController@edit');
Route::post('update_parm_producto/{id}', 'Parametrizacion\ProductoController@update');
Route::get('delete_parm_producto/{id}', 'Parametrizacion\ProductoController@destroy');

// parametrizacion calificacion de proveedores
Route::get('calificacion_proveedores', function () {
    return view('pages.parametrizacion.calificacion_proveedor.calificacion_proveedor');
});

// Parametrizacion Proveedores
Route::get('parm_proveedor', function () {
    return view('pages.parametrizacion.proveedor');
});

// Menu contexto
Route::get('contexto_index','Contexto\ContextoController@index');

// tendencias en colombia
Route::get('contexto_tendencias_en_colombia','Contexto\TendeciasController@index');
Route::post('contexto_save_tendencias_en_colombia','Contexto\TendeciasController@store');
Route::post('contextoedit_tendencias_en_colombia/{id}','Contexto\TendeciasController@update');

// Analisis pestal
Route::get('contexto_analisis_pestal','Contexto\AnalisisPestalController@index');
Route::post('contexto_save_analisis_pestal','Contexto\AnalisisPestalController@create');
Route::post('contexto_edit_analisis_pestal/{id}','Contexto\AnalisisPestalController@update');

// analisis dofa
Route::get('contexto_dofa','Contexto\DofaController@index');
Route::post('contexto_save_dofa','Contexto\DofaController@store');
Route::post('contexto_edit_dofa/{id}','Contexto\DofaController@update');
Route::post('contexto_eliminar_dofa/{id}','Contexto\DofaController@destroy');

// Riesgos y oportunidades
Route::get('contexto_riesgo','Contexto\RiesgoOportunidadesController@index');
Route::post('contexto_save_riesgo','Contexto\RiesgoOportunidadesController@store');
Route::post('contexto_edit_riesgo/{id}','Contexto\RiesgoOportunidadesController@update');
Route::post('contexto_eliminar_riesgo/{id}','Contexto\RiesgoOportunidadesController@destroy');

// partes interesadas
Route::get('partes_interesadas','partes_interesadas\PartesInteresadasController@index');
Route::get('pi_calificaciones','partes_interesadas\PartesInteresadasController@cal');
Route::post('pi_calificaciones_i','partes_interesadas\PartesInteresadasController@impacto');
Route::post('pi_calificaciones_mo/{id}','partes_interesadas\PartesInteresadasController@impacto_update');
Route::post('pi_calificaciones_influ','partes_interesadas\PartesInteresadasController@influencia');
Route::post('pi_calificaciones_influ/{id}','partes_interesadas\PartesInteresadasController@influencia_update');
Route::post('pi_calificaciones_form_pa','partes_interesadas\PartesInteresadasController@form_partes');

// alcance
Route::get('alcance','alcance\AlcanceController@index');
// mejora
// anomalia
Route::get('anomalia','mejora\AnomaliasController@index');
Route::get('anomalia_index','mejora\AnomaliasController@anomalia');
Route::get('causa_raiz','mejora\AnomaliasController@causa_raiz');
Route::get('acciones_correctivas','mejora\AnomaliasController@acciones_correctivas');
Route::post('store_anomalia','mejora\AnomaliasController@store_anomalia');

// ajax mejora
Route::get('sistema_de_gestion',array('as'=>'myform','uses'=>'Parametrizacion\OrigenanomaliaController@myformAjax'));


Route::get('sistemagestion/proceso/{id}',
			array('as'=>'sistemagestion.proceso',
					'uses'=>'Parametrizacion\OrigenanomaliaController@myformAjax'));

// Sgto y Medicion
Route::get('indicadores','sgto_medicion\IndicadoresController@index');
Route::post('indicadores','sgto_medicion\IndicadoresController@store');
Route::post('indicadores/{id}','sgto_medicion\IndicadoresController@update');
Route::post('indicadores/{id}','sgto_medicion\IndicadoresController@destroy');

