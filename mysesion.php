<?php
require 'db_conexion.php';
session_start();

if (isset($_POST["desactivar"])) {
    $actived = "no";

    if (!empty($actived)) {
        $update = $cnnPDO->prepare("UPDATE usuarios SET estado = ? WHERE correo=?");
        $update->execute([$actived, $_SESSION["correo"]]);
        require_once 'msj_desactivar.php';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sesion</title>
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
                            <li><a class="btn btn-dark w-100 btn-sm" href="logout.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-light p-2">
        <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-start operaciones">
                <a href="#" class="nav-link mx-2"><i class="fa-solid fa-dollar-sign"></i> Depositar</a>
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
    <p class="fs-4 mb-0 ms-3 text-secondary">Es un gusto tenerte de vuelta <strong><?php echo ($_SESSION['nombre']); ?></strong>!</p>
    <p class="fs-6 mb-4 ms-3 text-secondary"><?php echo ($_SESSION['correo']); ?> </p>

    <div class="container my-md-0 my-3">
        <div class="row g-3">
            <div class="col-md-8 col-12">
                <p class="fw-medium">Mis cuentas</p>
                <div class="container-fluid bg-secondary d-flex justify-content-between">
                    <p class="text-light mb-0">Cuentas en pesos</p>
                    <p class="text-light mb-0">$ <?php echo ($_SESSION['saldo']); ?> MXN <i class="fa-solid fa-chevron-up"></i></p>
                </div>
                <div class="container-fluid d-flex justify-content-between border-bottom border-secondary-subtle">
                    <p class="text-secondary mb-0">Numero de cuenta</p>
                    <p class="text-secondary mb-0">Ultimos movimientos</p>
                    <p class="text-secondary mb-0">Disponible</p>
                </div>
                <div class="container-fluid d-flex pt-1 justify-content-between align-items-center border-bottom border-secondary-subtle ">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-wallet fs-2 mx-3"></i>
                        <div>
                            <p class="m-0 datos-cuentas">Alias 1</p>
                            <p class="m-0 datos-cuentas fw-bold"><?php echo ($_SESSION['numero_cuenta']); ?> </p>
                            <p class="m-0 datos-cuentas">Tipo: <?php echo ($_SESSION['tipo_cuenta']); ?> </p>
                        </div>
                    </div>
                    <p class="my-0">10</p>
                    <p class="my-0"> $ <?php echo ($_SESSION['saldo']); ?> MXN</p>
                </div>

                <div class="container-fluid bg-secondary d-flex justify-content-between border-bottom border-secondary-subtle text-light">
                    <p class="mb-0">Cuenta en dolares</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="container-fluid bg-secondary d-flex justify-content-between text-light">
                    <p class="mb-0">Tarjetas de Credito</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <!-- LISTA DE TRANFERENCIAS -->

                <div class="accordion accordion-flush p-0" id="accordionFlushExample">
                    <div class="accordion-item p-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-dark text-light py-1 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Transferencias
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="container-fluid d-flex justify-content-between">
                                    <p class="m-0">Concepto</p> 
                                    <p class="m-0">Destino</p> 
                                    <p class="m-0">Fecha</p> 
                                </div>

                                <?php
                                $slctTransfer = $cnnPDO->prepare('SELECT * FROM transferencias where cuenta_remitente =?');
                                $slctTransfer->execute(([$_SESSION['nombre']]));
                                $count =$slctTransfer->rowCount();
                                $fetch = $slctTransfer->fetch();

                                if ($count >0){
                                    foreach ($fetch as $data) {
                                        echo  '<div class="container-fluid d-flex justify-content-between">';
                                         echo'           <p class="m-0">Tranferencia a</p>'; 
                                        echo            '<p class="m-0">'.$data["cuenta_destino"].'</p>';
                                        echo            '<p class="m-0">'.$Data["fecha"].'</p>'; 
                                        echo        '</div>';
                                    }
                                    
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-5">
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