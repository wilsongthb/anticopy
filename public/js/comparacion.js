angular.module('comparacion', [])
    .factory('archivosService', function($http){
        return {
            leer: function(buscar){
                return $http.get(APP_URL + '/api/archivos', {
                    params: {
                        buscar: buscar
                    }
                })
            }
        }
    })
    .controller('comparacionController', function($scope, $http, archivosService){
        // Atributos
        $scope.mensaje = 'Hola Mundo';
        $scope.nuevoregistro = {};
        $scope.archivos = [];

        // Metodos
        $scope.leer = function(){
            $http({
                method: 'GET',
                url: APP_URL + '/api/comparacion',
                params: {
                }
            }).then(function(response){
                // SUCCESS
                console.log(response);
            }, function(response){
                // ERROR
            })
        }
        $scope.getArchivos = function(buscar){
            archivosService.leer('').then(function(response){
                // SUCCESS
                $scope.archivos = response.data.data;
            });
        }
        $scope.selectArchivo = function(event, archivo){
            console.log(event.keyCode);
        }

        $scope.leer();
        $scope.getArchivos();
    })