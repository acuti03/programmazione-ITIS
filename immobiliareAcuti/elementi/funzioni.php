<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD","");
    define("DB","scuola");

    function writeMenu(){
        include_once "elementi/header.php";?>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <span>
                    <h4><i class="fa-solid fa-sign-hanging"></i> Acuti s.p.a.</h4>
                    </span>
                        <ul class="navbar-nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="zone.php?sc=lista">Zone & Tipologie</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Proprietari
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border-radius: 10px;">
                                <li><a class="dropdown-item" href="proprietario.php?sc=listaProp">Lista proprietari</a></li>
                                <li><a class="dropdown-item" href="proprietario.php?sc=nuovoProp">Aggiugi proprietario</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Immobili
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border-radius: 10px;">
                                <li><a class="dropdown-item" href="immobili.php?sc=listaImm">Lista immobili</a></li>
                                <li><a class="dropdown-item" href="immobili.php?sc=nuovoImm">Aggiugi immobile</a></li>
                            </ul>
                            </li>
                        </ul>
                    <form class="d-flex">
                        <a href="index.php?sc=logout"<button class="btn btn-danger" type="submit">Logout<i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
                    </form>
                </div>
            </nav>
        <?php
    }
    function showResultTableImm($rs=null, $caption=null, $edit=null, $delete=null, $summary=null, $file=null, $caseDel=null, $caseEdit=null){?>
        <table class="table"><?php
            if($caption) echo("<caption>$caption</caption>");?>
            <thead style="border-bottom: hidden;">
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">via</th>
                <th scope="col">civico</th>
                <th scope="col">metratura</th>
                <th scope="col">piano</th>
                <th scope="col">locali</th>
                <th scope="col">idZona</th>
                <th scope="col">idTipologia</th>
                <th scope="col">Modifica</th>
                <th scope="col">Cancella</th>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM immobile";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $via = $row['via'];
                    $civico = $row['civico'];
                    $metratura = $row['metratura'];
                    $piano = $row['piano'];
                    $locali = $row['locali'];
                    $idZona = $row['idZona'];
                    $idTipologia = $row['idTipologia'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$via."</td>
                        <td>".$civico."</td>
                        <td>".$metratura."</td>
                        <td>".$piano."</td>
                        <td>".$locali."</td>
                        <td>".$idZona."</td>
                        <td>".$idTipologia."</td>");
                        if($edit)
                            echo("<td><a href=\"".$file."?sc=".$caseEdit."&editid=".$row['id']."\"><button class=\"btn btn-success\">Modifica<i class=\"fa-solid fa-pen-to-square\"></i></button></a></td>");
                        if($delete)
                            echo("<td><a href=\"".$file."?sc=".$caseDel."&deleteid=".$row['id']."\"><button class=\"btn btn-danger\">Elimina<i class=\"fa-solid fa-trash-can\"></i></button></a></td>");
                    echo("
                    </tr>");
    
                }
            }
            ?>
        </table><?php
    }
    function showResultTablePropri($rs=null, $caption=null, $edit=null, $delete=null, $summary=null, $file=null, $caseDel=null, $caseEdit=null){?>
        <table class="table"><?php
            if($caption) echo("<caption>$caption</caption>");?>
            <thead style="border-bottom: hidden;">
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">cognome</th>
                <th scope="col">indirizzo</th>
                <th scope="col">civico</th>
                <th scope="col">città</th>
                <th scope="col">telefono</th>
                <th scope="col">mail</th><?php
                if($edit){?>
                <th scope="col">Modifica</th>
                <th scope="col">Cancella</th>
                <th scope="col">Sommario</th><?php
                }?>
                </tr>
            </thead><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "SELECT * FROM proprietario";
            $rs = $db->query($sql);
            if($rs->num_rows > 0){
                while($row = $rs->fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $cognome = $row['cognome'];
                    $via = $row['via'];
                    $civico = $row['civico'];
                    $citta = $row['citta'];
                    $telefono = $row['telefono'];
                    $mail = $row['mail'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$cognome."</td>
                        <td>".$via."</td>
                        <td>".$civico."</td>
                        <td>".$citta."</td>
                        <td>".$telefono."</td>
                        <td>".$mail."</td>");
                        if($edit)
                            echo("<td><a href=\"".$file."?sc=".$caseEdit."&editid=".$row['id']."\"><button class=\"btn btn-success\">Modifica<i class=\"fa-solid fa-pen-to-square\"></i></button></a></td>");
                        if($delete)
                            echo("<td><a href=\"".$file."?sc=".$caseDel."&deleteid=".$row['id']."\"><button class=\"btn btn-danger\">Elimina<i class=\"fa-solid fa-trash-can\"></i></button></a></td>");
                        if($summary)
                            echo("<td><a href=\"".$file."?sc=summary&summaryid=".$row['id']."\"><button class=\"btn btn-primary\">Sommario<i class=\"fa-solid fa-list\"></i></button></a></td>");
                    echo("
                    </tr>");
                }
            }
            ?>
        </table>
        <?php
    }
    function showResultTableImmSumm($rs=null, $caption=null){?>
        <table class="table"><?php
            if($caption) echo("<caption>$caption</caption>");?>
            <thead style="border-bottom: hidden;">
                <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">via</th>
                <th scope="col">civico</th>
                <th scope="col">metratura</th>
                <th scope="col">piano</th>
                <th scope="col">locali</th>
                <th scope="col">idZona</th>
                <th scope="col">idTipologia</th>
                <th scope="col">Modifica</th>
                <th scope="col">Cancella</th>
                </tr>
            </thead><?php
            if($rs->num_rows > 0){
                while($row = $rs-> fetch_assoc()){
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $via = $row['via'];
                    $civico = $row['civico'];
                    $metratura = $row['metratura'];
                    $piano = $row['piano'];
                    $locali = $row['locali'];
                    $idZona = $row['idZona'];
                    $idTipologia = $row['idTipologia'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$via."</td>
                        <td>".$civico."</td>
                        <td>".$metratura."</td>
                        <td>".$piano."</td>
                        <td>".$locali."</td>
                        <td>".$idZona."</td>
                        <td>".$idTipologia."</td>");
                    echo("
                    </tr>");
                }
            }
            ?>
        </table><?php
    }

    function showResultTableZona($rs=null, $caption=null, $edit=null, $delete=null, $summary=null, $file=null, $caseDel=null, $caseEdit=null){?>
        <table class="table"><?php
                if($caption) echo("<caption>$caption</caption>");?>
                <thead style="border-bottom: hidden;">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                    </tr>
                </thead><?php
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                if($rs->num_rows > 0){
                    while($row = $rs-> fetch_assoc()){
                        $id = $row['id'];
                        $nome = $row['nome'];
                        echo("
                        <tr>
                            <td scope=\"row\">".$id."</td>
                            <td>".$nome."</td>");
                            if($edit)
                                echo("<td><a href=\"".$file."?sc=".$caseEdit."&editid=".$row['id']."\"><button class=\"btn btn-success\">Modifica<i class=\"fa-solid fa-pen-to-square\"></i></button></a></td>");
                            if($delete)
                                echo("<td><a href=\"".$file."?sc=".$caseDel."&deleteid=".$row['id']."\"><button class=\"btn btn-danger\">Elimina<i class=\"fa-solid fa-trash-can\"></i></button></a></td>");
                        echo("
                        </tr>");
                    }
                }
                ?>
            </table><?php
    }
    function showResultTableTipo($rs=null, $caption=null, $edit=null, $delete=null, $summary=null, $file=null, $caseDel=null, $caseEdit=null){?>
        <table class="table"><?php
                if($caption) echo("<caption>$caption</caption>");?>
                <thead style="border-bottom: hidden;">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                    </tr>
                </thead><?php
                if($rs->num_rows > 0){
                    while($row = $rs-> fetch_assoc()){
                        $id = $row['id'];
                        $nome = $row['nome'];
                        echo("
                        <tr>
                            <td scope=\"row\">".$id."</td>
                            <td>".$nome."</td>");
                            if($edit)
                                echo("<td><a href=\"".$file."?sc=".$caseEdit."&editid=".$row['id']."\"><button class=\"btn btn-success\">Modifica<i class=\"fa-solid fa-pen-to-square\"></i></button></a></td>");
                            if($delete)
                                echo("<td><a href=\"".$file."?sc=".$caseDel."&deleteid=".$row['id']."\"><button class=\"btn btn-danger\">Elimina<i class=\"fa-solid fa-trash-can\"></i></button></a></td>");
                        echo("
                        </tr>");
                    }
                }
                ?>
        </table><?php
    }
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
        box-sizing: border-box;
        text-decoration: none;
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }
    span i{
        font-size: 2em; 
    }
    li{
        padding: 15px;
    }
    form i{
        font-size: 1em;
        padding-left: 10px;
    }
    table button{
        text-decoration: none;
        color: #fff;
    }
    table button i{
        padding-left: 10px;
    }
    .navbar{
        border-bottom: 1.5px solid #e7e7e7;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        }
    table{
        margin-top: 40px;
        border-spacing: 0;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 128px 0 rgba(0,0,0,0.1), 0 32px 64px -48px rgba(0,0,0,0.5);
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