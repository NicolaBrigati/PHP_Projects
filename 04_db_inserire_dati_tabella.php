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

$sql = "INSERT INTO persone (nome, cognome, email) VALUES
('Francesco', 'Rozzi', 'l.rozzi@gmail.com'),
('Marco', 'Bianchi', 'marco.bianchi@gmail.com'),
('Giulia', 'Verdi', 'giulia.verdi@yahoo.com'),
('Francesca', 'Neri', 'f.neri@hotmail.com'),
('Antonio', 'Russo', 'antonio.russo@gmail.com'),
('Chiara', 'Ferri', 'chiara.ferri@outlook.com'),
('Matteo', 'Conti', 'matteo.conti@gmail.com'),
('Elena', 'Gallo', 'elena.gallo@gmail.com'),
('Davide', 'Ricci', 'davide.ricci@yahoo.com'),
('Sara', 'Marini', 'sara.marini@libero.it'),
('Alessandro', 'De Luca', 'a.deluca@gmail.com');";


if ($connessione->query($sql) === true) {
    echo "Dati in 'persone' creati con successo.";
} else {
    echo "Errore nella creazione dei dati: " . $connessione->error;
}


//come verificare l'ultimo id inserito:
//if ($connessione->query($sql) === true) {
//    $ultimo_elemento = $connessione->insert_id;
//    echo "Persona inserita con successo. Il suo ultimo id è:" . $ultimo_elemento;
//} else {
//    echo "Errore nella creazione dei dati: " . $connessione->error;
//}
//$connessione->close();

?>