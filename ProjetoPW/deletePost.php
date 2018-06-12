<?php

header("Content-type: application/json");

$idPost = $_POST["idPost"]; 

include './mysql/mysqlConnect.php';

$sql_novo = "delete from post where idPost=$idPost" ;

$result = $GLOBALS["db.connection"]->query($sql_novo);

include './mysql/mysqlClose.php';
include 'href="index.php';
?>