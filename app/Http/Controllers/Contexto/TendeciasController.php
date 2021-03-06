<?php

namespace App\Http\Controllers\Contexto;

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

use App\Models\Contexto\Tendencias_en_colombia;



class TendeciasController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $validacion = DB::table('tbl_contexto_tendencias_colombia')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->get();

        $tendencia = "";
        if (count($validacion) != 0) {
           $tendencia = DB::table('tbl_contexto_tendencias_colombia')
                    ->where('fk_empresa','=',''.Auth::User()->fk_empresa.'')
                    ->first();
        }

         return view('pages.contexto.tendencia_en_colombia.index',['tendencia'=>$tendencia,'validacion'=>$validacion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
             DB::beginTransaction();

            $tendencias                       = new Tendencias_en_colombia();
            $tendencias->tendencia_colombia  = $request->get('tendencia');
            $tendencias->fk_empresa          = "".Auth::User()->fk_empresa."";
            $tendencias->save();

             DB::commit();
             alert()->success('Se ha creado correctamente.', 'Creado!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_tendencias_en_colombia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try {
             DB::beginTransaction();

            $tendencias                      = Tendencias_en_colombia::findOrfail($id);
            $tendencias->tendencia_colombia  = $request->get('tendencia');
            $tendencias->fk_empresa          = "".Auth::User()->fk_empresa."";
            $tendencias->update();

             DB::commit();
             alert()->success('Se ha Edito correctamente.', 'Editado!')->persistent('Cerrar');
        } catch (Exception $e) {
             DB::rollback();
             alert()->error('Se ha Presentador un error.', 'Error!')->persistent('Cerrar');
        }
        return Redirect::to('contexto_tendencias_en_colombia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
