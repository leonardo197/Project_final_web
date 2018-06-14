<?php

//require_once './estudante.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST["username"]))
    $username = $_POST["username"];

if (isset($_POST["password"]))
    $password = $_POST["password"];

$found = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    include './mysql/mysqlConnect.php';
    $sql = "SELECT * FROM utilizador where username = '" . $username . "' and password = '" . $password . "'";
    $result = $GLOBALS["db.connection"]->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $found = true;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["id"]; //NOVO
        $_SESSION["fraseApresentacao"] = " " . $row["nome"];
        $_SESSION["email"] = $row['email'];
        $_SESSION["nome"] = $row['nome'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["telefone"] = $row['telefone'];
        $_SESSION["morada"] = $row['morada'];
       $_SESSION["idade"] = $row['idade'];
    }
    include './mysql/mysqlClose.php';
}
include("index.php");
?>