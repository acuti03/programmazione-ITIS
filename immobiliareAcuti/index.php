<?php
    session_start();
    if(isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc = null;
    if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

    require_once "elementi/funzioni.php";

    if($sc == "login"){
        if($_REQUEST['username'] == "Admin" && $_REQUEST['password'] == "Admin"){
            $_SESSION['loggato'] = true;
        }
        else{
            $_SESSION['loggato'] = false;
            $errore = true;
        }
    }
    if($sc == "logout"){
        $_SESSION['loggato'] = false;
    }

    if($_SESSION['loggato'] == true){
        writeMenu();

        // PROPRIETARI
        echo("<div class=\"container\" style=\"padding-top: 70px;\">
        <h1>Immobiliare Acuti</h1><hr>
        <div class=\"desc\" style=\"display: flex\">
            <ul>
            <h5>Il sito permette di fare:</h5>
            <br />
                <li>Operazioni di aggiuta, cancellazzione e modifica di Proprietari, immobili, zone, tipologie e acquisti.</li>
                <li>Acquisto e vendita di un immobile.</li>
                <li>Ricerca di immobili e relativi proprietari partendo da una zona.</li>
                <li>Ottenere un riepilogo degli immobili di un determinato proprietario.</li>
                <li>Generazione di un file PDF.</li>
            </ul>
            <img src=\"farm.png\" height=\"55%\" width=\"55%\">
        </div>
        <hr>
        <div class=\"row\" style=\"padding-top: 30px;\">
        <div class=\"col col-4\">
        <div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Propriteari<i class=\"fa-solid fa-user\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>
        ");
        showResultTableProp();
        // ZONE E TIPOLOGIE
        echo("</div>
        <div class=\"col col-4\">
        <div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Zone<i class=\"fa-solid fa-location-dot\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>
        ");
        showResultTableZon();
        echo("
        <div class=\"alert alert-light\" style=\"margin-top: 30px; border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Tipologie<i class=\"fa-solid fa-sign-hanging\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>
        ");
        showResultTableTip();

        // IMMOBILI
        echo("</div>
        <div class=\"col col-4\">
            <div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Immobili <i class=\"fa-solid fa-house\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>
        ");
        showResultTableImmo();?>
        </div>
        </div>
        </div>
        <?php
        include_once "elementi/footer.php";
    }else{
        include_once "elementi/header.php";?>
        <link rel="stylesheet" href="style.css">
        <div class="wrapper">
        <section class="form"><?php if($errore) echo("<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\" style=\"border: none;\">Usa Admin-Admin <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>");?>
            <header>Login</header>
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label for="username" name="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                </div>
                <div class="mb-3" id="prova">
                    <label for="password" name="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                </div>
                <input type="hidden" value="login" name="sc">
                <button type="submit" class="btn btn-success">Entra</button>
            </form>
        </section>
    </div>
    
    <?php
    }
    function showResultTableProp(){?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">cognome</th>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM proprietario";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $cognome = $row['cognome'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$cognome."</td>");
                    echo("
                    </tr>");
    
                }
            }
            ?>
        </table><?php
    }
    function showResultTableZon(){?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM zona";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>");
                    echo("
                    </tr>");
    
                }
            }
            ?>
        </table><?php
    }
    function showResultTableTip(){?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM tipologia";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>");
                    echo("
                    </tr>");
    
                }
            }
            ?>
        </table><?php
    }
    function showResultTableImmo(){?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">civico</th>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM immobile";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $civico = $row['civico'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$civico."</td>
                        ");
                    echo("
                    </tr>");
    
                }
            }
            ?>
        </table><?php
    }
?>
<style>
    table{
        margin-top: 40px;
        border-spacing: 0;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
        0 32px 64px -48px rgba(0,0,0,0.5);
        border: hidden;
    }
    thead{
        background-color: #198754;
        color: #fff;
        border-bottom: hidden;
    }
    th{
        height:35px;
        border-bottom: #198754;
    }
</style>
