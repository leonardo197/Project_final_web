<html>
  <head>
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <script src="bootstrap/jquery.min.js"></script>
          <script src="bootstrap/js/bootstrap.min.js"></script>
          <!-- style movido para o header.php -->
         <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
         <script src="angular/angular.min.js"></script>
  </head>
  
     <body ng-app="rootApp">
      <script>
        var minhasApps = [];
        var rootApp = angular.module('rootApp', minhasApps);
      </script>
        <div>

            <?php
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            if (isset($_SESSION["username"])) {
                include './header.php';

            } else {
                ?>

                <div class="panel panel-default">
                    <div class="panel-heading">Autênticação</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="login.php" method="POST">
                            <label class="control-label col-sm-1"><h1>FACE</h1></label>
                            <div class="form-group pull-right">
                                <div class="col-sm-1"> </div>
                                <label class="control-label col-sm-1">Username:</label>
                                <div class="col-sm-2"> 
                                    <input name="username" class="form-control" placeholder="Coloque o username">
                                </div>

                                <label class="control-label col-sm-1">Password:</label>
                                <div class="col-sm-2"> 
                                    <input type="password" name="password" class="form-control" placeholder="Coloque a password">
                                
                            </div>
                                <div class="col-sm-3"> 
                            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
                            <a class="btn btn-info" href="novoUser.php">Novo Registo</a>
                               </div>
                            </div>
                        </form>
                    </div>

                </div>

                <?php
                include './listaUtilizadores.php';
            }

        if(isset($_SESSION["id"]))
        {
            include 'avisoChat.php';
            include './posts.php';
        }
            ?>


    </body>
</html>

