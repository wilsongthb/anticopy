@extends('anticopy.principal')
@section('cuerpo')

<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{url('/comparacion/create')}} ">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Nuevo
                </button>
            </a>
            <hr>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Archivos</th>
                        <th>Minimo</th>
                        <th>Estado</th>
                        <th>Progreso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comparaciones as $item)
                    <tr>
                        <td>{{$item->id}} </td>
                        <td>{{$item->archivo1_id}} y  {{$item->archivo2_id}}</td>
                        <td>{{$item->minimo}} </td>
                        @if($item->estado == 'c')
                            <td class="warning">En cola </td>
                        @elseif($item->estado == 'p')
                            <td class="danger">En Proceso</td>
                        @elseif($item->estado == 'f')
                            <td class="success">Finalizado</td>
                        @endif
                        <td>{{$item->progreso}} </td>
                        <td>
                            <a href="{{url('/comparacion/'.$item->id)}} ">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver detalles
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$comparaciones->links()}}
        </div>
    </div>
    
</div>

@endsection