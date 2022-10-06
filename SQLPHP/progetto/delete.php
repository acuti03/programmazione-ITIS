<html>
    <head>
        <title>document</title>
        <style>
            .del{
                padding: 4px 9px;
                background-color:#21D802;
                color:#edf0f1;
                border: none;
                border-radius: 7px;
            }
        </style>
    </head>
    <body>
        <a class="del" href="main.php">Deletele</a></button>
    </body>
</html>
<?php
require("funzioni.php");
$connessione = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM info WHERE id=$id";
    $result=mysqli_query($connessione,$sql);
    if($result){
        echo "cancellazione avvenuta con successo";
    }
    else{
        echo "errore nella cancellazione dei dati";
    }
}
?>