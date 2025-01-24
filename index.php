<?php
require 'db_conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Monserrat Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>BitBank</title>
</head>

<body class="body">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">
                <img class="logo" src="images/logo.png" alt="">
                BitBank
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light" href="registro.php">Registrar</a>
                    <a class="nav-link text-light" href="login.php">Inicia Sesion</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid portada">
        <span class="eslogan">Tu futuro esta en tus manos</span>
    </div>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card mb-3" style="max-width: 700px;">
            <div class="row g-0">
                <div class="col-md-6 rounded-start">
                    <img src="images/tarjeas.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6 rounded-end">
                    <div class="card-body text-light">
                        <h5 class="card-title">Tarjetas de credito BitBank</h5>
                        <p class="card-text">Solicita LA TARJETA que te da meses sin intereses y pagos fijos.</p>
                        <button class="btn btn-outline-light mt-5 d-flex justify-content-center">Quiero mi tarjeta</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>