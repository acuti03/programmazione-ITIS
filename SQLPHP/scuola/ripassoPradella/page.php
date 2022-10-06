<?php

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

echo("<a href=\"page.php\">Lista dei libri</a> | ");
echo("<a href=\"page.php?scelta=formLibri\">Nuovo Inserimento</a>");
echo("<br /><br />");

switch($sc){
    case "formLibri":{
        echo("Devo visualizzare il form per inserire i dati di un nuovo libro.");
        break;
    }
    default:{
        echo("Devo visualizzare l'elenco dei libri a database...<br /><br />");
        $connessione = new mysqli("localhost", "root", "", "prova");

        /*if($connessione === false){
            die("Errore di connessione: ".$connessione->connect_error);
        }*/
        $sql = "SELECT * FROM libri";
        $result = $connessione->query($sql);

        $record = $result->fetch_assoc();
        while($record){
            echo($record['id']. " - ".$record['nome']. " - ".$record['autore']. " - ".$record['prezzo']. "<br />");
            $record = $result->fetch_assoc();
        }

        $connessione->close():
        break;
    }
}
?>