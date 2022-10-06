<?php
require("funzioni.php");
require("head.html");

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

echo("
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container-fluid\">
    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
            <li class=\"nav-item\">
                <a class=\"nav-link active\" aria-current=\"page\" href=\"utenti.php\">Visualizza lista di persone</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link active\" aria-current=\"page\" href=\"utenti.php?scelta=formInserimento\">Inserisci persone</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
");

switch($sc){
    case 'formInserimento':{
        echo("
            <form action=\"utenti.php\" method=\"POST\">
            <div class=\"mb-3\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" aria-describedby=\"emailHelp\">
            <div id=\"emailHelp\" class=\"form-text\">We'll never share your email with anyone else.</div>
            </div>
            <div class=\"mb-3\">
            <label for=\"password\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\">
            </div>
            <input type=\"hidden\" name=\"scelta\" value=\"addUtente\">
            <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
        </form>
        ");
        break;
    }
    case 'addUtente':{
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $crypt = md5($password);

        $sql = "SELECT * FROM utenti Where email = '$email' AND password = '$crypt'";
        $result = $db->query($sql);

        if($result->num_rows == 0){
            $sql = "INSERT INTO utenti(email, password) VALUES('$email', '$crypt')";
                if($db->query($sql))
                    echo("\nInserimento avvenuto my man");
                else
                    echo("Errore in inserimento");
        }
        else{
            echo("Utente già esistente");
        }
        $db->close();
        break;
    }
    case 'deleteUtente':{
        $id = $_REQUEST['id'];
        echo("Voglio cancellare questo record con id: $id");

        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

        $sql = "DELETE FROM utenti WHERE id=$id";
        echo("<br />");

        if ($db->query($sql)) {echo("Cancellazione effettuata!!!");}
        else {echo("Problema durante la cancellazione... :/");}

        $db->close();
        break;
    }
    default:{
    //Apertura database
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
        $sql = "SELECT * FROM utenti";
        $rs = $db->query($sql);

        echo("<table class=\"table table-hover\">
                <thead>
                <tr>
                    <th scope=\"col\">#</th>
                    <th scope=\"col\">Email</th>
                    <th scope=\"col\">Password</th>
                    <th scope=\"col\">Delete</th>
                </tr>
            </thead>");
            echo("<tbody>");
            //Prendere i valori con fetch_assoc ed assegnarli a $record
            $record = $rs->fetch_assoc();

            while ($record) {
                echo("<tr>
                    <th scope=\"col\">".$record['id']."</th>
                    <td scope=\"col\">".$record['email']."</td>
                    <td scope=\"col\">".$record['password']."</td>
                    <td scope=\"col\">
                        <a href=\"utenti.php?scelta=deleteUtente&id=".$record['id']."\">
                            <ion-icon name=\"trash\"></ion-icon>
                        </a>
                    </td>
                </tr>");
                //Chiusura dell'invio dati (creerebbe un loop se no)
                $record = $rs->fetch_assoc();
            }
            echo("</tbody>");
        echo("</table>");
        //Chiusura database
        $db->close();
        break;
    }

}

require("foot.html");
?>