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
        $alertType = 'error';
        $alertMessage = 'Mensaje: Por favor, rellenar campos vacios.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="registro.php">Registrar</a>
                    <a class="nav-link" href="login.php">Inicia Sesion</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="cuenta_correo" class="form-label ">Número de Cuenta / Correo</label>
                <input type="text" class="form-control" id="cuenta_correo" name="cuenta_correo">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contrasena</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>


            <button type="submit" class="btn btn-primary" name="login">Iniciar Sesion</button>
        </form>
    </div>
    <script>
        const notyf = new Notyf();

        function showNotification(type, message) {
            if (type === 'success') {
                notyf.success(message);
            } else if (type === 'error') {
                notyf.open({
                    type: 'warning',
                    message: message,
                    duration: 5000, 
                    background: 'orange', 
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