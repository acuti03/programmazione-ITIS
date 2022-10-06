<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
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
        </style>
  </head>
  <body>
    <form action="Lezione3.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="cognome" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Invia">
    </form><br><br><br>
    <a href="Lezione3View.php"><button class="button-9" role="button">View</button></a>
  </body>
</html>