<?php
/*
    connessione ad un database creato su phpMyAdmin
    tramite l'utilizzo di db
*/

//  DICHIARO LE VARIABILI PER ESSERE PIU' EFFICENTE
$host = "localhost";
$user = "root";
$password = "";
$database = "prova";

//  STABILISCO LA CONNESSIONE
$connessione = new mysqli($host, $user, $password, $database);

//  ESEGUO UN CONTROLLO DI CONNESSIONE E STAMPO
if($connessione === false){
    die("Errore di connessione: ".$connessione->connect_error);
}
echo "Connessione avvenuta con successo: ". $connessione->host_info;


$connessione->close();

?>