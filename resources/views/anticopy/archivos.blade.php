@extends('anticopy.principal')
@section('cuerpo')

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        </div>
    </div>
    
    
    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <h3>Lista de Archivos</h3>
            <a class="btn btn-primary" data-toggle="modal" href='#subirarchivo'>Subir Archivo</a>
            <hr>
            <div class="modal fade" id="subirarchivo">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <form action="{{ url('/subirarchivo') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="">Selecciona el archivo para subir:</label>
                                        <input type="file" class="form-control" name="archivo">
                                        <label for=""><small>Tamaño maximo 50mb</small></label>
                                    </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form action="{{url('/archivos')}}" method="POST">
                <input type="text" class="form-control" placeholder="Buscar" name="buscar">
                {{csrf_field()}}
            </form>
            <hr>
            <table class="table table-hover table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivos as $item)
                    <tr>
                        <td>
                            {{recortar($item->nombre, 40)}}
                        </td>
                        <td class="text-right">
                            {{formatBytes($item->size)}}
                        </td>
                        <td>
                            {{$item->mimetype}}
                        </td>
                        <td>
                            <a href="{{linkDescarga($item)}}" title="Descargar">
                                <button class="btn">
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="{{asset(\Storage::url($item->path))}}" title="Servir">
                                <button class="btn btn-warning">
                                    <span class="glyphicon glyphicon-magnet" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a href="{{url('/eliminararchivo').'?id='.$item->id}}" title="Eliminar">
                                <button class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
            {{$archivos->links()}}
        </div>
        
    </div>
    
</div>

@endsection