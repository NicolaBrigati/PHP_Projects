<?php

require_once('config.php');  // Include la configurazione del database

$sql = 'SELECT * FROM persone';

// Esegui la query al database
if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0){
        // Se ci sono righe, prepara i dati da restituire
        $data = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $tmp;
            $tmp['id'] = $row['id'];
            $tmp['nome'] = $row['nome'];
            $tmp['cognome'] = $row['cognome'];
            $tmp['email'] = $row['email'];
            array_push($data, $tmp);
        }
        // Restituisci i dati in formato JSON
        echo json_encode($data);
    } else {
        // Restituisci una risposta JSON che indica che non ci sono righe
        echo "Non ci sono righe disponibili";
    }
} else {
    // Restituisci una risposta JSON con l'errore SQL
    echo "Errore di esecuzione di $sql. " . $connessione->error;
}

?>