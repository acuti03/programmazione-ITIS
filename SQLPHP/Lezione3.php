<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "prova";

$connessione = new mysqli($host,$user,$password,$database);

if($connessione === false){
    die("Errore di connessione: ".$connessione->connect_error);
}
else{
    echo "Connessione avvenuta con successo: ". $connessione->host_info;
}

echo "<br><br>";

$nome = $connessione->real_escape_string($_REQUEST['nome']);
$cognome = $connessione->real_escape_string($_REQUEST['cognome']);
$email = $connessione->real_escape_string($_REQUEST['email']);

$sql = "INSERT INTO persone(nome,cognome,email) VALUES
('$nome', '$cognome', '$email')";

if($connessione->query($sql) === true){
    echo "Persona inserita con successo";
}else{
    echo "Errore durante l'inserimento: ".$connessione->error;
}

$connessione->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button-9 {
                appearance: button;
                backface-visibility: hidden;
                background-color: #405cf5;
                border-radius: 6px;
                border-width: 0;
                box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset,rgba(50, 50, 93, .1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
                box-sizing: border-box;
                color: #fff;
                cursor: pointer;
                font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
                font-size: 100%;
                height: 44px;
                line-height: 1.15;
                outline: none;
                overflow: hidden;
                padding: 0 25px;
                /*position: relative;*/
                /*text-align: center;*/
                text-transform: none;
                transform: translateZ(0);
                transition: all .2s,box-shadow .08s ease-in;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }
            .button-9:disabled {
            cursor: default;
            }
            .button-9:focus {
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
            }
    </style>
</head>
<body>
    <a href="Lezione3View.php"><button class="button-9" role="button">View</button></a>
</body>
</html>