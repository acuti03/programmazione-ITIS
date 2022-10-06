<?php
    session_start();
    if(isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc=null;
    if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

    require "elementi/funzioni.php";
    include_once "elementi/header.php";

    if($_SESSION['loggato']){
        writeMenu();
        switch($sc){
            case 'nuovoImm':{?>
                <link rel="stylesheet" href="immobili/style.css">
                <div class="body">
                    <div class="wrapper">
                        <div class="form">
                            <header>Registra immobile 🏠</header>
                            <form class="row g-3" action="immobili.php" method="POST">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                            </div>
                            <div class="col-md-6">
                                <label for="cognome" class="form-label">Via</label>
                                <input type="text" name="via" class="form-control" id="via" placeholder="Via">
                            </div>
                            <div class="col-md-6">
                                <label for="indirizzo" class="form-label">Civico</label>
                                <input type="text" name="civico" class="form-control" id="civico" placeholder="Civico">
                            </div>
                            <div class="col-md-6">
                                <label for="civico" class="form-label">Metratura</label>
                                <input type="text" name="metratura" class="form-control" id="metratura" placeholder="Metratura">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Piano</label>
                                <input type="text" name="piano" class="form-control" id="piano" placeholder="Piano">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Locali</label>
                                <input type="text" name="locali" class="form-control" id="locali" placeholder="locali">
                            </div>
                            <div class="col-md-12">
                                <label for="inZona" class="form-label">Zona Cittadina</label>
                                <select class="form-select" name="zona" id="zona" aria-label="Default select example"><?php
                                $db = new mysqli(HOST, USER, PASSWORD, DB);
                                $sql = "SELECT * FROM zona";
                                $rs = $db->query($sql);
                                while($row = $rs->fetch_assoc())
                                    echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                $db->close();?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="inTipologia" class="form-label">Tipologia immobile</label>
                                <select class="form-select" name="tipologia" id="tipologia" aria-label="Default select example"><?php
                                $db = new mysqli(HOST, USER, PASSWORD, DB);
                                $sql = "SELECT * FROM tipologia";
                                $rs = $db->query($sql);
                                while($row = $rs->fetch_assoc())
                                    echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                $db->close();?>
                                </select>
                            </div>
                            <div class="col-12" id="submit">
                                <input type="hidden" value="aggiungiImm" name="sc">
                                <button type="submit" class="btn btn-success">Registra</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div><?php
                include_once "elementi/footer.php";
                break;
            }
            case 'aggiungiImm':{
                $nome = $_REQUEST['nome'];
                $via = $_REQUEST['via'];
                $civico = $_REQUEST['civico'];
                $metratura = $_REQUEST['metratura'];
                $piano = $_REQUEST['piano'];
                $locali = $_REQUEST['locali'];
                $zona = $_REQUEST['zona'];
                $tipologia = $_REQUEST['tipologia'];

                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "INSERT INTO immobile(nome, via, civico, metratura, piano, locali, idZona, idTipologia)
                VALUES('$nome', '$via', $civico, $metratura, $piano, $locali, $zona, $tipologia)";
                $rs = $db->query($sql);?>
                <script language="javascript">
                document.location.href="immobili.php?sc=listaImm";
                </script><?php
                break;
            }
            case 'listaImm':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $sql = "SELECT * FROM immobile";
                $rs = $db->query($sql);?>
                <div class="container" style="padding-top: 40px;"><?php
                    showResultTableImm($rs, "Lista degli immobili", "modificaImm", "eliminaImm", null, "immobili.php", "delete", "edit");?>
                </div><?php
                include_once "elementi/footer.php";
            }
            case 'delete':{
                $db = new mysqli(HOST, USER, PASSWORD, DB);
                $id = $_GET['deleteid'];
                $sql = "DELETE FROM immobile WHERE id=$id";
                $rs = $db->query($sql);?>
                <script language="javascript">
                document.location.href="immobili.php?sc=listaImm";
                </script><?php
                break;
            }
            case 'edit':{
                $nome = $_POST['nome'];
                $via = $_POST['via'];
                $civico = $_POST['civico'];
                $metratura = $_POST['metratura'];
                $piano = $_POST['piano'];
                $locali = $_POST['locali'];
                $zona = $_POST['zona'];
                $tipologia = $_POST['tipologia'];
                
                ?>
                <link rel="stylesheet" href="immobili/style.css">
                    <div class="body">
                        <div class="wrapper">
                                <div class="form">
                                    <header>Modifica immobile 🏠</header>
                                    <form class="row g-3" method="POST">
                                        <div class="col-md-6">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cognome" class="form-label">Via</label>
                                            <input type="text" name="via" class="form-control" id="via" placeholder="Via">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="indirizzo" class="form-label">Civico</label>
                                            <input type="text" name="civico" class="form-control" id="civico" placeholder="Civico">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="civico" class="form-label">Metratura</label>
                                            <input type="text" name="metratura" class="form-control" id="metratura" placeholder="Metratura">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">Piano</label>
                                            <input type="text" name="piano" class="form-control" id="piano" placeholder="Piano">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputState" class="form-label">Locali</label>
                                            <input type="text" name="locali" class="form-control" id="locali" placeholder="locali">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inZona" class="form-label">Zona Cittadina</label>
                                            <select class="form-select" name="zona" id="zona" aria-label="Default select example"><?php
                                            $db = new mysqli(HOST, USER, PASSWORD, DB);
                                            $sql = "SELECT * FROM zona";
                                            $rs = $db->query($sql);
                                            while($row = $rs->fetch_assoc())
                                                echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                            $db->close();?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inTipologia" class="form-label">Tipologia immobile</label>
                                            <select class="form-select" name="tipologia" id="tipologia" aria-label="Default select example"><?php
                                            $db = new mysqli(HOST, USER, PASSWORD, DB);
                                            $sql = "SELECT * FROM tipologia";
                                            $rs = $db->query($sql);
                                            while($row = $rs->fetch_assoc())
                                                echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                                            $db->close();?>
                                            </select>
                                        </div>
                                        <div class="col-12" id="submit">
                                            <input type="hidden" value="edit" name="sc">
                                            <button type="submit" class="btn btn-success">Registra</button>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><?php
                    $db = new mysqli(HOST, USER, PASSWORD, DB);
                    $id = $_GET['editid'];
                    $sql = "UPDATE immobile SET nome='$nome', via='$via', civico=$civico, metratura=$metratura, piano=$piano, locali=$locali, idZona=$zona, idTipologia=$tipologia
                    WHERE id='$id'";
                    $rs = $db->query($sql);?>
                    <script language="javascript">
                    document.location.href="immobili.php?sc=listaImm";
                    </script><?php
                break;
            }
        }
    }
?>