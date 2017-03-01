<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use Storage;

class principalController extends Controller
{
    public function index(){
        return view('principal');
    }
    public function archivos(Request $request){
        if($request->buscar){
            $archivos = DB::table('archivos')
                ->where('nombre', 'LIKE', '%'.$request->buscar.'%')
                ->paginate(5);
        }else{
            $archivos = DB::table('archivos')
                ->paginate(5);
        }
        
        return view('anticopy.archivos', 
            ['archivos' => $archivos]
        );
    }
    public function subirarchivo(Request $request){
        if($request->hasFile('archivo')){
            $path = $request->file('archivo')->store('public');
            $mimetype = $request->file('archivo')->getMimeType();
            $archivo = [
                'nombre' => $request->file('archivo')->getClientOriginalName(),
                'path' => $path,
                'mimetype' => $request->file('archivo')->getMimeType(),
                'size' => $request->file('archivo')->getClientSize(),
                'created_at' => new DateTime()
            ];
            DB::table('archivos')->insert($archivo);
            // $np = substr(Storage::url($path), 1);
            // return response()->file($np);
            return redirect('/archivos');
        }
    }
    public function eliminararchivo(Request $request){
        $id = $request->get('id');
        $archivo = DB::table('archivos')->where('id', $id)->get()[0];
        if($request->get('confirm')){
            DB::table('archivos')->where('id', $id)->delete();
            Storage::delete($archivo->path);
            return redirect('/archivos');
        }
        return view('anticopy.eliminararchivo', ['archivo' => $archivo]);
    }
}
