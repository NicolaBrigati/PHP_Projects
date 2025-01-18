<?php
require_once('config.php');

// Verifica che il form sia stato inviato correttamente
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Controlla che tutti i campi siano stati compilati
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

        // Pulisce i dati ricevuti
        $email = $connessione->real_escape_string($_POST['email']);
        $username = $connessione->real_escape_string($_POST['username']);
        $password = $connessione->real_escape_string($_POST['password']);

        // Hash della password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query per inserire l'utente
        $sql = "INSERT INTO utenti (email, username, password) VALUES ('$email', '$username', '$hashed_password')";

        if ($connessione->query($sql) === TRUE) {
            echo "Registrazione effettuata con successo. <a href='login.html'>Vai al login</a>";
        } else {
            echo "Errore durante la registrazione: " . $connessione->error;
        }

    } else {
        echo "Compila tutti i campi del modulo.";
    }
    
    $connessione->close();

} else {
    echo "Richiesta non valida.";
}
?>

