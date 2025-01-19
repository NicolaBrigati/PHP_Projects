<?php


//seleziona dati dal database e li pubblica

$host = "127.0.0.1";
$user = "root";
$password = "insert_psw";
$database = "tutorial_mysql";

$connessione = new mysqli($host, $user, $password, $database); //qua ho rimesso database
// Aggiunta di uno stile CSS per la tabella
echo '
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 20px;
    }
    
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    
    th, td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color:rgb(76, 109, 175);
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    tr:hover {
        background-color:rgb(117, 207, 219);
        cursor: pointer;
    }
</style>
';

// metto le condizioni WHERE - OR. Altri esempi ""WHERE id IN(1,57,60)
$sql = "SELECT * FROM persone WHERE id = 57 OR ID = 60";
if($result = $connessione->query($sql)){
    if($result->num_rows > 0){
       echo '<table>
       <tr>
       <th>id</th>
       <th>nome</th>
       <th>cognome</th>
       <th>email</th>
       </tr>';
       while($row = $result->fetch_array()){
        echo'<tr>
       <td>' .$row['id'] .'</td>
       <td>' .$row['nome'] .'</td>
       <td>' .$row['cognome'] .'</td>
       <td>' .$row['email'] .'</td>
       </tr>';
       } 
    }
    echo "</table>";

}else{
    echo "Errore, impossibile eseguire la query $sql. " . $connessione->error;
}

$connessione->close();

?>
