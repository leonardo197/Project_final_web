<style>
    .header{
        background-color: #9acfea;   
        padding:10px;
        font-size: 16pt;
    }    
</style>


<div class=" clearfix header panel-body">    
    <div class="col-sm-4 clearfix">
        <br>
        <a class="btn btn-default" href="chat.php">Entrar no CHAT</a>
        <a class="btn btn-default" href="">Encontrar Amigos</a>
        <a class="btn btn-default" href="">Meu Perfil</a>
    </div>
    <div class="col-sm-3 pull-right">
        <div class="pull-right">    
            <?php
            if (session_status() == PHP_SESSION_NONE)
                session_start();
            $username = $_SESSION["username"];
            echo "Autenticado como $username - " . $_SESSION["fraseApresentacao"];
            ?>
        </div>
        <a class="btn btn-danger pull-right" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a>
    </div>
</div>

