<?php
require 'db_conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BitBank | Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- CDN Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <!-- CDN de Notify alert-->
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css">
    <script src="https://unpkg.com/notyf/notyf.min.js"></script>

    <!-- Iconos para alertas-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        .notyf__icon i {
            color: white !important;
        }

        .notyf__toast {
            border-radius: 0px;
            box-shadow: 0px 0px 2px 1px black;
        }

       
    </style>

</head>

<body class="registro-body">
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
    <div class="container position-relative">
        <div class="container mt-3 mb-5 py-4 px-5 registro-form position-absolute top-50 start-50">
            <div class="fs-3">Crear Cuenta</div>
            <form action="">
                <div class="mb-3 inpt-registro">
                    <label for="numero_cuenta" class="form-label ">Número de Cuenta</label>
                    <input type="text" class="form-control input-number" id="numero_cuenta" maxlength="19" name="numero_cuenta" required>

                    <p id="error-message" class="error-message">El número debe contener exactamente 16 dígitos.</p>

                </div>
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>

                <div class="mb-3">
                    <label for="tipo_cuenta" class="form-label">Tipo de Cuenta</label>
                    <select class="form-select mb-4" id="tipo_cuenta" name="tipo_cuenta">
                        <option selected>Elija una opcion...</option>
                        <option value="debito">Debito</option>
                        <option value="ahorro">Ahorro</option>
                        <option value="credito">Tarjeta de Credito</option>
                    </select>
                </div>
                <div>
                    <button id="submit" type="button" class="btn btn-light" style="width: 100%;" name="registrar">Registrar</button> </button>
                </div>

            </form>
        </div>
    </div>
    <script src="app.js"></script>
    <script>
        const numberInput = document.getElementById('numero_cuenta');
        const errorMessage = document.getElementById('error-message');

        numberInput.addEventListener('input', () => {
            const value = numberInput.value;

            // Validar si contiene 16 dígitos
            if (value.length !== 19) {
                numberInput.classList.add('invalid');
                numberInput.classList.remove('valid');
                errorMessage.classList.add('visible');
            } else {
                numberInput.classList.remove('invalid');
                numberInput.classList.add('valid');
                errorMessage.classList.remove('visible');
            }
        });
    </script>
</body>

</html>