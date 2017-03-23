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
        <input type="text" v-model="buscar" v-on:keyup.enter="buscar_archivo()">
        <div v-for="a in archivos">
            <button type="button" class="btn btn-default" v-on:click="definir_archivo(a.id)">@{{a.nombre}}</button>
        </div>
    </div>
</template>
<template id="comparador">
    <div> 
        <archivo v-on:seleccionar="seleccionar1"></archivo>
    </div>
</template>
@endsection

@push('script')
<script src="{{asset('bower_components\vue\dist\vue.js')}}"></script>
<script src="{{asset('bower_components\vue-resource\dist\vue-resource.js')}}"></script>
<script src="{{asset('js\comparar\app.js')}}"></script>
@endpush