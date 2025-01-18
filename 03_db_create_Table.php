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

$sql = "CREATE TABLE IF NOT EXISTS persone (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
 );";
if ($connessione->query($sql) === true) {
    echo "Tabella 'persone' creata con successo.";
} else {
    echo "Errore nella creazione della tabella: " . $connessione->error;
}

$connessione->close();

?>