@extends('anticopy.principal')
@section('cuerpo')

<div class="container">

    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Lista de Archivos</h3>
            <form action="{{url('/convertir')}}" method="GET">
                <input type="text" class="form-control" placeholder="Buscar" name="buscar">
                <!--{{csrf_field()}}-->
            </form>

            <!--<div class="alert alert-success" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>XD</strong> xxsd
            </div>-->
            
            <hr>
            <div id="confirmacion"></div>
            <table class="table table-hover table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivos as $item)
                    <tr>
                        <td>
                            {{(strlen($item->nombre) > 40) ? substr($item->nombre, 0, 40).'...' : $item->nombre}}
                        </td>
                        <td>
                            {{formatBytes($item->size)}}
                        </td>
                        <td>
                            <a href="{{linkDescarga($item)}}" title="Ver/Descargar">
                                <button class="btn">
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </button>
                            </a>
                            <a onclick="enviar({{$item->id}})" class="btn btn-primary">
                                <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
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


@push('script')
<script>
function enviar(id){
    $.ajax({
        method: 'post',
        url: APP_URL + '/convertir',
        data: {
            id: id,
            _token: Laravel.csrfToken
        }
    }).done(function(response){
        console.log(response)
        if(response.data.return_val == 0){
            $('#confirmacion').html('<div class="alert alert-success" ><strong>Guardado como: </strong> ' + response.data.nombre + '</div><hr>');
        }else{
            $('#confirmacion').html('<div class="alert alert-danger" ><strong>Error: </strong> ' + response.data.output + '</div><hr>');
        }
        setTimeout(function() {
                $('#confirmacion').html('');
            }, 15000);
    })
}
</script>    
@endpush
