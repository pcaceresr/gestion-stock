<html>

<head>
    <title>Gestion</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootsrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.min.js"></script>
    <meta charset="utf-8">

</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Sistema de gestión de stock</h1>

    </div>
    <center>
        <br>
        <h2>Iniciar sesión</h2>
    </center>
    <form action="/action_page.php">
        <div class="mb-3 mt-3">
            &nbsp &nbsp<label for="email" class="form-label">Usuario:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingrese su nombre de usuario" name="email">
        </div>
        <div class="mb-3">
            &nbsp &nbsp<label for="pwd" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Ingrese su conraseña" name="pswd">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>

</html>