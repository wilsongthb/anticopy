<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ArchivosModel;
use Storage;
use DateTime;

class principalController extends Controller
{
    public function index(){
        return view('anticopy.principal');
    }
    public function angular(){
        return view('anticopy.jsfe.angular');
    }

    /*
        Muestra el listado de los archivos subidos que pueden ser convertidos
    */
    public function archivosconvertibles(Request $request){
        if($request->buscar){
            $archivos = DB::table('archivos')
                ->where('nombre', 'LIKE', '%'.$request->buscar.'%')
                ->where('mimetype', 'application/pdf')
                ->paginate(5);
        }else{
            $archivos = DB::table('archivos')
                ->where('mimetype', 'application/pdf')
                ->paginate(5);
        }

        return view('anticopy.convertir', 
            ['archivos' => $archivos]
        );
    }

    /*
        Accion de convertir
    */
    public function convertir(Request $request){
        $archivo = ArchivosModel::find($request->id);

        // $dir =  storage_path('app\\'.str_replace('/', '\\', $archivo->path));
        $dir = storage_path('app/'.$archivo->path);

        // convirtiendo con xpdf
        // $fast = config('system.pdftotext').' '.$dir.' -'; // convierte y devuelve toda la cadena txt, no guarda en disco aun
        $d = new DateTime();
        $txt = pathNombre($archivo->path).$d->getTimestamp().'.txt';
        $path = storage_path('app/txts/'.$txt);
        $fast = config('system.pdftotext').' -enc UTF-8 '.$dir.' '.$path; // convierte y guarda en la carpeta txts

        $return_val = -14;
        $output = consola($fast, $return_val);

        // exit($return_val.':'.$output);

        if($return_val == 0){
            // guardar en la base de datos
            DB::table('archivos')->insert([
                'nombre' => $archivo->nombre.'.txt',
                'path' => 'txts/'.$txt,
                'mimetype' => 'text/plain',
                'size' => filesize($path),
                'created_at' => new DateTime()
            ]);
        }

        return [
            'data' => [
                'nombre' => $archivo->nombre.'.txt',
                'return_val' => $return_val,
                'output' => $output
            ]
        ];
    }
}
