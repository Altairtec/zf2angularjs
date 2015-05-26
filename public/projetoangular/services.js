'use strict'

angular.module('myApp.services', ['ngResource'])
        .factory('CategoriasSrv',
                ['$resource', function($resource) {
                        return $resource(
                                '/api/categoria/:id', {
                                    id: '@id'
                                },
                        {
                            update: {
                                method: 'PUT',
                                url: '/api/categoria/:id'
                            }
                        }
                        )
                    }]
                )
        .factory('ProdutosSrv',
                ['$resource', function($resource) {
                        return $resource(
                                '/api/produto/:id', {
                                    id: '@id'
                                },
                        {
                            update: {
                                method: 'PUT',
                                url: '/api/produto/:id'
                            }
                        }
                        )
                    }]
                )
        ;