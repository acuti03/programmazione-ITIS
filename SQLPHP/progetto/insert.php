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
      @import url('https://fonts.googleapis.com/css?family=Montserrat:500');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            padding: 20px;
        }
    </style>
</head>
<body>
  <form action="insertcode.php" method="POST">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome">
  </div>
  <div class="mb-3">
    <label for="cognome" class="form-label">Cognome</label>
    <input type="text" class="form-control" name="cognome" id="cognome">
  </div>
  <div class="mb-3">
    <label for="paese" class="form-label">Paese</label>
    <input type="text" class="form-control" name="paese" id="paese">
  </div>
  <div class="mb-3">
    <label for="numTel" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="numTel" id="numTel">
  </div>
  <div class="mb-3">
    <label for="eta" class="form-label">Eta'</label>
    <input type="text" class="form-control" name="eta" id="eta">
  </div>
  <input type="submit" value="invia" class="btn btn-primary"></input>
  </form>
<br>
<a href="main.php"><button class="btn btn-primary">View</button></a>
</body>
</html>