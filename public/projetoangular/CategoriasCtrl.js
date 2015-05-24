categorias
        .controller('CategoriasCtrl',
                ['$scope', 'CategoriasSrv', '$location', '$routeParams',
                    function($scope, CategoriasSrv, $location, $routeParams) {
                        $scope.nome = "Olá Jonathan, bem vindo ao Angular Js";

                        $scope.load = function() {
                            $scope.registros = CategoriasSrv.query();
                        }
                        //$scope.load();

                        $scope.get = function() {
                            $scope.item = CategoriasSrv.get({id: $routeParams.id});
                        }

                        $scope.add = function(item) {
                            $scope.result = CategoriasSrv.save(
                                    {},
                                    //$jQuery.param(item),
                                    item,
                                    function(data, status, headers, config) {
                                        $location.path('/categorias/');
                                    },
                                    function(data, status, headers, config) {
                                        alert('Erro ao inserir registro: ' + data.messages[0]);
                                    }
                            )
                        }

                        $scope.editar = function(item) {
                            $scope.result = CategoriasSrv.update(
                                    {id: $routeParams.id},
                                    item,
                                    function(data, status, headers, config) {
                                        $location.path('/categorias/');
                                    },
                                    function(data, status, headers, config) {
                                        alert('Erro ao inserir registro: ' + data.messages[0]);
                                    }
                            )
                        }

                        $scope.delete = function(id) {
                            if (confirm('Deseja realmente excluir esse registro?')) {
                                CategoriasSrv.remove(
                                        {id: id},
                                        {},
                                        function(data, status, headers, config) {
                                            $location.path('/categorias/');
                                        },
                                        function(data, status, headers, config) {
                                            alert('Erro ao inserir registro: ' + data.messages[0]);
                                        }
                                )
                            }
                        }
                    }
                ]
                );