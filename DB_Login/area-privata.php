<?php
session_start();

// Verifica se l'utente è loggato, altrimenti lo reindirizza al login
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Privata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Ciao, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Benvenuto nell'area privata.</p>
    <a href="logout.php">Esci</a>
</div>

</body>
</html>
