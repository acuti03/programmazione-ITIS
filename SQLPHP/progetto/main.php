<!DOCTYPE html>
<html>
    <head>
        <title>View</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Montserrat:500');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            body{
                background: #3E3E40;
            }
            li, a, button{
                font-weight: 500;
                font-size: 16px;
                color: #edf0f1;
                text-decoration: none;
            }
            header{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 30px 10%;
            }
            .cta{
                padding: 7px 15px;
                background-color:#21D802;
                color:#edf0f1;
                border-radius: 9px;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease 0s;
            }
            .del{
                color:#edf0f1;
                border-radius: 7px;
                background-color:#dc3545;
            }
            .update{
                color:#edf0f1;
                border-radius: 7px;
                background-color:#21D802;
            }
            ion-icon {
                font-size: 18px;
                background-color: red;
                padding: 9px;
                border-radius: 7px;
            }
            .nav_links{
                list-style: none;
            }
            .nav_links li{
                display: inline-block;
                padding: 0px 20px;
            }
            .nav_links li a{
                transition: all 0.3s ease 0s;
            }
            .nav_links li a:hover{
                color: #21D802;
            }
            .logo{
                font-weight: 700;
                text-decoration: none;
                font-size: 2em;
                letter-spacing: 2px;
                transition: 0.6s;
                color: #edf0f1;
                padding: 0 5px;
                background: linear-gradient(to bottom, transparent 55%, #21D802 50%);
            }
            table{
                font-family: arial, sans-serif;
                margin-left: 25%;
                margin-top: 300px;
                border-spacing: 0;
                width:50%;
                border-collapse: collapse;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 1px 10px 100px 5px #21D802;
            }
            th{
                color: white;
                height:35px;
            }
            td{
                height:25px;
                background-color: #fff;
            }
            table tr th,table tr td {
                /*border-right: 1px solid #dddddd;*/
                /*border-bottom: 1px solid #dddddd;*/
                padding: 5px;
            }
            table tr th {
                text-align: left;
                background-color: #21D802;
            }
        </style>
    </head>
    <body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <header>
        <a href="#" class="logo">LOGO</a>
            <nav>
                <ul class="nav_links"> 
                    <li><a href="#">View</a></li>
                    <li><a href="insert.php">Insert</a></li>
                </ul>
            </nav>
        <a class="cta" href="#">Credits</a>
    </header>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Pese</th>
                    <th>Tefono</th>
                    <th>Eta</th>
                    <th>Operazioni</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require("funzioni.php");

            $connessione = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
            /*if($connessione === false){
                die("Errore di connessione: ".$connessione->connect_error);
            }*/
            $sql = "SELECT * from info";
            $result = $connessione->query($sql);
            
            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    $id=$row['id'];
                    $nome=$row['nome'];
                    $cognome=$row['cognome'];
                    $paese=$row['paese'];
                    $numTel=$row['numTel'];
                    $eta=$row['eta'];
                    echo '<tr>
                    <td scope="row">'.$id.'</td>
                    <td>'.$nome.'</td>
                    <td>'.$cognome.'</td>
                    <td>'.$paese.'</td>
                    <td>'.$numTel.'</td>
                    <td>'.$eta.'</td>
                    <td>
                    <a href="delete.php?deleteid='.$id.'">
                        <ion-icon class="del" name="trash"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon class="update" name="push-outline"></ion-icon>
                    </a>
                    </td>
                    </tr>';
                }
            }
            $connessione->close();
            ?>
            </tbody>
        </table>
    </body>
</html>