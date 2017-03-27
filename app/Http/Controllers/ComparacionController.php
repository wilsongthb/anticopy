<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArchivosModel;
use Storage;

class ComparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anticopy.comparar');
    }

    public function comparador(Request $request){
        // exit(print_r($request->all(), true));

        
        // return print_r($request->all(), true);
        $archivo_1 = ArchivosModel::find($request->get('archivo_1'));
        $archivo_2 = ArchivosModel::find($request->get('archivo_2'));
        // Storage::get($archivo_1->path);
        
        // return response()->json(arr_utf8_encode(compararStrings(
        //     Storage::get($archivo_1->path),
        //     Storage::get($archivo_2->path),
        //     $request->get('minimo'), // minimo para registror
        //     $request->get('salto') // velocidad
        // )));

        return response()->json(compararStrings(
            Storage::get($archivo_1->path),
            Storage::get($archivo_2->path),
            $request->get('minimo'), // minimo para registror
            $request->get('salto') // velocidad
        ));
        
        // return $archivo_1->path;
        // return response()->make($bin);
        

        // return print_r([$archivo_1, $archivo_2],true);
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
