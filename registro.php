<?php
require 'db_conexion.php';

# Inicia Código de REGISTRAR

if (isset($_POST['registrar'])) {
    $numero_cuenta = $_POST['numero_cuenta'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo = $_POST['correo'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $password = '';
    
    

    if (!empty($numero_cuenta) && !empty($nombre_cliente) && !empty($correo) && !empty($tipo_cuenta) ) {
        $sql = $cnnPDO->prepare("INSERT INTO usuarios
                (numero_cuenta,nombre,correo,tipo_cuenta,password) VALUES (?,?,?,?,?)");
        $sql->execute([$_POST['numero_cuenta'], $_POST['nombre_cliente'], $_POST['correo'], $_POST['tipo_cuenta'], $password]);

        $mensaje = "";
       
    } else {
        
    }
}
# Termina Código de REGISTRAR
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
                <label for="numero_cuenta" class="form-label">Número de Cuenta</label>
                <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta">
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
                <select class="form-select" id="tipo_cuenta" name="tipo_cuenta">
                    <option selected>Open this select menu</option>
                    <option value="debito">Debito</option>
                    <option value="ahorro">Ahorro</option>
                    <option value="credito">Tarjeta de Credito</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        </form>
    </div>
</body>

</html>