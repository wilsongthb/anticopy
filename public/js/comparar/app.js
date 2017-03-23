Vue.http.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
Vue.component('archivo', {
    template: '#archivo',
    data: function(){
        return {
            buscar: "",
            archivos: {}
        }
    },
    methods: {
        buscar_archivo: function(){
            this.$http.get(APP_URL + '/api/archivos', {
                params: {
                    buscar: this.buscar
                }
            }).then(function(response){
                this.archivos = response.data.data;
            })
        },
        definir_archivo: function(a){
            console.log(a);
            this.$emit('seleccionar', a);
        }
    },
    created: function(){
        this.buscar_archivo();
    }
})

Vue.component('comparador',{
    template: '#comparador',
    data: function(){
        return {
            archivo_1: {},
            archivo_2: {}
        }
    },
    methods: {
        joder: function(paco){
            alert('joder!' + paco);
        },
        seleccionar1: function(a){
            console.log(a);
            this.archivo_1 = a;
        }
    }
})

var app = new Vue({
    el: '#app'
});
