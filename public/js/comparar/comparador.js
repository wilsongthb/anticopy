Vue.component('comparador',{
    template: '#comparador',
    data: function(){
        return {
            select: false,
            archivo_1: {},
            archivo_2: {},
            resultados: [],
            comparando: false,
            minimo: 100,
            salto: 10
        }
    },
    methods: {
        joder: function(paco, archivo){
            alert('joder!' + paco);
        },
        seleccionar: function(item){
            this.$http.get(APP_URL + '/descargar/' + item.id).then(function(response){
                console.log(response);
                if(this.select == 1){
                    this.archivo_1 = item
                    this.archivo_1.contenido = response.body
                }
                else if (this.select == 2) {
                    this.archivo_2 = item
                    this.archivo_2.contenido = response.body
                } else {
                    console.log('ERROR: <>');
                }
            })
        },
        comparar: function(){
            this.comparando = true
            this.$http.post(APP_URL + '/comparar', {
                archivo_1: this.archivo_1.id,
                archivo_2: this.archivo_2.id,
                minimo: this.minimo,
                salto: this.salto
            }).then(function(response){
                // console.log(response);
                this.comparando = false;
                this.resultados = response.body;
            })
        },
        copy: function(key){
            console.log(key+'contenido')
            console.log(document.getElementById(key+'contenido').innerHTML)
            copyToClipboard(document.getElementById(key+'contenido').innerHTML);
        }
    }
})