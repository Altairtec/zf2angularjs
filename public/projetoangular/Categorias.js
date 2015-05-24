var categorias = angular.module('Categorias', ['ngRoute', 'ngResource']);

categorias
        .config(
                ['$routeProvider',
                    function($routerProvider) {
                        $routerProvider
                                .when('/categorias/', {
                                    templateUrl: 'projetoangular/templates/categorias.html'
                                })
                                .when('/categorias/novo', {
                                    templateUrl: 'projetoangular/templates/categorias_novo.html'                                    
                                })
                                .when('/categorias/editar/:id', {
                                    templateUrl: 'projetoangular/templates/categorias_editar.html'                                    
                                });
                    }
                ]);

