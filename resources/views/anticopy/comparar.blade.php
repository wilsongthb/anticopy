@extends('anticopy.principal')
@section('cuerpo')

<div class="container" id="app">
    <div class="row">
        <h3>Comparar</h3>
        <comparador></comparador>
    </div>
</div>

<template id="archivo">
    <div>
        <!--<a class="btn btn-primary" data-toggle="modal" href='#archivo'>Seleccionar Archivo</a>-->
        <div class="modal fade" id="archivo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="buscar" v-on:keyup.enter="buscar_archivo()" class="form-control">
                        <div v-for="a in archivos">
                            <button type="button" class="btn btn-default" v-on:click="definir_archivo(a.id)">@{{a.nombre}}</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<template id="comparador">
    <div>
        <div class="row">
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3>Archivo Base</h3>
                <a class="btn btn-primary" data-toggle="modal" href='#archivo' v-on:click="select = 1">Seleccionar</a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3>Archivo para Comparar</h3>
                <a class="btn btn-primary" data-toggle="modal" href='#archivo' v-on:click="select = 2">Seleccionar</a>
            </div>
            <archivo v-on:seleccionar="seleccionar"></archivo>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h4>Archivo 1 <small>Vista Previa</small></h4>
                <p style="
                    
                    display: block;
                    font-family: monospace;
                    margin: 1em 0;
                ">
                    @{{archivo_1}}
                </p>
                <!--<pre>@{{archivo_1}}</pre>-->
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h4>Archivo 2 <small>Vista Previa</small></h4>
                <pre>@{{archivo_2}}</pre>
            </div>
        </div>
    </div>
</template>
@endsection

@push('script')
<script src="{{asset('bower_components\vue\dist\vue.js')}}"></script>
<script src="{{asset('bower_components\vue-resource\dist\vue-resource.js')}}"></script>
<script src="{{asset('js\comparar\archivo.js')}}"></script>
<script src="{{asset('js\comparar\comparador.js')}}"></script>
<script src="{{asset('js\comparar\app.js')}}"></script>
@endpush