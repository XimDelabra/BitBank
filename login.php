<?php
require 'db_conexion.php';
session_start();

# Inicia Código de LOGIN
if (isset($_POST['login'])) {
    $cuenta_correo = $_POST['cuenta_correo'];
    $password = $_POST['password'];;

    if (!empty($cuenta_correo) && !empty($password)) {

        $select = $cnnPDO->prepare('SELECT * from usuarios WHERE (correo = ? OR numero_cuenta = ?) AND password = ?');
        $select->execute([$cuenta_correo, $cuenta_correo, $password]);
        $count = $select->rowCount();
        $campo = $select->fetch(PDO::FETCH_ASSOC);

        if ($count) {
            $_SESSION['numero_cuenta'] = $campo['numero_cuenta'];
            $_SESSION['correo'] = $campo['correo'];
            $_SESSION['nombre'] = $campo['nombre'];
            $_SESSION['tipo_cuenta'] = $campo['tipo_cuenta'];
            $_SESSION['password'] = $campo['password'];

            header('location: mysesion.php');
        } else {
            $alertType = 'error';
            $alertMessage = 'Mensaje: Credenciales Incorrectas.';
        }
    } else {
        $alertType = 'warning';
        $alertMessage = 'Mensaje: Por favor, rellenar campos vacios.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BitBank | Iniciar Sesion </title>
    <link rel="stylesheet" href="style.css">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    
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
                    <a class="nav-link text-light" href="registro.php">Registrar</a>
                    <a class="nav-link text-light" href="login.php">Inicia Sesion</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container position-relative">
        <div class="container login-form mt-3 mb-5 py-4 px-5 position-absolute top-50 start-0">
            <div class="fs-3">Inicio de Sesion</div>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="cuenta_correo" class="form-label ">Número de Cuenta / Correo</label>
                    <input type="text" class="form-control" id="cuenta_correo" name="cuenta_correo">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contrasena</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div>
                    <button type="submit" class="btn btn-light" style="width: 100%;" name="login">Iniciar Sesion</button>
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
        // Mostrar notificación si existe un mensaje desde PHP
        <?php if (!empty($alertMessage)) : ?>
            showNotification('<?= $alertType ?>', '<?= $alertMessage ?>');
        <?php endif; ?>
    </script>
    
</body>

</html>