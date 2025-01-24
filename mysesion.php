<?php
require 'db_conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sesion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <!-- CDN Font Awasome -->
    <script src="https://kit.fontawesome.com/f60af16eb1.js" crossorigin="anonymous"></script>
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="sesion-body">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="mysesion.php">
                <img class="logo" src="images/logo.png" alt="">
                BitBank
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">

                    <a class="nav-link text-light nav-btns mx-1" href="#"> <i class="fa-solid fa-message"></i> Mensajes</a>
                    <a class="nav-link text-light nav-btns mx-1" href="#"> <i class="fa-solid fa-user"></i> Mi Perfil</a>
                    <a class="nav-link text-light nav-btns mx-1" href="#"> <i class="fa-solid fa-gear"></i> Configuracion</a>
                    <a class="nav-link text-light nav-btns mx-1 text-dark" href="logout.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesion</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-light p-2">
        <div class="row">
            <div class="col-7 d-flex justify-content-start operaciones">
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-dollar-sign"></i> Mis Saldos</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-wallet"></i> Cuentas</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-credit-card"></i> Tarjetas</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-coins"></i> Inversiones</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-file-invoice-dollar"></i> Creditos</a>
            </div>
            <div class="col-5 d-flex justify-content-start">
                <input class="form-control me-2 search" type="search" placeholder="Que operacion buscas?" aria-label="Search">
                <button class="btn p-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>
    <p class="fs-4 mb-0 ms-3 text-secondary">Es un gusto tenerte de vuelta <strong><?php echo ($_SESSION['nombre']); ?></strong>!</p>
    <p class="fs-6 mb-4 ms-3 text-secondary"><?php echo ($_SESSION['correo']); ?> </p>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <p class="fw-medium">Mis cuentas</p>
                <div class="container-fluid bg-secondary d-flex justify-content-between">
                    <p class="text-light mb-0">Cuentas en pesos</p>
                    <p class="text-light mb-0">60970.00MXN <i class="fa-solid fa-chevron-up"></i></p>
                </div>
                <div class="container-fluid d-flex justify-content-between border-bottom border-secondary-subtle">
                    <p class="text-secondary mb-0">Numero de cuenta</p>
                    <p class="text-secondary mb-0">Ultimos movimientos</p>
                    <p class="text-secondary mb-0">Disponible</p>
                </div>
                <div class="container-fluid d-flex pt-1 justify-content-between border-bottom border-secondary-subtle ">
                    <div class="d-flex">
                        <i class="fa-solid fa-wallet fs-2 mx-3"></i>
                        <div>
                            <p class="m-0 datos-cuentas">Alias 1</p>
                            <p class="m-0 datos-cuentas fw-bold"><?php echo ($_SESSION['numero_cuenta']); ?> </p>
                            <p class="m-0 datos-cuentas">Tipo: <?php echo ($_SESSION['tipo_cuenta']); ?> </p>
                        </div>
                    </div>
                    <p>10</p>
                    <p>30,484.10 MXN </p>
                </div>
                <div class="container-fluid d-flex pt-1 justify-content-between border-bottom border-secondary-subtle ">
                    <div class="d-flex">
                        <i class="fa-solid fa-wallet fs-2 mx-3"></i>
                        <div>
                            <p class="m-0 datos-cuentas">Alias 2</p>
                            <p class="m-0 datos-cuentas fw-bold"><?php echo ($_SESSION['numero_cuenta']); ?> </p>
                            <p class="m-0 datos-cuentas">Tipo: <?php echo ($_SESSION['tipo_cuenta']); ?> </p>
                        </div>
                    </div>
                    <p>10</p>
                    <p>30,484.10 MXN</p>
                </div>
                <div class="container-fluid d-flex pt-1 justify-content-between border-bottom border-secondary-subtle ">
                    <div class="d-flex">
                        <i class="fa-solid fa-wallet fs-2 mx-3"></i>
                        <div>
                            <p class="m-0 datos-cuentas">Alias 3</p>
                            <p class="m-0 datos-cuentas fw-bold"><?php echo ($_SESSION['numero_cuenta']); ?> </p>
                            <p class="m-0 datos-cuentas">Tipo: <?php echo ($_SESSION['tipo_cuenta']); ?> </p>
                        </div>
                    </div>
                    <p>10</p>
                    <p>30,484.10 MXN</p>
                </div>
                <div class="container-fluid bg-secondary d-flex justify-content-between border-bottom border-secondary-subtle text-light">
                    <p class="mb-0">Cuenta en dolares</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="container-fluid bg-secondary d-flex justify-content-between text-light">
                    <p class="mb-0">Tarjetas de Credito</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

            </div>
            <div class="col-4">
                <p class="fw-medium">Mis favoritos</p>
                <div class="container text-center">
                    <div class="row row-cols-4">

                        <div class="col d-flex flex-column justify-content-center border-bottom border-end border-secondary-emphasis py-4">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <p style="font-size: 10px;" class="mb-0">Pago Celular</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border border-top-0 border-secondary-emphasis py-4">
                            <i class="fa-solid fa-lightbulb"></i>
                            <p style="font-size: 10px;" class="mb-0">Luz Bimestral</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border border-top-0 border-secondary-emphasis py-4">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                            <p style="font-size: 10px;" class="mb-0">Pago gas</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border-bottom border-start border-secondary-emphasis py-4">
                            <i class="fa-solid fa-satellite-dish"></i>
                            <p style="font-size: 10px;" class="mb-0">MegaCable</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border-top border-end border-secondary-emphasis py-4">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <p style="font-size: 10px;" class="mb-0">Liverpool</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border border-bottom-0 border-secondary-emphasis py-4">
                            <i class="fa-solid fa-droplet"></i>
                            <p style="font-size: 10px;" class="mb-0">Agua</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border border-bottom-0 border-secondary-emphasis py-4">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <p style="font-size: 10px;" class="mb-0">Al Super</p>
                        </div>
                        <div class="col d-flex flex-column justify-content-center border-top border-start border-secondary-emphasis py-4">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <p style="font-size: 10px;" class="mb-0">Celular mama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>