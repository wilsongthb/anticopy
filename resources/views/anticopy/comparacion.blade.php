@extends('anticopy.principal')
@section('cuerpo')

<div class="container" ng-app="comparacion" ng-controller="comparacionController">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Comparaciones Background <small>En segundo plano</small></h3>
            
            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Nuevo</a>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Crear Comparacion</h4>
                        </div>
                        <div class="modal-body">
                            
                            <form>
                                <!--<legend>Nuevo</legend>-->
                            
                                <div class="form-group">
                                    <label for="">Archivo 1</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" ng-bind="nuevoregistro.archivo1_id"></div>
                                        <input type="text" class="form-control" list="archivos" ng-keyup="selectArchivo($event, 1)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Archivo 2</label>
                                    <input type="text" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="">Minimo</label>
                                    <input type="number" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label for="">Saltos</label>
                                    <input type="number" class="form-control"  >
                                </div>
                            
                                <button class="btn btn-primary">Submit</button>
                            </form>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Tiempo de Proceso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>

@endsection

@push('script')
<script src="{{asset('bower_components\angular\angular.min.js')}} "></script>
<script src="{{asset('js/comparacion.js')}} "></script>
@endpush