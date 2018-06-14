
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div ng-init="inicializa()" id="postApp" class="container" ng-app="postApp" ng-controller="postController">
            <?php
            include './header.php';
            ?>

            <script>
                var app = angular.module('postApp', minhasApps);
                app.controller('postController', function ($scope) {
                    $scope.inicializa = function ()
                    {
                        angular.element($('#postApp')).scope().chamaServicoLeituraPosts();
                    };

                    $scope.chamaServicoLeituraPosts = function ()
                    {

                        $.getJSON(
                                "servicoLeituraPerfil.php",
                                {

                                }, function (jsonData)
                        {

                            $scope.id = jsonData.id;
                            $scope.username = jsonData.username;
                            $scope.password = jsonData.password;
                            $scope.nome = jsonData.nome;
                            $scope.morada = jsonData.morada;
                            $scope.idade = jsonData.idade;
                            
                            $scope.s();

                        });
                    };
                    };
                });

            </script>
            <div class="panel panel-default">
                <div class="panel-heading">Registo</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="alterarPerfil.php" method="POST">

                        <div class="form-group">
                            <label class="control-label col-sm-2">Username:</label>
                            <div class="col-sm-10"> 
                                <input name="username" class="form-control" placeholder={{id}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Email:</label>
                            <div class="col-sm-10"> 
                                <input name="email" class="form-control" placeholder="Coloque a email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Password:</label>
                            <div class="col-sm-10"> 
                                <input type="password" name="password" class="form-control" placeholder="Coloque a password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Nome:</label>
                            <div class="col-sm-10"> 
                                <input name="nome" class="form-control" placeholder="Coloque o nome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Telefone:</label>
                            <div class="col-sm-10"> 
                                <input name="telefone" class="form-control" placeholder="Coloque o telefone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Morada:</label>
                            <div class="col-sm-10"> 
                                <input name="morada" class="form-control" placeholder="Coloque a morada">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Idade:</label>
                            <div class="col-sm-10"> 
                                <input name="idade" class="form-control" placeholder="Coloque a idade">
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-log-in"></span> Alterar Perfil</button>

                    </form>
                </div>

            </div>
        </div>
    </body>