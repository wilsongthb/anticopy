@extends('anticopy.principal')
@section('cuerpo')

<div class="container" id="app">
<!--<div class="container-fluid" id="app">-->
    <div class="row">
        <h3>Comparar</h3>
        <comparador></comparador>
    </div>
</div>
<style>
    .vista-previa{
        height: 600px;
        overflow: auto;
        white-space: pre;
    }
</style>
<template id="archivo">
    <div>
        <!--<a class="btn btn-primary" data-toggle="modal" href='#archivo'>Seleccionar Archivo</a>-->
        <div class="modal fade" id="archivo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Archivos</h4>
                    </div>
                    <div class="modal-body">
                        <label for="">Buscar archivo</label>
                        <input type="text" v-model="buscar" v-on:keyup.enter="buscar_archivo()" class="form-control">
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
                                <tr v-for="a in archivos">
                                    <td>
                                        @{{(a.nombre.length > 30) ? a.nombre.substring(0, 30) + '...' : a.nombre}}
                                    </td>
                                    <td>
                                        @{{formatBytes(a.size)}}
                                    </td>
                                    <td>
                                        @{{a.mimetype}}
                                    </td>
                                    <td>
                                        <a v-bind:href="linkDescarga(a.id)" title="Descargar">
                                            <button class="btn">
                                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                        <a title="Seleccionar" v-show="a.mimetype === 'text/plain'">
                                            <button class="btn btn-primary" v-on:click="definir_archivo(a)" data-dismiss="modal">
                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<template id="comparador">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!--<button type="button" class="btn btn-large btn-block btn-success" @click="comparar">Comparar</button>-->
            <template v-if="!comparando">
                <button type="button" class="btn btn-success" @click="comparar">
                    Comparar
                </button>    
                <div class="form-group">
                    <label for="">Longitud minima</label>
                    <input type="number" class="form-control" v-model="minimo">
                </div>
                <div class="form-group">
                    <label for="">Velocidad, Salto</label>
                    <input type="number" class="form-control" v-model="salto">
                </div>
            </template>
            <template v-else>
                <button type="button" class="btn btn-success">
                    <span v-show="comparando" class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                    Comparando
                </button>    
            </template>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div v-for="(r, key, index) in resultados">
                <!--<button id="demo" onclick="copyToClipboard(document.getElementById('demo').innerHTML)">This is what I want to copy</button>-->
                <!--<button @click="copy(key)" type="button" class="btn btn-default">Copiar al Portapapeles</button>-->
                <pre :id="key + 'contenido'">@{{r}}</pre>
                <!--<div class="vista-previa" :id="key + 'contenido'">
                    @{{r}}
                </div>-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3>Archivo Base</h3>
            <a class="btn btn-primary" data-toggle="modal" href='#archivo' v-on:click="select = 1">Seleccionar</a>
            <div v-if="select">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" placeholder="Input field" v-model="archivo_1.id" disabled>
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" placeholder="Input field" v-model="archivo_1.nombre" disabled>
                </div>
                <div class="vista-previa">
                    @{{archivo_1.contenido}}
                </div>
                <!--<pre>@{{archivo_1.contenido}}</pre>-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3>Archivo para Comparar</h3>
            <a class="btn btn-primary" data-toggle="modal" href='#archivo' v-on:click="select = 2">Seleccionar</a>
            <div v-if="select">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" placeholder="Input field" v-model="archivo_2.id" disabled>
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" placeholder="Input field" v-model="archivo_2.nombre" disabled>
                </div>
                <div class="vista-previa">
                    @{{archivo_2.contenido}}
                </div>
                <!--<pre>@{{archivo_2.contenido}}</pre>-->
            </div>
        </div>
        <archivo v-on:seleccionar="seleccionar"></archivo>

    </div>
</template>
@endsection

@push('script')
<script src="{{asset('js\funciones.js')}}"></script>
<script src="{{asset('bower_components\vue\dist\vue.js')}}"></script>
<script src="{{asset('bower_components\vue-resource\dist\vue-resource.js')}}"></script>
<script src="{{asset('js\comparar\archivo.js')}}"></script>
<script src="{{asset('js\comparar\comparador.js')}}"></script>
<script src="{{asset('js\comparar\app.js')}}"></script>
@endpush