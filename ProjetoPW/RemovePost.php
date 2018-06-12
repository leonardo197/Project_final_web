<?php

include './mysql/mysqlConnect.php';

header("Content-type: application/json");


session_start();

$id = $_SESSION["id"];

$sql_novo = "DELETE FROM post WHERE idPost='$posts'";
$result = $GLOBALS["db.connection"]->query($sql_novo);

include './mysql/mysqlClose.php';