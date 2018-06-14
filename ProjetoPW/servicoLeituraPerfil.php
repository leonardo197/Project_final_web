<?php

//necessário para dizer ao receptor que o conteudo é json
header("Content-type: application/json");

include './mysql/mysqlConnect.php';



session_start();
$id = $_SESSION["id"];

        
//NOVA QUERY PARA A SOLUCAO DO EXERCICIO 10
$query = "SELECT u.* FROM utilizador u  where u.id = $id " ;

$result = $GLOBALS["db.connection"]->query($query);


if($result == false)
{
    echo $GLOBALS["db.connection"]->error;
}

echo json_encode($result->fetch_assoc());

include './mysql/mysqlClose.php';


?>