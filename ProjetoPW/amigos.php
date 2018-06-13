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
    <body>
        <?php
        include './header.php';
        ?>

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
                        $scope.enviar = function (p)
                        {
                            //alert("Post on");
                            $.post(
                                    "addPostsRest.php",
                                    {
                                        "frases": $scope.frases

                                    },
                                    function (dados)
                                    {

                                    }
                            );
                            $scope.frases = '';
                        };
                    </script>

                </div>

                <!--SOLUCAO todo o script faz parte da solução-->

                <select id="destinatarioSelect" class="form-control" name="destinatario">
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
                <textarea ng-model="frases" placeholder="Escreva aqui o seu post" class="form-control" id="txtpost" rows="3"></textarea>
                <a  ng-click="enviar()" ><span class="btn btn-success glyphicon glyphicon-send pull-right" type="button" />  SEGIR</a>
                <a  ng-click="deletePost(p.idPost);" id="startedby"><span class="btn btn-danger glyphicon glyphicon-trash pull-right" type="button" />  NAO SEGIR</a>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
