<?php
require("funzioni.php");

$connessione = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

if($connessione === false){
    die("Errore di connessione: ".$connessione->connect_error);
}

$nome = $connessione->real_escape_string($_REQUEST['nome']);
$cognome = $connessione->real_escape_string($_REQUEST['cognome']);
$paese = $connessione->real_escape_string($_REQUEST['paese']);
$numTel = $connessione->real_escape_string($_REQUEST['numTel']);
$eta = $connessione->real_escape_string($_REQUEST['eta']);

$sql = "INSERT INTO info(nome, cognome, paese, numTel, eta) VALUES ('$nome', '$cognome', '$paese', '$numTel', $eta)";

if($connessione->query($sql) === true){
    echo "Persona inserita con successo";
}
else{
    echo"Errore di inserimento: " . $connessione.error();
}

$connessione->close();
?>

<html>
    <head>
    <title>Hello Word!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:500');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            padding: 20px;
        }
    </style>
    <body>
    <br></br>
    <a href="main.php"><button class="btn btn-primary">View</button></a>
    </body>
</html>