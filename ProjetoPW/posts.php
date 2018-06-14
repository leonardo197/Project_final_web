
<div ng-init="inicializa()" id="postApp" class="container" ng-app="postApp" ng-controller="postController">
    <?php
    include 'avisoChat.php';
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    $id = $_SESSION['id'];
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">Posts</div>
        <!--NOVO SOLUCAO todo o script é novo-->
        <script>

            app.controller('postController', function ($scope) {
                $scope.posts = [];
                $scope.frases = "";
                $scope.maxIdPost = 0;

                $scope.inicializa = function ()
                {
                    setInterval("angular.element($('#postApp')).scope().chamaServicoLeituraPosts()", 1000);
                };


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

                $scope.chamaServicoLeituraPosts = function ()
                {

                    $.getJSON(
                            "servicoLeituraPosts.php",
                            {
                                "maxIdPost": $scope.maxIdPost
                            },
                            function (jsonData)
                            {
                                if ($scope.maxIdPost == 0)
                                {
                                    $scope.posts = jsonData;

                                    $scope.maxIdPost = $scope.posts[0]['idPost'];
                                } else
                                {
                                    $_postsAux = jsonData;

                                    if ($_postsAux.length > 0)
                                    {
                                        for ($i = $_postsAux.length - 1; $i >= 0; $i--)
                                        {
                                            $scope.posts.unshift($_postsAux[$i]);
                                        }

                                        $scope.maxIdPost = $scope.posts[0]['idPost'];
                                    }
                                }

                                $scope.$apply();

                            });
                };
                $scope.deletePost = function ($_idPost)
                {
                    $.post(
                            "deletePost.php",
                            {
                                "idPost": $_idPost

                            },
                            function (dados)
                            {
                                $scope.chamaServicoLeituraPosts();
                                $scope.$apply();
                            }
                    );

                };
                $scope.removeLike = function ($_idPost, $_meuLike)
                {
                    $scope.mensagemErro = "";
                    $scope.maxIdPost = 0;

                    if ($_meuLike == '1')
                    {
                        $.getJSON(
                                "removeMeuLike.php",
                                {
                                    "idPost": $_idPost
                                },
                                function (dados)
                                {
                                    $scope.posts = "";
                                    //alert(dados);
                                    if (dados.resposta == false)
                                    {
                                        $scope.mensagemErro = "ERRO DE COMUNICACAO";
                                    }
                                    //alert("dados: " + dados.resposta);
                                    $scope.chamaServicoLeituraPosts();
                                    $scope.$apply();

                                },
                                function () {
                                    $scope.mensagemErro = "ERRO DE COMUNICACAO";
                                    $scope.$apply();
                                }
                        );
                    }
                    if ($_meuLike == '0')
                    {

                        $.getJSON(
                                "doMeuLike.php",
                                {
                                    "idPost": $_idPost
                                },
                                function (dados)
                                {
                                    $scope.posts = "";
                                    //alert(dados);
                                    if (dados.resposta == false)
                                    {
                                        $scope.mensagemErro = "ERRO DE COMUNICACAO";
                                    }
                                    //alert("dados: " + dados.resposta);
                                    $scope.chamaServicoLeituraPosts();
                                    $scope.$apply();

                                },
                                function () {
                                    $scope.mensagemErro = "ERRO DE COMUNICACAO";
                                    $scope.$apply();
                                }
                        );
                    }
                };
            });

        </script>
        <br>
        <br>
        <textarea ng-model="frases" placeholder="Escreva aqui o seu post" class="form-control" id="txtpost" rows="3"></textarea>
        <a  ng-click="enviar()" ><span class="btn btn-success glyphicon glyphicon-send pull-right" type="button" />  ENVIAR</a>
        <br>
        <br>
        <style>
            .post{
                border: 1px solid lightgray;
                padding:10px;
            }
        </style>

        <div class="panel panel-default">

            <div class='row' ng-repeat="p in posts" >
                <div class="container">    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-footer">
                                <span class="glyphicon glyphicon-user" id="start"></span> <label id="started">By</label> {{p.nome}} |
                                <label id="started">{{p.data}}</label> |
                                <a href="" ng-click="removeLike(p.idPost, p.meulike);" id="startedby"><img src="img/{{p.meulike}}.png" style="height: 10px;"/></a> {{p.likes }} | 
                                <a ng-click="deletePost(p.idPost);" ng-class="p.idAutor == <?php echo $id; ?> ? '' : 'invisible'" id="startedby" href="posts.php"><span class="btn btn-danger glyphicon glyphicon-trash pull-right" type="button" /></a>
                            </div>
                            <div class="panel-body">
                                <p>{{p.texto}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>            
    </div>    
</div>






