<?php

include './mysql/mysqlConnect.php';

$mensagem = $_POST["mensagem"];

//NOVO
session_start();
$destinatario = $_GET["destinatario"];
$mensagem = $_POST["mensagem"];
$id = $_SESSION["id"];

//$sql_Antes = "insert into mensagem (data,texto) VALUES(NOW(),'$mensagem')";
$sql_novo = "insert into mensagem (data,texto,idAutor,idTarget) "
        . " VALUES(NOW(),'$mensagem',$id,$destinatario)";

$GLOBALS["db.connection"]->query($sql_novo);

$sql_novo = "insert into amigos (idAmigo1,idAmigo2) "
        . " VALUES(NOW(),'$id'$destinatario)";

$GLOBALS["db.connection"]->query($sql_novo);




include './mysql/mysqlClose.php';

include 'chat.php';
