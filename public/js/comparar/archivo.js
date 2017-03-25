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
        definir_archivo: function(id){
            // console.log(a);
            this.$emit('seleccionar', id);
        }
    },
    created: function(){
        this.buscar_archivo();
    }
})