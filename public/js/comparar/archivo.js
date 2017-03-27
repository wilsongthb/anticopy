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
        definir_archivo: function(item){
            console.log(item);
            this.$emit('seleccionar', item);
        },
        formatBytes: function(bytes) { 
            return G_formatBytes(bytes);
        },
        linkDescarga: function(item){
            return APP_URL + '/descargar/' + item;
        }
    },
    created: function(){
        this.buscar_archivo();
    }
})