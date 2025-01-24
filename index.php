<?php
require 'db_conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CDN Font Awasome -->
    <script src="https://kit.fontawesome.com/f60af16eb1.js" crossorigin="anonymous"></script>
    <title>BitBank</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>

<body class="body">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">
                <img class="logo" src="images/logo.png" alt="">
                BitBank
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-light nav-btns" href="registro.php">Registrar</a>
                    <a class="nav-link text-light nav-btns" href="login.php">Inicia Sesion</a>

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
    <p class="text-center fs-1 text-light mt-2">Solicita en linea los productos que tenemos para ti</p>


    <div class="container parent">
        <div class="div1 card text-light">
            <img src="images/tarjeta.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mi cuenta BitBank </h5>
                <p class="card-text">Sin filas! Abre tu cuenta desde tu celular</p>
            </div>
        </div>
        <div class="div2 card">
            <div class="row g-0">
                <div class="col-md-7">
                    <img src="images/card 2.webp" style="height: 100%;" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">Tarjetas adicionales</h5>
                        <p class="card-text">Comparte los beneficios de ser cliente</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="div3 card">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">Pase anual BitBank</h5>
                        <p class="card-text">Tus compras a 6 MSI! durante todo un año</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="images/card 4.jpg" style="height: 100%;" class="img-fluid rounded-end" alt="...">


                </div>
            </div>
        </div>
        <div class="div4 card text-light">
            <img src="images/card 3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Trae tu nomina y disfruta los beneficios!</h5>
                <p class="card-text">Te bonificamos la comision por administracion cada año</p>
            </div>
        </div>
    </div>

    <div class="container-fluid footer mt-5 p-3 text-light bg-dark">
        <div class="row">
            <div class="col-9 fs-3">BitBank <i class="fa-regular fa-registered fs-5"></i></div>
            <div class="col-3 d-flex justify-content-around">
                <i class="fa-brands fa-square-facebook fs-2"></i>
                <i class="fa-brands fa-x-twitter fs-2"></i>
                <i class="fa-brands fa-linkedin fs-2"></i>
                <i class="fa-brands fa-youtube fs-2"></i>
                <i class="fa-brands fa-instagram fs-2"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p><strong>Clientes BitBank</strong></p>
                <hr>
                <p>Personas</p>
                <ul>
                    <li>Prority</li>
                    <li>Jovenes</li>
                    <li>Patrimonial</li>
                </ul>
                <p>PyMES</p>
                <p>Empresas y Gobierno</p>
            </div>
            <div class="col-3">
                <p><strong>Economia</strong></p>
                <hr>
                <p>Tipo de cambio</p>
                <p>Analisis financiero</p>
                <p>Informacion Financiera</p>
                <p>Fondos de inversion</p>
                <p>Correspondientes</p>
                <p>Educacion Financiera</p>
            </div>
            <div class="col-3">
                <p><strong>Nosotros</strong></p>
                <hr>
                <p>Bolsa de Trabajo</p>
                <p>Comunicacion externa</p>
                <p>Premios</p>
                <p>Quienes somos</p>
                <p>Compromiso social</p>
                <p>Nuestras APIs</p>
            </div>
            <div class="col-3">
                <p><strong>Ayuda</strong></p>
                <hr>
                <p>Ayuda urgente</p>
                <p>Centro de ayuda</p>
                <p>Tipo de seguridad</p>
                <p>Localizador</p>
                <p>Telefonos</p>
                <p>Adultos Mayores</p>
            </div>
        </div>

    </div>
</body>

</html>