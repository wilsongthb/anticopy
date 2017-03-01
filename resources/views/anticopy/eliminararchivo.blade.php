@extends('principal')
@section('cuerpo')

<div class="container">

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
        </div>
    </div>
    
    
    <div class="row">
        
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Eliminar archivo?</h3>
                </div>
                <div class="panel-body">
                    <pre>{{print_r($archivo, true)}}</pre>
                    <a href="{{url('/eliminararchivo').'?id='.$archivo->id}}&confirm=1" class="btn btn-success">Si</a>
                    <a href="{{URL::previous()}}" class="btn btn-default">No</a>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

@endsection