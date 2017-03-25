Vue.component('comparador',{
    template: '#comparador',
    data: function(){
        return {
            select: 0,
            archivo_1: "",
            archivo_2: ""
        }
    },
    methods: {
        joder: function(paco, archivo){
            alert('joder!' + paco);
        },
        seleccionar: function(id){
            this.$http.get(APP_URL + '/descargar/' + id).then(function(response){
                console.log(response);
                if(this.select == 1)
                    this.archivo_1 = response.body
                else if (this.select == 2) {
                    this.archivo_2 = response.body
                } else {
                    console.log('ERROR: <>');
                }
                    
            })
        }
    }
})