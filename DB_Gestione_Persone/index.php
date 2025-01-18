<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Persone</title>
    <style>
        /* CSS di base */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Tabella */
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Modale */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 30px;
            border-radius: 8px;
            width: 50%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
        }

        .modal-buttons button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        .modal-buttons button:hover {
            background-color: #218838;
        }

        .close {
            background-color: #dc3545;
        }

        .close:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestione Persone</h1>
        
        <!-- Bottone per aprire il modale -->
        <button id="nuova-riga" class="btn">Inserisci Persona</button>

        <!-- Contenitore della tabella -->
        <div id="tabella-container"></div>

        <!-- Modale per l'inserimento -->
        <div id="modal-inserimento" class="modal">
            <div class="modal-content">
                <h2>Inserisci Persona</h2>
                <form id="formInserimento">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br>

                    <label for="cognome">Cognome:</label>
                    <input type="text" id="cognome" name="cognome" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <div class="modal-buttons">
                        <button type="submit">Inserisci</button>
                        <button type="button" class="close" onclick="closeModal()">Annulla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Variabili
        let persone;
        let inserisciBtn = document.querySelector('#nuova-riga');
        let modal = document.getElementById('modal-inserimento');
        let formInserimento = document.getElementById('formInserimento');
        let tabellaContainer = document.querySelector("#tabella-container");

        // Apre il modale
        inserisciBtn.addEventListener('click', function() {
            modal.style.display = "block";
        });

        // Chiude il modale
        function closeModal() {
            modal.style.display = "none";
        }

        // Fetch dei dati
        function loadTable() {
            fetch('./select.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                persone = data;
                let tabella = `
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Cognome</td>
                            <td>Email</td>
                            <td>Azioni</td>
                        </tr>
                    </thead>
                    <tbody>
                        ${generaRighe(persone)}
                    </tbody>
                </table>`;
                tabellaContainer.innerHTML = tabella;
            })
            .catch((error) => {
                console.error('Errore: ', error);
            });
        }

        // Genera le righe della tabella
        function generaRighe(data) {
            return data.map(persona => `
            <tr>
                <td>${persona.id}</td>
                <td>${persona.nome}</td>
                <td>${persona.cognome}</td>
                <td>${persona.email}</td>
                <td>
                    <button class="Modifica-persona" onclick="modificaPersona(${persona.id})">Modifica</button>
                    <button class="Elimina-persona" onclick="eliminaPersona(${persona.id})">Elimina</button>
                </td>
            </tr>`).join('');
        }

        // Funzione per aggiungere una persona
        formInserimento.addEventListener('submit', function(e) {
            e.preventDefault();

            let nome = document.getElementById("nome").value;
            let cognome = document.getElementById("cognome").value;
            let email = document.getElementById("email").value;

            let data = { nome, cognome, email };

            fetch('./insert.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.response === 1) {
                    alert(data.message);
                    closeModal();
                    loadTable(); // Ricarica la tabella
                } else {
                    alert("Errore: " + data.message);
                }
            })
            .catch(error => {
                console.error('Errore:', error);
                alert('Errore durante l\'inserimento.');
            });
        });

        // Funzione per modificare una persona
        function modificaPersona(id) {
            const nome = prompt("Nuovo nome:");
            const cognome = prompt("Nuovo cognome:");
            const email = prompt("Nuovo email:");

            if (nome && cognome && email) {
                fetch('./update.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id, nome, cognome, email })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.response === 1) {
                        loadTable(); // Ricarica la tabella
                    }
                })
                .catch(error => console.error('Errore: ', error));
            }
        }

        // Funzione per eliminare una persona
        function eliminaPersona(id) {
            if (confirm("Sei sicuro di voler eliminare questa persona?")) {
                fetch('./delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.response === 1) {
                        loadTable(); // Ricarica la tabella
                    }
                })
                .catch(error => console.error('Errore: ', error));
            }
        }

        // Carica la tabella iniziale
        loadTable();
    </script>
</body>
</html>
