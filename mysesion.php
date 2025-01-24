<?php
require 'db_conexion.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 >Bienvenido <?php echo($_SESSION['nombre']); ?>!</h1>
        <h2>Tu correo: <?php echo($_SESSION['correo']); ?> </h2><br>
        <h2>Tu numero de cuenta: <?php echo($_SESSION['numero_cuenta']); ?> </h2><br>
        <h2>Tu tipo de cuenta: <?php echo($_SESSION['tipo_cuenta']); ?> </h2><br>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesion</a>
        
    </div>
</body>
</html>