<style>
    .header{
        background-color: #9acfea;   
        padding:10px;
        font-size: 16pt;
    }    
</style>


<div class=" clearfix header panel-body">    
    <div class="col-sm-7 clearfix">
        <div>    
            <?php
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            $username = $_SESSION["username"];
            echo "Ola " . $_SESSION["fraseApresentacao"];
            ?>
        </div>
        <ul class="nav nav-tabs header">
            <li class="nav-item"><a class="nav-link active" href="index.php">Pagina Inicial</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="chat.php">Entrar no CHAT</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="amigos.php">Encontrar Amigos</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="">Meu Perfil</a>
            </li>
        </ul>
        <!--        <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-default" href="index.php">Pagina Inicial</a>
                    <a class="btn btn-default" href="chat.php">Entrar no CHAT</a>
                    <a class="btn btn-default" href="amigos.php">Encontrar Amigos</a>
                    <a class="btn btn-default" href="">Meu Perfil</a>
                </div>-->
        <!--<a class="btn btn-info" href="novoUser.php">Novo Registo</a>-->
    </div>
    <br>
    <a class="btn btn-danger pull-right" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Terminar Sessão</a>
</div>
</div>



