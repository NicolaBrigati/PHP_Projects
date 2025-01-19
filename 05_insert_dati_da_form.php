<?php

$host = "127.0.0.1";
$user = "root";
$password = "insert_psw";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database); //qua ho rimesso database

//verifichiamo la connessione
if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

//gestisco i dati che arrivano dal form:
$Nome = $connessione->real_escape_string($_REQUEST['nome']);
$Cognome = $connessione->real_escape_string($_REQUEST['cognome']);
$Email = $connessione->real_escape_string($_REQUEST['email']);

//qua li inserisco nel database:
$sql = "INSERT INTO persone (nome, cognome, email) VALUES
('$Nome', '$Cognome', '$Email')";


if ($connessione->query($sql) === true) {
    $ultimo_elemento = $connessione->insert_id;
    echo "Persona inserita con successo. Il suo ultimo id è:" . $ultimo_elemento;
} else {
    echo "Errore nella creazione dei dati: " . $connessione->error;
}

$connessione->close();

?>
