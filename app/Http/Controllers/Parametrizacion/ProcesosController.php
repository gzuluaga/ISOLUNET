<?php

namespace App\Http\Controllers\Parametrizacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Redirect;
use Alert;
use View;
use Validator;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Entrust;
use App\Models\Parametrizacion\Procesos;
use App\Models\Parametrizacion\Procesos_user;
use App\Models\Sistema_procesos;

class ProcesosController extends Controller
{
    // Validacion de logueo
 	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		return view('pages.parametrizacion.proceso');
    	}
    }
//################ Index de los 3 procesos //################

    //################ GERENCIALES//################
	public function index_gerenciales(Request $request)
    {
    	if ($request) {

    		$empresa                = DB::table('tbl_empresa')
                                    ->where('fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('bool_estado','=','1')
                                    ->first();

            $tabla_usuarios_cliente = DB::table('users as u')
                                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
                                    ->get();

            $proceso_gerencial      = DB::table('tbl_procesos as pg')
                                    ->join('users as u','pg.fk_empresa','=','u.fk_empresa')
                                    ->where('u.fk_empresa',     '=',''.Auth::User()->fk_empresa.'')
                                    ->where('pg.tipo_proceso',  '=','Procesos Gerenciales')
                                    ->where('pg.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get();
            
            


            //if (!Entrust::hasRole('superadministrador')) {}

            return view('pages.parametrizacion.sub-proceso.proceso_gerenciales',
                        [
                            'empresa'                =>  $empresa,
                            'tabla_usuarios_cliente' =>  $tabla_usuarios_cliente, 
                            'proceso_gerencial'      =>  $proceso_gerencial                   
                        ]);
    	}
    }
    //################ MISIONALES//################
    public function index_misionales(Request $request)
    {
        if ($request) {

            $empresa                = DB::table('tbl_empresa')
                                    ->where('fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('bool_estado','=','1')
                                    ->first();

            $tabla_usuarios_cliente = DB::table('users as u')
                                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
                                    ->get();
            
            $proceso_misional       = DB::table('tbl_procesos as pm')
                                    ->join('users as u','pm.fk_empresa','=','u.fk_empresa')
                                    ->where('pm.fk_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('pm.tipo_proceso','=','Procesos Misionales')
                                    ->where('pm.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get();

            //if (Entrust::hasRole('superadministrador')) {}

            return view('pages.parametrizacion.sub-proceso.proceso_misionales',
                        [
                            'empresa'                => $empresa,
                            'tabla_usuarios_cliente' => $tabla_usuarios_cliente,
                            'proceso_misional'       => $proceso_misional
                        ]);
        }
    }
    //################ APOYO//################
     public function index_apoyo(Request $request)
    {
        if ($request) {

            $empresa                = DB::table('tbl_empresa')
                                    ->where('fk_usuario','=',''.Auth::User()->id.'')
                                    ->where('bool_estado','=','1')
                                    ->first();

            $tabla_usuarios_cliente = DB::table('users as u')
                                    ->join('tbl_empresa as e','u.fk_empresa','=','e.id_empresa')
                                    ->where('e.id_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('e.bool_estado','=','1')
                                    ->get();

            $proceso_apoyo          = DB::table('tbl_procesos as pa')
                                    ->join('users as u','pa.fk_empresa','=','u.fk_empresa')
                                    ->where('pa.fk_empresa','=',''.Auth::User()->fk_empresa.'')
                                    ->where('pa.tipo_proceso','=','Procesos de Apoyo')
                                    ->where('pa.bool_estado',  '=','1')
                                    ->orderby('id_proceso', 'DESC')->get();

            //if (Entrust::hasRole('superadministrador')) {

            }
            return view('pages.parametrizacion.sub-proceso.proceso_apoyo',
                        [
                            'empresa'                => $empresa,
                            'tabla_usuarios_cliente' => $tabla_usuarios_cliente,
                            'proceso_apoyo'          => $proceso_apoyo
                        ]);
        }
    
//################ Store de los 3 procesos //################

    //################ GERENCIALES//################
    public function store_gerenciales(Request $request)
    {
         try {
            DB::beginTransaction();

            $variable                           = new Procesos();
            $variable->tipo_proceso             = $request->get('cod_proceso');
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->fk_empresa               = $request->get('cod_empresa');
            $variable->save();

            $cont = 0;
            $usuario_relacionados = $request->get('usuarios_relacionados');
            
            for ($i=0; $i <  count($usuario_relacionados) ; $i++) {

               $usuario = new Procesos_user();
               $usuario->proceso_id = $variable->id_proceso;
               $usuario->user_id = $usuario_relacionados[$i];
               $usuario->save();
            }
            
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
            
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('parm_proceso_gerenciales');
    }
    //################ MISIONALES//################
    public function store_misionales(Request $request)
    {
        try {
            DB::beginTransaction();

            $variable                           = new Procesos();
            $variable->tipo_proceso             = $request->get('cod_proceso');
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->fk_empresa               = $request->get('cod_empresa');
            $variable->save();

            $cont = 0;
            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i <  count($usuario_relacionados) ; $i++) {

               $usuario = new Procesos_user();
               $usuario->proceso_id = $variable->id_proceso;
               $usuario->user_id = $usuario_relacionados[$i];
               $usuario->save();
            }
                        DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');

        }

        return Redirect::to('parm_proceso_misionales')->with('status','Se guard?? correctamente');
    }
    //################ APOYO//################
    public function store_apoyo(Request $request)
    {
         try {
            DB::beginTransaction();

            $variable                           = new Procesos();
            $variable->tipo_proceso             = $request->get('cod_proceso');
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->fk_empresa               = $request->get('cod_empresa');
            $variable->save();

            $cont = 0;
            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i <  count($usuario_relacionados) ; $i++) {

               $usuario = new Procesos_user();
               $usuario->proceso_id = $variable->id_proceso;
               $usuario->user_id = $usuario_relacionados[$i];
               $usuario->save();
            }
            // dd(count($usuario_relacionados));
            DB::commit();
            alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');

        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }

        return Redirect::to('parm_proceso_apoyo')->with('status','Se guard?? correctamente');
    }

//################ Edit de los 3 procesos //################

    //################ GERENCIALES//################
    public function edit_proceso_gerencial(Request $request, $id)
    {
        $proceso            = Procesos::findOrfail($id);

        $proceso_gerencial  = DB::table('tbl_procesos_user as pu') 
                            ->join('users as u','pu.user_id','=','u.id')                    
                            ->where('pu.proceso_id','=',''.$proceso->id_proceso.'')
                            ->get(); 

        $usuario_responsable = DB::table('users as s')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->get();
     
        return view('pages.parametrizacion.Edit.edit_proceso_gerencial',
                            [
                                'proceso'               =>$proceso,
                                'proceso_gerencial'     =>$proceso_gerencial, 
                                'usuario_responsable'   =>$usuario_responsable
                            ]);
    }
        //################ MISIONALES//################
    public function edit_proceso_misional(Request $request, $id)
    {
        $proceso            = Procesos::findOrfail($id);

        $proceso_misional   = DB::table('tbl_procesos_user as pu') 
                            ->join('users as u','pu.user_id','=','u.id')                    
                            ->where('proceso_id','=',''.$proceso->id_proceso.'')
                            ->get(); 

        $usuario_responsable = DB::table('users as s')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->get();
     
        return view('pages.parametrizacion.Edit.edit_proceso_misional',
                            [
                                'proceso'               =>$proceso,
                                'proceso_misional'      =>$proceso_misional,
                                'usuario_responsable'   =>$usuario_responsable
                            ]);
    }
    //################ APOYO//################
    public function edit_proceso_apoyo(Request $request, $id)
    {
        $proceso            = Procesos::findOrfail($id);

        $proceso_apoyo   = DB::table('tbl_procesos_user as pu') 
                            ->join('users as u','pu.user_id','=','u.id')                    
                            ->where('proceso_id','=',''.$proceso->id_proceso.'')
                            ->get(); 

        $usuario_responsable = DB::table('users as s')
                            ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                            ->get();
     
        return view('pages.parametrizacion.Edit.edit_proceso_apoyo',
                            [
                                'proceso'               =>$proceso,
                                'proceso_apoyo'         =>$proceso_apoyo,
                                'usuario_responsable'   =>$usuario_responsable
                            ]);
    }

//################ Update de los 3 procesos //################

    //################ GERENCIAL//################
    public function update_proceso_gerencial(Request $request,$id)
    {
    try {
            DB::beginTransaction();

            $variable                           = Procesos::findOrfail($id);
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->update();

            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i < count($usuario_relacionados) ; $i++) {

                $usuario =  Procesos_user::where('proceso_id','=',''.$variable->id_proceso.'')
                        ->where('user_id','=',''.$usuario_relacionados[$i].'')->first();
                $usuario->proceso_id = $variable->id_proceso;
                $usuario->user_id = $usuario_relacionados[$i];
                $usuario->update();   
            }

            DB::commit();
            alert()->success('Se ha editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrido un error tratando de Editar.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_proceso_gerenciales')->with('status','Se actualiz?? correctamente');
    }
    //################ MISIONAL//################
    public function update_proceso_misional(Request $request,$id)
    {
    try {
            DB::beginTransaction();

            $variable                           = Procesos::findOrfail($id);
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->update();

            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i < count($usuario_relacionados) ; $i++) {

                $usuario =  Procesos_user::where('proceso_id','=',''.$variable->id_proceso.'')
                        ->where('user_id','=',''.$usuario_relacionados[$i].'')->first();
                $usuario->proceso_id = $variable->id_proceso;
                $usuario->user_id = $usuario_relacionados[$i];
                $usuario->update();   
            }

            DB::commit();
            alert()->success('Se ha editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrido un error tratando de Editar.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_proceso_misionales')->with('status','Se actualiz?? correctamente');
    }
    //################ APOYO//################
    public function update_proceso_apoyo(Request $request,$id)
    {
    try {
            DB::beginTransaction();

            $variable                           = Procesos::findOrfail($id);
            $variable->nom_proceso              = $request->get('nom_proceso');
            $variable->sigla                    = $request->get('sigla');
            $variable->fk_usuario_responsable   = $request->get('usuario_responsable');
            $variable->descripcion              = $request->get('descripcion');
            $variable->update();

            $usuario_relacionados = $request->get('usuarios_relacionados');
             for ($i=0; $i < count($usuario_relacionados) ; $i++) {

                $usuario =  Procesos_user::where('proceso_id','=',''.$variable->id_proceso.'')
                        ->where('user_id','=',''.$usuario_relacionados[$i].'')->first();
                $usuario->proceso_id = $variable->id_proceso;
                $usuario->user_id = $usuario_relacionados[$i];
                $usuario->update();   
            }

            DB::commit();
            alert()->success('Se ha editado correctamente.', 'Editado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrido un error tratando de Editar.', 'Error!')->persistent('Cerrar');
            
        }

        return Redirect::to('parm_proceso_apoyo')->with('status','Se actualiz?? correctamente');
    }

    //################ Delete de los 3 procesos //################
    
    //################ GERENCIAL//################
    public function destroy_proceso_gerencial(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $gerencial = Procesos::findOrfail($id);
            $gerencial->bool_estado = '0';
            $gerencial->update();

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrdio un error tratando de eliminar el proceso.', 'Error!')->persistent('Cerrar');            
        }

        return Redirect::to('parm_proceso_gerenciales')->with('status','Se elimin?? correctamente');
    }
    //################ MISIONAL//################
    public function destroy_proceso_misional(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $gerencial = Procesos::findOrfail($id);
            $gerencial->bool_estado = '0';
            $gerencial->update();

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrdio un error tratando de eliminar el proceso.', 'Error!')->persistent('Cerrar');            
        }

        return Redirect::to('parm_proceso_misionales')->with('status','Se elimin?? correctamente');
    }
    //################ APOYO//################
    public function destroy_proceso_apoyo(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $gerencial = Procesos::findOrfail($id);
            $gerencial->bool_estado = '0';
            $gerencial->update();

            DB::commit();
            alert()->success('Se ha eliminado correctamente.', 'Eliminado!')->persistent('Cerrar');
        
        } catch (Exception $e) {
            DB::rollback();
            alert()->error('Ha ocurrdio un error tratando de eliminar el proceso.', 'Error!')->persistent('Cerrar');            
        }

        return Redirect::to('parm_proceso_apoyo')->with('status','Se elimin?? correctamente');
    }

//################ Obtener procesos //################
    public function getProcesos(Request $request)
    {
        if ($request->ajax()) {
            $procesosArray = [];
            $idsSgcs = Sistema_procesos::where('sisgestionr_id', $request->sgc_id)
                                        ->get(['proceso_id']);

            $procesos = Procesos::whereIn('id_proceso', $idsSgcs)->get();

            foreach ($procesos as $proceso) {
                $procesosArray[$proceso->id_proceso] = $proceso->nom_proceso;
            }
            return response()->json($procesosArray);
        }
    }
}