<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;
use DateTime;

class principalController extends Controller
{
    public function index(){
        return view('principal');
    }
    public function archivos(){
        return view('anticopy.archivos', 
            ['archivos' => DB::table('archivos')->paginate(15)]
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
}
