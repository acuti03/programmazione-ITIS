<?php
/*
    permette ad un utente di loggarsi e navigare come utente registrato
    pagina su php: https://www.php.net/manual/en/session.examples.basic.php
*/

session_start();

if(isset[$_REQUEST['scelta']]) $sc = $_REQUEST['scelta']; else $sc = null;

if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

if($sc == 'login'){
    $m = $_REQUEST['email'];
    $p = $_REQUEST['password'];

    $db = new mysqli("localhost", "root", "", "scuola");
    $sql = "SELECT * FROM cliente WHERE email = '$m' AND password='".md5($p)"'";
    $result = $db->query($sql);

    if($result->num_rows > 0){
        echo("<br \>Utente esistente...");
        $_SESSION['loggato'] = true;
    }
    else{
        echo("<br \>Utente non presente...");
        $_SESSION['loggato'] = false;
    }

    $db->close();
}
if($sc = 'logout'){
    $_SESSION['loggato'] = false;
}

if($_SESSION['loggato'] == false){
    // utente non loggato
    echo("
        <form action=\"cliente.php\" method=\"get\">
        Mail: <input type=\"text\" name=\"email\"><br />
        Password: <input type=\"password\" name=\"password\"><br />
        <input type=\"hidden\" name=\"scleta\" value=\"addCliente\"><br />
        </form>");
}
if($_SESSION['loggato'] == true){
    echo("l'utente è registrato");
    echo("")
}
?>