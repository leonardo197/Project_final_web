
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include './header.php';
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $id = $_SESSION['id'];
        $nome = $_SESSION['nome'];
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $telefone = $_SESSION['telefone'];
        $morada = $_SESSION['morada'];
        $idade = $_SESSION['idade'];
        ?>

        <div ng-init="inicializa()" id="postApp" class="container" ng-app="postApp" ng-controller="postController">

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
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="alterarPerfil.php" method="POST">

                        <div class="form-group">
                            <label class="control-label col-sm-2">Username:</label>
                            <div class="col-sm-10"> 
                                <input name="username" class="form-control" placeholder="Coloque nome"value=<?php echo $username ?> >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Email:</label>
                            <div class="col-sm-10"> 
                                <input name="email" class="form-control" placeholder="Coloque a email"value=<?php echo $email ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Password:</label>
                            <div class="col-sm-10"> 
                                <input type="password" name="password" class="form-control" placeholder="Coloque a password"value=<?php echo $password ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Nome:</label>
                            <div class="col-sm-10"> 
                                <input name="nome" class="form-control" placeholder="Coloque o nome"value=<?php echo $nome ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Telefone:</label>
                            <div class="col-sm-10"> 
                                <input name="telefone" class="form-control" placeholder="Coloque o telefone"value=<?php echo $telefone ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Morada:</label>
                            <div class="col-sm-10"> 
                                <input name="morada" class="form-control" placeholder="Coloque a morada"value=<?php echo $morada ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Idade:</label>
                            <div class="col-sm-10"> 
                                <input name="idade" class="form-control" placeholder="Coloque a idade"value=<?php echo $idade ?>>
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-log-in"></span> Alterar Perfil</button>

                    </form>
                </div>

            </div>
        </div>
    </body>