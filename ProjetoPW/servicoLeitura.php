<?php

//necessário para dizer ao receptor que o conteudo é json
header("Content-type: application/json");

include './mysql/mysqlConnect.php';

$amigoDeConversaId = $_GET["amigoDeConversaId"];
    if (session_status() == PHP_SESSION_NONE)
        session_start();
$id = $_SESSION["id"];
$result = $GLOBALS["db.connection"]->query(
        "select * from mensagem where "
        . " ( idAutor = $id and idTarget = $amigoDeConversaId ) "
        . " OR "
        . " ( idAutor = $amigoDeConversaId and idTarget = $id ) "
        );

if($result == false)
{
    echo $GLOBALS["db.connection"]->error;
}

$todos = array();
while ($row = $result->fetch_assoc()) {
    $todos[] = $row; //atribui o array do user à ultima prosicao do array geral
}
echo json_encode($todos);

include './mysql/mysqlClose.php';



?>

