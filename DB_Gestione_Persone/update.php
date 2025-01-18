<?php

require_once('config.php');

// Ricevi i dati via JSON
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nome = $connessione->real_escape_string($data['nome']);
$cognome = $connessione->real_escape_string($data['cognome']);
$email = $connessione->real_escape_string($data['email']);

// Query di aggiornamento
$sql = "UPDATE persone SET nome='$nome', cognome='$cognome', email='$email' WHERE id='$id'";

if ($connessione->query($sql) === TRUE) {
    echo json_encode([
        'message' => 'Persona aggiornata con successo',
        'response' => 1
    ]);
} else {
    echo json_encode([
        'message' => 'Errore durante l\'aggiornamento: ' . $connessione->error,
        'response' => 0
    ]);
}

?>
