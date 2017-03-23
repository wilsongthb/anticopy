<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArchivosModel;
use DB;
use Storage;

class ArchivosResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // // $archivos = ArchivosModel::paginate(15);
        // $paginator = DB::table('archivos')->paginate(15);
        // $archivos = $paginator->items();

        // // sobrecargar datos
        // foreach ($archivos as $key => $value) {
        //     $value->url = linkDescarga($value);
        // }

        // $respuesta = [
        //     'data' => $archivos
        // ];
        // // return print_r($archivos, true);
        // return $respuesta;

        if($request->get('buscar')){
            $archivos = DB::table('archivos')
                ->where('nombre', 'LIKE', '%'.$request->buscar.'%')
                ->paginate(5);
        }else{
            $archivos = DB::table('archivos')
                ->paginate(5);
        }
        return $archivos;
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
        //
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
        //
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
