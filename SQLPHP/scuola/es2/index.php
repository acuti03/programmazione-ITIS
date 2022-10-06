<?php
if(isset[$_REQUEST['scelta']]) $sc = $_REQUEST['scelta']; else $sc = null;

echo("
    <html>
        <head><titel>form registrazione</title></head>
        <body>");

switch($sc){
    case "addCliente":{
        $n = $_REQUEST['nome'];
        $m = $_REQUEST['email'];
        $p = $_REQUEST['password'];

        $db = new mysqli("localhost", "root", "", "scuola");

        $sql = "INSERT INTO cliente(nome, email, password) VALUES('$n', '$m', '".md5($p)."')";
        
        echo($sql);

        if($db->query($sql)) ehco("registrazone avvenuta con successo!");
        else echo("Errore di inserimento...");

        $db->close();
        break;
    }
    default:{
        echo("
        <form action=\"registra.php\" method=\"get\">
        Nome: <input type=\"text\" name=\"nome\" value=\"es. Rossi Gino\"><br />
        Mail: <input type=\"text\" name=\"email\" value=\"es. ginor@gmail.com\"><br />
        Password: <input type=\"password\" name=\"password\"><br />
        <input type=\"hidden\" name=\"scleta\" value=\"addCliente\"><br />
        <button type=\"submit\">Registrati</button>
        </form>");

        break;
    }
}
echo("</body></html>");
?>