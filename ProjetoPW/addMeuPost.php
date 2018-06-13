  <?php

include './mysql/mysqlConnect.php';

$posts = $_POST["posts"];

//NOVO
session_start();
$id = $_SESSION["id"];

//--------------ENVIA MESAGEM
$sql_novo = "insert into post (idAutor,idPost) "
        . " VALUES($id,$posts)";

$GLOBALS["db.connection"]->query($sql_novo);
//-------------ENVIA SEGIR
$sql_novo = "INSERT INTO "
        . " likes"
        . " VALUE(". $idPost .", ".$id.")";

$result = $GLOBALS["db.connection"]->query($sql_novo);


include './mysql/mysqlClose.php';

while($row = $result->fetch_assoc()) 
{   
         echo '{ "resposta" : true }';
    
}

