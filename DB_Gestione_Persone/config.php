t<?php
//creiamo qui le configurazioni per connettersi al db. 
//questa non la tocchiamo piu

$host = "127.0.0.1";
$user = "root";
$password = "insert psw";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

?>

