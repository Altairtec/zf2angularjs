categorias
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
                );