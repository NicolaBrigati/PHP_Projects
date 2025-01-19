<?php

$host = "127.0.0.1";
$user = "root";
$password = "insert_psw";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password); //qua ho tolto l'accesso al db, perchè dobbiamo crearlo

//verifichiamo la connessione
if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

$sql = "CREATE DATABASE db_prova";
if($connessione->query($sql) == true){
    echo "Databese creato con successo";
}else{
    echo "Errore creazione database: ". $connessione->error;
}

$connessione->close();

?>
