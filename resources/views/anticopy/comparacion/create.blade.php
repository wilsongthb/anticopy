@extends('anticopy.principal')
@section('cuerpo')

<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <form action="{{url('/comparacion')}} " method="POST" role="form">
                {{csrf_field()}}
                <legend>Crear</legend>
                <div class="form-group">
                    <label for="">Minimo</label>
                    <input type="number" class="form-control" name="minimo" placeholder="Minimo de longitud para guardar como similitud" value="150">
                </div>
                <div class="form-group">
                    <label for="">Salto</label>
                    <input type="number" class="form-control" name="salto" value="1" title="El valor por defecto es 1, la maxima exactitud" disabled>
                </div>
                <div class="form-group">
                    <label for="">Archivo1</label>
                    <select name="archivo_1" id="" class="form-control">
                    @foreach($archivos as $item)
                        <option value="{{$item->id}} ">{{$item->nombre}} - {{$item->mimetype}} </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Archivo2</label>
                    <select name="archivo_2" id="" class="form-control">
                        @foreach($archivos as $item)
                        <option value="{{$item->id}} ">{{$item->nombre}} - {{$item->mimetype}} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar el Proceso a la Cola</button>
            </form>
            <hr>
        </div>
    </div>
    
</div>

@endsection