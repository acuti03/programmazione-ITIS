<?php
    session_start();
    if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;
    if(isset($_SESSION['loggato'])) $_SESSION['loggato'] = false;

    include_once "header.php";

    if($sc == "loggato"){

    }else{?>
        <body>
            <div class="container">
                <form>
                    <div class="mb-3">
                        <label for="email1" class="form-label">Utente</label>
                        <input type="text" class="form-control" id="ex">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </body>
    </html><?php
    }
?>