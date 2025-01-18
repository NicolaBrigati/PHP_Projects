<!DOCTYPE html>
<HTML>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisetma di Login</title>
    <style>
    /* Stile per il body */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f4f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
    }

    /* Contenitore del form */
    form {
        display: flex;
        flex-direction: column;
        width: 350px;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Campi di input */
    form > input {
        margin-bottom: 15px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    form > input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Bottone di invio */
    form > button {
        padding: 12px;
        background-color:rgb(45, 94, 147);
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form > button:hover {
        background-color: #0056b3;
    }

    /* Stile per i placeholder */
    ::placeholder {
        color: #aaa;
        font-style: italic;
    }
</style>

</head>    

<body>
    <form action="register.php" method="POST">
    <h2>Registrati</h2>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="Inserisci la tua email">
    
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

<input type="submit" value="invia">
<p>Hai già un account? <a href="login.html">Login</a></p>
    </form>
</body>

</HTML>