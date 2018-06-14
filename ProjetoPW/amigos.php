<?php
//incluir o ficheiro mysqConnect para abrir ligação a mysql
include './mysql/mysqlConnect.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <script src="angular/angular.min.js"></script>
    </head>
    <?php
    include './header.php';
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    $id = $_SESSION['id'];
    ?>
    <body>

        <!--<div ng-init="inicializa()" id="postApp" class="container" ng-app="postApp" ng-controller="postController">-->


        <!--COLOCAR AQUI neste div AS DECLARACOES DO ANGULAR ng-app ng-controller e id-->
        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Enviar pedido de amizade

                </div>
                <div class="panel-body">

                    <style>
                        .chat{
                            border: 1px solid lightgray;
                            padding:10px;
                        }

                    </style>


                    <script>
                        var app = angular.module('postApp', []);
                        app.controller('postController', function ($scope) {
                            $scope.enviar = function (p)
                            {
                                //alert("Post on");
                                $.post(
                                        "addamigos.php",
                                        {
                                            "destinatario": $scope.novoamigo,
                                            "mensagem": $scope.frases,
                                        },
                                        function (dados)
                                        {

                                        }
                                );
                                $scope.frases = '';
                            };
                        });
                    </script>

                </div>

                <!--SOLUCAO todo o script faz parte da solução-->

                <select class="form-control" ng-model="novoamigo">
                    <?php
                    $result = $GLOBALS["db.connection"]->query(
                            "select * from utilizador");
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["id"] ?>">
                            <?php echo $row["nome"] ?>
                        </option>    
                        <?php
                    }
                    ?>
                </select>
                <textarea ng-model="frases" placeholder="Escreva aqui a sua mensagem" class="form-control" id="txtpost" rows="3"></textarea>
                <a  ng-click="enviar()" ><span class="btn btn-success glyphicon glyphicon-send pull-right" type="button" />  SEGUIR</a>
                <a  ng-click="deletePost(p.idPost);" id="startedby"><span class="btn btn-danger glyphicon glyphicon-trash pull-right" type="button" />  NAO SEGUIR</a>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>
