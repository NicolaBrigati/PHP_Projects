<?php
session_start();

// Distrugge tutte le variabili di sessione
$_SESSION = array();

// Distrugge la sessione
session_destroy();

// Reindirizza alla pagina di login
header("Location: login.html");
exit;
?>
