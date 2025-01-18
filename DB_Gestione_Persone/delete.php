<?php

require_once('config.php');

// Ricevi l'ID via JSON
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

// Query di eliminazione
$sql = "DELETE FROM persone WHERE id='$id'";

if ($connessione->query($sql) === TRUE) {
    echo json_encode([
        'message' => 'Persona eliminata con successo',
        'response' => 1
    ]);
} else {
    echo json_encode([
        'message' => 'Errore durante l\'eliminazione: ' . $connessione->error,
        'response' => 0
    ]);
}

?>
