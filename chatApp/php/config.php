<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "chat";

    $conn = mysqli_connect($host, $user, $password, $db);
    if(!$conn) die("errore di connessione al db" .mysqli_connect_error());
?>