<?php
require 'db_conexion.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BitBank | Iniciar Sesion </title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- CDN Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CDN de Notify alert-->
    <link rel="stylesheet" href="https://unpkg.com/notyf/notyf.min.css">
    <script src="https://unpkg.com/notyf/notyf.min.js"></script>

    <!-- Iconos para alertas-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="body-login">
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
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="container login-form mt-3 mb-5 py-4 px-md-5 px-3 w-75 w-xs-100 shadow rounded">
            <div class="fs-3 text-center my-3">Inicio de Sesión</div>
            <form action="">
                <div class="my-4">
                    <label for="cuenta_correo" class="form-label">Número de Cuenta / Correo</label>
                    <input type="text" class="form-control" id="cuenta_correo" name="cuenta_correo">
                </div>
                <div class="my-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mt-5 mb-4">
                    <button id="login" type="button" class="btn btn-light w-100" name="login">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const notyf = new Notyf({
            duration: 5000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                    type: 'success',
                    background: '#e1e3e2', //#618573
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        text: 'check_circle',
                    },
                },
                {
                    type: 'error',
                    background: '#3e3e40', //#856161
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        text: 'error',
                    },
                },
                {
                    type: 'warning',
                    background: '#6b7075', //#b8826b
                    icon: {
                        className: 'material-icons',
                        tagName: 'i',
                        text: 'warning',
                    },
                },

            ],
        });

        // Función para mostrar la notificación
        function showNotification(type, message) {
            if (['success', 'error', 'warning'].includes(type)) {
                notyf.open({
                    type: type,
                    message: message,
                });
            }
        }

        //Funcion para login
        $(document).ready(function() {
            $(document).on("click", "#login", function() {


                var cuenta_correo = $('#cuenta_correo').val();
                var password = $('#password').val();

                if (!cuenta_correo) {
                    showNotification('warning', 'Por favor, rellena el campo "Numero de cuenta / Correo".');
                } else if (!password) {
                    showNotification('warning', 'Por favor, rellena el campo "Contrasena".');
                } else {
                    $.ajax({
                        url: "loguear.php",
                        type: "POST",
                        data: {
                            cuenta_correo: cuenta_correo,
                            password: password,
                        },
                        success: function(data) {
                            var response = data;

                            if (response.status === 'success') {
                                window.location.href = 'mysesion.php';
                            } else {
                                showNotification('error', response.message);
                            }
                        }

                    });
                }
            });
        });
    </script>

</body>

</html>