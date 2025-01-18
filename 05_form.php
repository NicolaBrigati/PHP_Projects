<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci qui i tuoi dati</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form p {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color:rgb(66, 33, 136);
        }
    </style>
</head>
<body>
    <!-- nel file qua sotto posso mettere anche "05_insert_dati_da_form.php" -->
    <form action="06_prepared_form.php" method="POST"> Inserisci qui i tuoi dati, verranno caricati nel database.
        <p>
            <label for="nome">Nome</label>
            <input type="text"name="nome" id="nome">
        </p>
        <p>
            <label for="cognome">Cognome</label>
            <input type="text"name="cognome" id="cognome">
        </p>        
        <p>
            <label for="email">Email</label>
            <input type="text"name="email" id="email">
        </p>
        <input type="submit" value="Invia">
    </form>
</body>