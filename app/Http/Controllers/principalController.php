<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use Storage;

class principalController extends Controller
{
    public function index(){
        return view('anticopy.principal');
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

            // Asigna un mimetype personalizado en el archivo mimetype.php de config
            $ext = pathinfo($request->file('archivo')->getClientOriginalName(), PATHINFO_EXTENSION);
            $key = 'mimetypes.'.$ext;
            $mimetype = (config()->has($key)) ? config($key) : $mimetype = $request->file('archivo')->getMimeType();

            $archivo = [
                'nombre' => $request->file('archivo')->getClientOriginalName(),
                'path' => $path,
                'mimetype' => $mimetype,
                'size' => $request->file('archivo')->getClientSize(),
                'created_at' => new DateTime()
            ];
            DB::table('archivos')->insert($archivo);
            // $np = substr(Storage::url($path), 1);
            // return response()->file($np);
            return redirect('/archivos');
        }
    }
    // public function aux_descargar($id){
    //     $archivo = DB::table('archivos')->where('id', $id)->get()[0];
    //     return redirect('/descargar/'.$id.'/'.$archivo->nombre);
    // }
    public function descargar($id, $nombre){
        $archivo = DB::table('archivos')->where('id', $id)->get()[0];
        $bin = Storage::get($archivo->path);
        return response()->make($bin, 200, ['Content-type' => $archivo->mimetype]);
    }
    public function eliminararchivo(Request $request){
        $id = $request->get('id');
        $archivo = DB::table('archivos')->where('id', $id)->get()[0];
        if($request->get('confirm')){
            // Eliminar el archivo
            DB::table('archivos')->where('id', $id)->delete();
            Storage::delete($archivo->path);
            return redirect('/archivos');
        }
        // Muestra el mensaje de confirmacion
        return view('anticopy.eliminararchivo', ['archivo' => $archivo]);
    }
}
