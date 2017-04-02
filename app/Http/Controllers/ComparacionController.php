<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArchivosModel;
use Storage;
use App\ComparacionesModel;
use DB;

class ComparacionController extends Controller
{
    public function comparar()
    {
        return view('anticopy.comparar');
    }

    public function comparador(Request $request){
        $archivo1 = ArchivosModel::find($request->get('archivo_1'));
        $archivo2 = ArchivosModel::find($request->get('archivo_2'));

        $resultados = compararStrings(
            Storage::get($archivo1->path),
            Storage::get($archivo2->path),
            $request->get('minimo'), // minimo para registrar
            $request->get('salto') // velocidad
        );

        if($request->get('utf_8')){
            $resultados = arr_utf8_encode($resultados);
        }

        if(count($resultados) == 0){
            $resultados[] = "No hay Resultados :(";
        }

        return response()->json($resultados);
    }
    // public function comparacion(){
    //     return view('anticopy.comparacion');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comparaciones = ComparacionesModel::paginate(10);
        return view('anticopy.comparacion.index', ['comparaciones' => $comparaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anticopy.comparacion.create', [
            'archivos' => ArchivosModel::where('mimetype', 'text/plain')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar
        $archivo1_id = $request->get('archivo_1');
        $archivo2_id = $request->get('archivo_2');
        $minimo = $request->get('minimo');
        $salto = 1;

        $comparacion = new ComparacionesModel;
        $comparacion->archivo1_id = $archivo1_id;
        $comparacion->archivo2_id = $archivo2_id;
        $comparacion->minimo = $minimo;
        $comparacion->salto = $salto;
        $comparacion->estado = 'c';
        $comparacion->tiempo_proceso = '0';
        $comparacion->progreso = '0';
        $comparacion->save();

        dispatch(new \App\Jobs\ComparacionJob($comparacion));

        // return '<pre>El Proceso ya esta en la cola de trabajo :)'.PHP_EOL.print_r([
        //     $request->all(),
        //     $comparacion,
        // ], true);
        return redirect('/comparacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comparacion = ComparacionesModel::find($id);
        $archivo1 = ArchivosModel::find($comparacion->archivo1_id);
        $archivo2 = ArchivosModel::find($comparacion->archivo2_id);

        $similitudes = DB::table('similitudes')->where('comparacion_id', $id)->paginate(15);

        $txt1 = htmlentities(Storage::get($archivo1->path));
        $txt2 = htmlentities(Storage::get($archivo2->path));

        foreach ($similitudes as $key => $value) {
            $txt1 = resaltar($value->similitud, $value->id, $txt1);
            $txt2 = resaltar($value->similitud, $value->id, $txt2);
        }

        return view('anticopy.comparacion.show', [
            'comparacion' => $comparacion,
            'similitudes' => $similitudes,
            'archivo1' => $archivo1,
            'archivo2' => $archivo2,
            'txt1' => $txt1,
            'txt2' => $txt2,
        ]);
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
