<?php
//connessione al db

//$connessione = mysqli_connect("127.0.0.1", "root", "Root$1982","tutorial_mysql");
// creaimo delle variabili
$host = "127.0.0.1";
$user = "root";
$password = "Root$1982";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database);

//verifichiamo la connessione
if($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}
echo "Connessione avvenuta con successo: " . $connessione->host_info;

// per chiuderlo
//$connessione->close();

?>