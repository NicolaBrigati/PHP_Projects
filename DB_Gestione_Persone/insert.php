<?php

require_once('config.php');

// Ricevi i dati come JSON
$data = json_decode(file_get_contents("php://input"), true);

// Estrai i valori dei campi
$nome = $connessione->real_escape_string($data['nome']);
$cognome = $connessione->real_escape_string($data['cognome']);
$email = $connessione->real_escape_string($data['email']);

// Verifica che tutti i campi siano presenti
if (empty($nome) || empty($cognome) || empty($email)) {
    echo json_encode([
        'message' => 'Dati mancanti',
        'response' => 0
    ]);
    exit;
}

// Controlla se l'email esiste già nel database
$query = "SELECT COUNT(*) as count FROM persone WHERE email = '$email'";
$result = $connessione->query($query);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    // Se l'email esiste già, invia un messaggio di errore
    echo json_encode([
        'message' => 'L\'email è già presente nel database.',
        'response' => 0
    ]);
    exit;
}

// Prepara la query SQL per inserire i dati nel database
$sql = "INSERT INTO persone (nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";

if ($connessione->query($sql) === TRUE) {
    echo json_encode([
        'message' => 'Persona inserita con successo',
        'response' => 1
    ]);
} else {
    echo json_encode([
        'message' => 'Errore durante l\'inserimento: ' . $connessione->error,
        'response' => 0
    ]);
}

?>
