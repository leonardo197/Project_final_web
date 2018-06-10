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
        <a class="btn btn-default" href="index.php">Pagina Inicial</a>
        <a class="btn btn-default" href="chat.php">Entrar no CHAT</a>
        <a class="btn btn-default" href="">Encontrar Amigos</a>
        <a class="btn btn-default" href="">Meu Perfil</a>
        <!--<a class="btn btn-info" href="novoUser.php">Novo Registo</a>-->
    </div>
    <br>
        <a class="btn btn-danger pull-right" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Terminar Sessão</a>
    </div>
</div>
