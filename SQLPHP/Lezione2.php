<?php
/*
    CREAZIONE DEL DATABASE E DELLA TABELLA SU FILE PHP
*/

$host = "localhost";
$user = "root";
$password = "";
$database = "prova";

$connessione = new mysqli($host, $user, $password, $database);

if($connessione === false){
    die("Errore di connessione: ".$connessione->connect_error);
}
echo "Connessione avvenuta con successo: ". $connessione->host_info;

echo "<br><br>";

$sql = "CREATE TABLE persone(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30),
    cognome VARCHAR(30),
    email VARCHAR(50) NOT NULL UNIQUE
    )
";
    
if($connessione->query($sql) === true){
    echo "Tabella creata con successo!<br><br>";
}
else{
    echo "Errore creazione tabella<br><br>" .$connessione->error;
}

$connessione->close();
?>