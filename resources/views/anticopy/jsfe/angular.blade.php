@extends('anticopy.principal')
@section('cuerpo')

<div class="container" ng-app="app" ng-controller="ctrl">
    <div class="row">
        @{{msg}}
        <h3>Archivos</h3>
        
        <a class="btn btn-primary" data-toggle="modal" href='#modal-Subir'>Trigger modal</a>
        <div class="modal fade" id="modal-Subir">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Subir Archivo</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="r in registros">
                    <td ng-bind="r.id"></td>
                    <td ng-bind="r.nombre"></td>
                    <td>
                        <a href="@{{r.url}}" title="Descargar">
                            <button class="btn">
                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
@endsection

@push('script')
<script src=" {{asset('dist\js\angular.js')}} "></script>
<script src=" {{asset('js\angular_app.js')}} "></script>
@endpush