angular.module('app', [])
.controller('ctrl', function($scope, $http){
    $scope.msg = 'Hola JS';
    $scope.registros = [];

    // Funciones
    $scope.leer = function(){
        $http({
            method: 'get',
            url: APP_URL + '/api/archivos'
        }).then(
        /**
         * Asincrono
         * Se encarga de traer los registros
         */
        function(response){
            $scope.registros = response.data.data;
        })
    }
    
    $scope.leer();
})