<!DOCTYPE html>
<html>
    <head>
        <title>View</title>
        <style type="text/css">
            table{
                font-family: arial, sans-serif;
                margin: auto;
                border-collapse: separate;
                border-spacing: 0;
                width:50%;            }
            th{
                color: white;
                height:35px;
            }
            td{
                height:25px;
            }
            table tr th,table tr td {
                /*border-right: 1px solid #dddddd;*/
                border-bottom: 1px solid #dddddd;
                padding: 5px;
            }
            table tr th:first-child, table tr th:last-child{
                border-top: 1px #dddddd;
            }
            table tr th:first-child,table tr td:first-child{
                border-left: 1px solid #dddddd;
            }
            table tr th:first-child,table tr td:first-child {
                border-left: 1px solid #dddddd;
            }
            table tr th {
                background: #405cf5;
                text-align: left;
            }
            table.Info tr th,table.Info tr:first-child td{
                border-top: 1px solid #dddddd;
            }
            /* top-left border-radius */
            table tr:first-child th:first-child,
            table.Info tr:first-child td:first-child {
                border-top-left-radius: 7px;
            }
            /* top-right border-radius */
            table tr:first-child th:last-child,
            table.Info tr:first-child td:last-child {
                border-top-right-radius: 7px;
            }
            /* bottom-left border-radius */
            table tr:last-child td:first-child {
                border-bottom-left-radius: 7px;
            }
            /* bottom-right border-radius */
            table tr:last-child td:last-child {
                border-bottom-right-radius: 7px;
            }
            .button-9 {
                appearance: button;
                backface-visibility: hidden;
                background-color: #405cf5;
                border-radius: 6px;
                border-width: 0;
                box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset,rgba(50, 50, 93, .1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
                box-sizing: border-box;
                color: #fff;
                cursor: pointer;
                font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
                font-size: 100%;
                height: 44px;
                line-height: 1.15;
                outline: none;
                overflow: hidden;
                padding: 0 25px;
                /*position: relative;*/
                /*text-align: center;*/
                text-transform: none;
                transform: translateZ(0);
                transition: all .2s,box-shadow .08s ease-in;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }
            .button-9:disabled {
            cursor: default;
            }
            .button-9:focus {
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
            }
            button{
                margin-left:25%;
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
            </tr>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "prova";

            $connessione = mysqli_connect($host,$user,$password,$database);
            /*if($connessione === false){
                die("Errore di connessione: ".$connessione->connect_error);
            }*/
            $sql = "SELECT id, nome, cognome, email from persone";
            $result = $connessione->query($sql);
            
            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["id"]. "</td><td>". $row["nome"]."</td><td>". $row["cognome"]. "</td><td>".$row["email"]. "</td></tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 result";
            }
            $connessione->close();
            ?>
        </table>
        <a href="Lezione3Insert.php"><button class="button-9" role="button">Insert</button></a>
    </body>
</html>