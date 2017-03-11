@extends('anticopy.principal')
@section('cuerpo')

<div class="container">
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