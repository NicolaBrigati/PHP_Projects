<?php
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pulisci i dati ricevuti dal form
    $username = $connessione->real_escape_string($_POST['username']);
    $password = $connessione->real_escape_string($_POST['password']);

    // Query per verificare l'utente nel database
    $sql_select = "SELECT * FROM utenti WHERE username = '$username'";

    if ($result = $connessione->query($sql_select)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Verifica se la password è corretta
            if (password_verify($password, $row['password'])) {
                // Inizia la sessione e salva i dati
                session_start();

                $_SESSION['loggato'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                // Reindirizza alla pagina privata
                header("Location: area-privata.php");
                exit;
            } else {
                echo "La Password non è corretta.";
            }
        } else {
            echo "Non ci sono account con quello Username.";
        }
    } else {
        echo "Errore in fase di login.";
    }
    $connessione->close();
}
?>
