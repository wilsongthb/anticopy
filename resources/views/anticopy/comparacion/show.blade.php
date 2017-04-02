@extends('anticopy.principal')
@section('cuerpo')
<style>
    .vista-previa{
        height: 800px;
        overflow: auto;
        {{-- white-space: pre; --}}
    }
</style>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
            <h3>Resultados</h3>
            <div class="list-group">
                @foreach($similitudes as $item)
                <div class="list-group-item"><a href="#{{$item->id}} ">{{$item->similitud}}</a></div>
                @endforeach
            </div>
            
            {{$similitudes->links()}}
        </div>
        
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4>Archivo 1: {{$archivo1->nombre}} </h4>
                    <div class="vista-previa">{!! $txt1 !!}</div>        
                </div>
                <h4>Archivo 2: {{$archivo2->nombre}} </h4>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="vista-previa">{!! $txt2 !!}</div>        
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="panel panel-success">
                  <div class="panel-heading">
                        <h3 class="panel-title">Comparacion</h3>
                  </div>
                  <div class="panel-body">
                        <div>
                            <label for="">ID:</label> {{$comparacion->id}}
                        </div>
                        <div>
                            <label for="">Archivo 1:</label>
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <label for="">ID:</label> {{$archivo1->id}}<br>
                                    <label for="">Nombre:</label> {{$archivo1->nombre}}<br>
                                    <label for="">Fecha de registro:</label> {{$archivo1->created_at}}<br>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <label for="">Archivo 2:</label>
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <label for="">ID:</label> {{$archivo2->id}}<br>
                                    <label for="">Nombre:</label> {{$archivo2->nombre}}<br>
                                    <label for="">Fecha de registro:</label> {{$archivo2->created_at}}<br>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <label for="">Minimo:</label> {{$comparacion->minimo}}
                        </div>
                        <div>
                            <label for="">Velocidad, Salto:</label> {{$comparacion->salto}}
                        </div>
                  </div>
            </div>
        </div>
        
        
    </div>
</div>

@endsection