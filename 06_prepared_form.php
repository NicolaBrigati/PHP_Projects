<?php

// prepared and execute >> automatizzo da form a db MOLTO FICO
//lo statement lo manda al server lo controlla e lo salva per dopo
//una volta fatto l'execute rimanda lo stantemant e lo compila

$host = "127.0.0.1";
$user = "root";
$password = "insert_psw";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database); //qua ho rimesso database

//verifichiamo la connessione
if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

//creo lo statemnt per ogni volta che mando valori in modo da automatizzare:
$sql = "INSERT INTO persone (nome, cognome, email) VALUES (?,?,?)";

//gestisco i dati che arrivano dal form:
    $Nome = $connessione->real_escape_string($_REQUEST['nome']);
    $Cognome = $connessione->real_escape_string($_REQUEST['cognome']);
    $Email = $connessione->real_escape_string($_REQUEST['email']);

if ($statement = $connessione->prepare($sql)){
    $statement->bind_param("sss", $nome, $cognome, $email);
    $nome = $_REQUEST['nome'];
    $cognome = $_REQUEST['cognome'];
    $email = $_REQUEST['email'];
    $statement->execute();

echo "Record inseriti con successo";

}else{echo "Errore non è possiile eseguire la query: $sql. " . $connessione->error;
}
$statement->close();
$connessione->close();

?>
