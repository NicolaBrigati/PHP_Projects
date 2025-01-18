<?php

$host = "127.0.0.1";
$user = "root";
$password = "Root$1982";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database); //qua ho rimesso database

//verifichiamo la connessione
if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

//definisco qui cosa voglio cambiare. se dimentico il where modifica tutto
$sql = "UPDATE persone SET email='gbertinotti@hotmail.com' WHERE id='62'";
if($connessione->query($sql) === true){
    echo "Riga query aggiornata con successo";
}else{
    echo "Errore nella modifica" . $connessione->error;
}

$connessione->close();



//se voglio cancellare:
//$sql = "DELETE FROM persone WHERE id='62'";
?>