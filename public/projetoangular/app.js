'use strict'

angular.module('myApp', ['ngRoute', 'myApp.controllers'])
        .config(
                ['$routeProvider',
                    function($routerProvider) {
                        $routerProvider
                                .when('/categorias/', {
                                    templateUrl: 'projetoangular/templates/categorias.html', 
                                    controller: 'CategoriasCtrl'
                                })
                                .when('/categorias/novo', {
                                    templateUrl: 'projetoangular/templates/categorias_novo.html', 
                                    controller: 'CategoriasCtrl'                                    
                                })
                                .when('/categorias/editar/:id', {
                                    templateUrl: 'projetoangular/templates/categorias_editar.html', 
                                    controller: 'CategoriasCtrl'                                    
                                })
                                .when('/produtos/', {
                                    templateUrl: 'projetoangular/templates/produtos.html', 
                                    controller: 'ProdutosCtrl'
                                })
                                .when('/produtos/novo', {
                                    templateUrl: 'projetoangular/templates/produtos_novo.html', 
                                    controller: 'ProdutosCtrl'                                    
                                })
                                .when('/produtos/editar/:id', {
                                    templateUrl: 'projetoangular/templates/produtos_editar.html', 
                                    controller: 'ProdutosCtrl'                                    
                                })
                    }
                ]);

