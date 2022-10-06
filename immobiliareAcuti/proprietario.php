<?php
    session_start();
    if(isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc=null;
    if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

    require "elementi/funzioni.php";
    include_once "elementi/header.php";

    if($_SESSION['loggato']){
        writeMenu();
        switch($sc){
            case 'nuovoProp':{?>
                <link rel="stylesheet" href="proprietario/style.css">
                <div class="body">
                    <div class="wrapper">
                        <div class="form">
                            <header>Registra proprietario 👤</header>
                            <form class="row g-3" action="proprietario.php" method="POST">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                            </div>
                            <div class="col-md-6">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input type="text" name="cognome" class="form-control" id="cognome" placeholder="Cognome">
                            </div>
                            <div class="col-md-8">
                                <label for="indirizzo" class="form-label">Indirizzo</label>
                                <input type="text" name="via" class="form-control" id="inputAddress" placeholder="indirizzo">
                            </div>
                            <div class="col-md-4">
                                <label for="civico" class="form-label">Civico</label>
                                <input type="text" name="civico" class="form-control" id="inputZip" placeholder="Civico">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Città</label>
                                <input type="text" name="citta" class="form-control" id="inputCity" placeholder="Città">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Telefono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
                            </div>
                            <div class="col-md-12">
                                <label for="mail" class="form-label">Email</label>
                                <input type="email" name="mail" class="form-control" id="inputAddress" placeholder="Telefono">
                            </div>
                            <div class="col-12" id="submit">
                                <input type="hidden" value="aggiungiProp" name="sc">
                                <button type="submit" class="btn btn-success">Registra</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div><?php
                include_once "elementi/footer.php";
                break;
            }
            case 'aggiungiProp':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);

                $nome = $_REQUEST['nome'];
                $cognome = $_REQUEST['cognome'];
                $via = $_REQUEST['via'];
                $civico = $_REQUEST['civico'];
                $citta = $_REQUEST['citta'];
                $telefono = $_REQUEST['telefono'];
                $mail = $_REQUEST['mail'];

                $sql = "INSERT INTO proprietario(nome, cognome, via, civico, citta, telefono, mail)
                VALUES('$nome', '$cognome', '$via', '$civico', '$citta', '$telefono', '$mail')";
                $rs = $db->query($sql);
                ?>
                <script language="javascript">
                document.location.href="proprietario.php?sc=listaProp";
                </script><?php
                break;
            }
            case 'listaProp':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT * FROM proprietario";
                $rs = $db->query($sql);?>
                <div class="container" style="padding-top: 40px;"><?php
                    showResultTablePropri($rs, "Tabella Proprietario", "editProp", "deleteProp", "summaryProp", "proprietario.php", "delete", "edit");?>
                </div><?php
                include_once "elementi/footer.php";
                $db->close();
                break;
            }
            case 'delete':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $id = $_GET['deleteid'];
                $sql = "DELETE FROM proprietario WHERE id=$id";
                $rs = $db->query($sql);
                ?>
                <script language="javascript">
                document.location.href="proprietario.php?sc=listaProp";
                </script><?php
                break;
            }
            case 'edit':{
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $via = $_POST['via'];
                $civico = $_POST['civico'];
                $citta = $_POST['citta'];
                $telefono = $_POST['telefono'];
                $mail = $_POST['mail'];?>

                <link rel="stylesheet" href="proprietario/style.css">
                <div class="body">
                    <div class="wrapper">
                        <div class="form">
                            <header>Modifica proprietario 👤</header>
                            <form class="row g-3" method="POST">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                            </div>
                            <div class="col-md-6">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input type="text" name="cognome" class="form-control" id="cognome" placeholder="Cognome">
                            </div>
                            <div class="col-md-8">
                                <label for="via" class="form-label">Indirizzo</label>
                                <input type="text" name="via" class="form-control" id="inputAddress" placeholder="indirizzo">
                            </div>
                            <div class="col-md-4">
                                <label for="civico" class="form-label">Civico</label>
                                <input type="text" name="civico" class="form-control" id="inputZip" placeholder="Civico">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Città</label>
                                <input type="text" name="citta" class="form-control" id="inputCity" placeholder="Città">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Telefono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
                            </div>
                            <div class="col-md-12">
                                <label for="mail" class="form-label">Email</label>
                                <input type="email" name="mail" class="form-control" id="inputAddress" placeholder="Telefono">
                            </div>
                            <div class="col-12" id="submit">
                                <input type="hidden" value="edit" name="sc">
                                <button type="submit" class="btn btn-success">Modifica</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div><?php
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $id = $_GET['editid'];
                $sql = "UPDATE proprietario SET nome='$nome', cognome='$cognome', via='$via', civico=$civico, citta='$citta', telefono='$telefono', mail='$mail'
                        WHERE id='$id'";
                $rs = $db->query($sql);?>
                <script language="javascript">
                document.location.href="proprietario.php?sc=listaProp";
                </script><?php
                break;
            }
            case 'summary':{
                $id = $_GET['summaryid'];
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT * FROM proprietario WHERE id=$id";
                $rs = $db->query($sql);

                echo("<div class=\"container\" style=\"padding-top: 40px;\">");
                echo("<div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Anagrafica Propriteario<i class=\"fa-solid fa-user\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                anagrafica($rs, "Anagrafica del Proprietario");
                echo("<br />");

                $sql = "SELECT i.id, i.nome, i.via, i.civico, i.metratura, i.piano, i.locali, t.nome AS tipologia, z.nome AS zona, po.data_acquisto AS 'Data Acquisto'
                        FROM immobile AS i, possiede AS po, proprietario AS pr,  zona AS z, tipologia AS t
                        WHERE pr.id=po.idProprietario AND po.idImmobile=i.id AND pr.id=$id AND i.idZona=z.id AND i.idTipologia=t.id";
                $rs = $db->query($sql);
                echo("<div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Immobili Del Propriteario<i class=\"fa-solid fa-home\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                table($rs, "Immobili del proprietario");
                echo("<br />");

                echo("<div class=\"alert alert-light\" style=\"border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Compra Nuovo Immobile<i class=\"fa-solid fa-plus\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                echo("<form>
                    <div class=\"row\">
                    <div class=\"col\">
                        <div class=\"mb-3\">
                                <label for=\"inZona\" class=\"form-label\">Zona Cittadina</label>
                                <select class=\"form-select\" name=\"idZona\" id=\"idZona\" aria-label=\"Default select example\">");
                                $db = new mysqli(HOST, USER, PASSWORD, DB);
                                $sql = "SELECT * FROM zona";
                                $rs = $db->query($sql);
                                while($row = $rs->fetch_assoc())
                                    echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                $db->close();
                                echo("</select>
                            </div>
                    </div>
                    <div class=\"col\">
                    <div class=\"mb-3\">
                        <label for=\"inImmobile\" class=\"form-label\">Immobile</label>
                        <select class=\"form-select\" name=\"idImmobile\" id=\"idImmobile\" aria-label=\"Default select example\">");
                        $db = new mysqli(HOST, USER, PASSWORD, DB);
                        $sql = "SELECT * FROM immobile";
                        $rs = $db->query($sql);
                        while($row = $rs->fetch_assoc())
                            echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                        $db->close();
                        echo("</select>
                    </div>
                </div>
                <div class=\"col\">
                    <input type=\"hidden\" name=\"idProprietario\" value=\"".$id."\">
                    <input type=\"hidden\" name=\"sc\" value=\"addPossiede\">
                    <input type=\"submit\" class=\"btn btn-success\" value=\"Acquista Immobile\" style=\"margin-top: 32px; margin-left: 250px;\">
                </div>
                </div>
                </form>");


                echo("<div class=\"alert alert-light\" style=\"margin-top: 60px; border: 1px solid #dc3545; color: #dc3545; justify-content: center; display: flex;\">Vendi Immobile<i class=\"fa-solid fa-plus\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                echo("<form>
                    <div class=\"row\">
                    <div class=\"col\">
                        <div class=\"mb-3\">
                                <label for=\"inZona\" class=\"form-label\">Zona Cittadina</label>
                                <select class=\"form-select\" name=\"idZona\" id=\"idZona\" aria-label=\"Default select example\">");
                                $db = new mysqli(HOST, USER, PASSWORD, DB);
                                $sql = "SELECT * FROM zona";
                                $rs = $db->query($sql);
                                while($row = $rs->fetch_assoc())
                                    echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                $db->close();
                                echo("</select>
                            </div>
                    </div>
                    <div class=\"col\">
                    <div class=\"mb-3\">
                        <label for=\"inImmobile\" class=\"form-label\">Immobile</label>
                        <select class=\"form-select\" name=\"idImmobile\" id=\"idImmobile\" aria-label=\"Default select example\">");
                        $db = new mysqli(HOST, USER, PASSWORD, DB);
                        $sql = "SELECT * FROM immobile";
                        $rs = $db->query($sql);
                        while($row = $rs->fetch_assoc())
                            echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                        $db->close();
                        echo("</select>
                    </div>
                </div>");
                echo("<div class=\"col\">
                <input type=\"hidden\" name=\"idProprietario\" value=\"".$id."\">
                <input type=\"hidden\" name=\"sc\" value=\"deletePossiede\">
                <input type=\"submit\" class=\"btn btn-danger\" value=\"Vendi Immobile\" style=\"margin-top: 32px; margin-left: 265px;\">
                </div>
                </div>
                </form>
                </div>");
                include_once "elementi/footer.php";
                $db->close();
                break;
            }
            case 'addPossiede':{
                $idP = $_REQUEST['idProprietario'];
                $idI = $_REQUEST['idImmobile'];
                $oggi = date("Y/m/d");

                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT id FROM possiede WHERE idProprietario=$idP AND idImmobile=$idI";
                $rs = $db->query($sql);
                if($rs->num_rows == 0){
                    $sql = "INSERT INTO possiede(data_acquisto, idProprietario, idImmobile) VALUES('$oggi', $idP, $idI)";
                    if($db->query($sql)){
                        echo("<div class=\"container\" style=\"padding-top: 30px;\">");
                        echo("<div class=\"alert alert-success\" style=\"background: #fff; border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Nuovo Acquisto Completato<i class=\"fa-solid fa-check\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                        echo("<a href=\"proprietario.php?sc=summary&summaryid=$idP\"<button class=\"btn btn-success\" type=\"submit\"><i class=\"fa-solid fa-arrow-left-long\"></i></button></a>");
                        echo("</div>");
                    }
                        else
                    echo("<div class=\"alert alert-danger\" style=\"border: 1px solid #dc3545; color: #dc3545; justify-content: center; display: flex;\">Acquisto non completato.</div>");
                }
                else{
                    echo("<div class=\"container\" style=\"padding-top: 30px;\">");
                    echo("<div class=\"alert alert-light\" style=\"border: 1px solid #dc3545; color: #dc3545; justify-content: center; display: flex;\">ATTENZIONE: Questo immobile è già posseduto dallo stesso proprietario<i class=\"fa-solid fa-triangle-exclamation\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                    echo("<a href=\"proprietario.php?sc=summary&summaryid=$idP\"<button class=\"btn btn-danger\" type=\"submit\"><i class=\"fa-solid fa-arrow-left-long\"></i></button></a>");
                    echo("</div>");
                }
                include_once "elementi/footer.php";
                $db->close();
                break;
            }
            case 'deletePossiede':{
                $idP = $_GET['idProprietario'];
                $idI = $_GET['idImmobile'];
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "DELETE FROM possiede WHERE idProprietario=$idP AND idImmobile=$idI";
                $rs = $db->query($sql);
                if($rs){
                    echo("<div class=\"container\" style=\"padding-top: 30px;\">");
                    echo("<div class=\"alert alert-success\" style=\"background: #fff; border: 1px solid #198754; color: #198754; justify-content: center; display: flex;\">Vendita Avvenuta<i class=\"fa-solid fa-check\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                    echo("<a href=\"proprietario.php?sc=summary&summaryid=$idP\"<button class=\"btn btn-success\" type=\"submit\"><i class=\"fa-solid fa-arrow-left-long\"></i></button></a>");
                    echo("</div>");
                }
                else{
                    echo("<div class=\"container\" style=\"padding-top: 30px;\">");
                    echo("<div class=\"alert alert-light\" style=\"border: 1px solid #dc3545; color: #dc3545; justify-content: center; display: flex;\">Errore Nella Vendita<i class=\"fa-solid fa-triangle-exclamation\" style=\"padding-left:10px; margin-top: 3px;\"></i></div>");
                    echo("<a href=\"proprietario.php?sc=summary&summaryid=$idP\"<button class=\"btn btn-danger\" type=\"submit\"><i class=\"fa-solid fa-arrow-left-long\"></i></button></a>");
                    echo("</div>");
                }
                $rs = $db->query($sql);
                break;
            }
        }
    }

    function table($rs=null, $caption=null){?>
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
                <th scope="col">Tipologia</th>
                <th scope="col">Zona</th>
                <th scope="col">Data Acquisto</th>
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
                    $tipologia = $row['nome'];
                    $zona = $row['zona'];
                    $data = $row['Data Acquisto'];
                    echo("
                    <tr>
                        <td scope=\"row\">".$id."</td>
                        <td>".$nome."</td>
                        <td>".$via."</td>
                        <td>".$civico."</td>
                        <td>".$metratura."</td>
                        <td>".$piano."</td>
                        <td>".$locali."</td>
                        <td>".$tipologia."</td>
                        <td>".$zona."</td>
                        <td>".$data."</td>
                        ");
                    echo("
                    </tr>");
                }
            }
            ?>
        </table><?php
    }
    function anagrafica($rs=null, $caption=null){?>
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
                    <th scope="col">mail</th>
                </tr>
            </thead><?php
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
                        <td>".$mail."</td>
                    </tr>");
                }
            }
            ?>
        </table>
        <?php
    }
?>