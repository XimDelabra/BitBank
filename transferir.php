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
    <!-- CDN Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- CDN Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <!-- CDN Font Awasome -->
    <script src="https://kit.fontawesome.com/f60af16eb1.js" crossorigin="anonymous"></script>
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CDN de Notify alert-->
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css">
    <script src="https://unpkg.com/notyf/notyf.min.js"></script>

    <!-- Iconos para alertas-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CDN cleave-->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
    <link rel="stylesheet" href="style.css">
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
                <div class="navbar-nav ms-auto me-5">
                    <a class="nav-link text-light nav-btns" href="#"> <i class="fa-solid fa-message"></i> Mensajes</a>
                    <a class="nav-link text-light nav-btns" href="#"> <i class="fa-solid fa-user"></i> Mi Perfil</a>
                    <div class="dropdown-center">
                        <button class="nav-link text-light nav-btns dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gear"></i>
                            Opciones
                        </button>
                        <ul class="dropdown-menu p-1">
                            <li class="mb-2">
                                <form method="post">
                                    <button class="btn btn-outline-dark btn-sm w-100" name="desactivar"><i class="fa-solid fa-user-slash"></i> Desact. Cuenta</button>
                                </form>
                            </li>
                            <li><a class="btn btn-dark w-100 btn-sm" href="logout.php" > <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-light p-2">
        <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-start operaciones">
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-dollar-sign"></i> Mis Saldos</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-wallet"></i> Cuentas</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-credit-card"></i> Tarjetas</a>
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-coins"></i> Inversiones</a>
                <a href="transferir.php" class="nav-link mx-2"><i class="fa-solid fa-money-bill-transfer"></i></i> Transferir</a>
            </div>
            <div class="col-md-5 col-12 my-md-0 my-2 d-flex justify-content-start">
                <input class="form-control me-2 search" type="search" placeholder="Que operacion buscas?" aria-label="Search">
                <button class="btn p-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>

    <div class="container-md container-transferir rounded-5 p-md-5 mt-4">
        <form action="">
            <h1 class="text-center mx-2">Transferencia</h1>
            <label for="numero_tranferir">Numero de cuenta a transferir:</label>
            <input type="text" class="form-control numero_cuenta" id="numero_transferir" name="numero_transferir">
            <p id="nombre_tranferir">Nombre</p> <!--para mostrar el nombre de la persona-->

            <label for="saldo_transferir">Saldo a transferir:</label>
            <input type="number" class="form-control" id="saldo_transferir" name="saldo_transferir">

            <input type="hidden" name="numero_cuenta" id="numero_cuenta" value="<?php echo ($_SESSION['numero_cuenta']); ?>">
            <input type="hidden" name="saldo" id="saldo" value="<?php echo ($_SESSION['saldo']); ?>">

            <button type="button" class="btn btn-dark w-100 mt-4" id="transferir">Aceptar Transferencia</button>
        </form>
    </div>

    <script src="transferencia.js"></script>
</body>

</html>