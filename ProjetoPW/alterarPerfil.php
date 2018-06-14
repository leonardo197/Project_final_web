<?php

$nome = $_POST["nome"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$telefone = $_POST["telefone"];
$morada = $_POST["morada"];
$idade = $_POST["idade"];
$id = $_SESSION["id"];

include './mysql/mysqlConnect.php';

$sql = "UPDATE  into utilizador username='$username',nome='$nome', email='$email',"
        . "morada='$morada', telefone='$telefone',password='$password',idade='$idade')"
        . "WHERE  id=$id;";


if ($GLOBALS["db.connection"]->query($sql) === TRUE) {
    echo "Registo criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $GLOBALS["db.connection"]->error;
}
include './mysql/mysqlClose.php';

include("index.php");