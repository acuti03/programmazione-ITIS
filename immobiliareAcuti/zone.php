
<?php
session_start();
if(isset($_REQUEST['sc'])) $sc = $_REQUEST['sc']; else $sc=null;
if(!isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

require "elementi/funzioni.php";
include_once "elementi/header.php";

echo("<link rel=\"stylesheet\" href=\"zone/style.css\">");
if($_SESSION['loggato']){
   writeMenu();

   switch($sc){
        case 'lista':{?>
            <div class="container" style="padding-top: 40px;">
                <div class="row">
                    <div class="col">
                        <div class="wrapper">
                            <div class="form">
                                <header>Inserisci Zona 📍</header>
                                <form class="row g-3"  method="POST">
                                    <div class="col-md-12">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                    </div>
                                    <input type="hidden" name="sc" value="addZona">
                                    <button type="submit" class="btn btn-success">Inserisci</button>
                                </form>
                            </div>
                        </div>
                        <div class="alert alert-light" style=" margin-top: 30px; border: 1px solid #198754; color: #198754; justify-content: center; display: flex;">Zone<i class="fa-solid fa-location-dot" style="padding-left:10px; margin-top: 3px;"></i></div>
                        <?php
                        $db = new mysqli(HOST, USER, PASSWORD, DB);
                        $sql = "SELECT * FROM zona";
                        if($rs = $db->query($sql))
                        showResultTableZona($rs, "Lista Zone", "editZone", "deleteZone", null, "zone.php", "deleteZona", "editZona");
                        ?>
                    </div>
                    <div class="col">
                        <div class="wrapper">
                            <div class="form">
                                <header>Inserisci Tipologia 🏢</header>
                                <form class="row g-3" method="POST">
                                    <div class="col-md-12">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                    </div>
                                    <input type="hidden" name="sc" value="addTipologia">
                                    <button type="submit" class="btn btn-success">Inserisci</button>
                                </form>
                            </div>
                        </div>
                        <div class="alert alert-light" style=" margin-top: 30px; border: 1px solid #198754; color: #198754; justify-content: center; display: flex;">Tipologie<i class="fa-solid fa-sign-hanging" style="padding-left:10px; margin-top: 3px;"></i></div>
                        <?php
                        $db = new mysqli(HOST, USER, PASSWORD, DB);
                        $sql = "SELECT * FROM tipologia";
                        if($rs = $db->query($sql))
                        showResultTableTipo($rs, "Lista Tipologie", "editTipo", "deleteTipo", null, "zone.php", "deleteTipo", "editTipo");
                        ?>
                </div>
            </div><?php
            break;
        }
        case 'addZona':{
            $nome = $_REQUEST['nome'];
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "INSERT INTO zona(nome) VALUES('$nome')";
            $db->query($sql);?>
            <script language="javascript">
            document.location.href="zone.php?sc=lista";
            </script><?php
            $db->close();
            break;
        }
        case 'addTipologia':{
            $nome = $_REQUEST['nome'];
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $sql = "INSERT INTO tipologia(nome) VALUES('$nome')";
            $db->query($sql);
            $db->close();?>
            <script language="javascript">
            document.location.href="zone.php?sc=lista";
            </script><?php
            break;
        }
        case 'deleteZona':{
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $id = $_GET['deleteid'];
            $sql = "DELETE FROM zona WHERE id=$id";
            $rs = $db->query($sql);
            $db->close();
            ?>
            <script language="javascript">
            document.location.href="zone.php?sc=lista";
            </script><?php
            break;
        }
        case 'deleteTipo':{
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $id = $_GET['deleteid'];
            $sql = "DELETE FROM tipologia WHERE id=$id";
            $rs = $db->query($sql);
            $db->close();
            ?>
            <script language="javascript">
            document.location.href="zone.php?sc=lista";
            </script><?php
            break;
        }
        case 'editZona':{
            $nome = $_POST['nome'];?>

            <link rel="stylesheet" href="proprietario/style.css">
                <div class="body">
                    <div class="wrapper">
                        <div class="form">
                            <form class="row g-3" method="POST">
                                <header>Modifica Zone 📍</header>
                                <form class="row g-3"  method="POST">
                                <div class="col-md-12">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                </div>
                                <div class="col-12" id="submit">
                                    <input type="hidden" value="editZona" name="sc">
                                    <button type="submit" class="btn btn-success">Modifica</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><?php
            $db = new mysqli(HOST, USER, PASSWORD, DB);
            $id = $_GET['editid'];
            $sql = "UPDATE zona 
                    SET nome='$nome'
                    WHERE id=$id";
            $rs = $db->query($sql);
            break;
        }
        case 'editTipo':{
            $nome = $_POST['nome'];?>

            <link rel="stylesheet" href="proprietario/style.css">
                <div class="body">
                    <div class="wrapper">
                        <div class="form">
                            <form class="row g-3" method="POST">
                                <header>Modifica Tipologia 🏢</header>
                                <form class="row g-3"  method="POST">
                                <div class="col-md-12">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                </div>
                                <div class="col-12" id="submit">
                                    <input type="hidden" value="editTipo" name="sc">
                                    <button type="submit" class="btn btn-success">Modifica</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><?php
                
                $db = new mysqli(HOST,USER,PASSWORD,DB);
                $id = $_GET['editid'];
                $sql = "UPDATE tipologia 
                        SET nome='$nome'
                        WHERE id=$id";
                $rs = $db->query($sql);
            break;
        }
    }echo("</div>");
    include_once "elementi/footer.php";
}



?>