<?php
require 'db_conexion.php';
header('Content-Type: application/json');

if (isset($_POST["numero_cuenta"])){
    try {
        $numero_cuenta = $_POST['numero_cuenta'];
        $nombre_cliente = $_POST['nombre_cliente'];
        $correo = $_POST['correo'];
        $tipo_cuenta = $_POST['tipo_cuenta'];

        // Verifica que el correo no este registrado
        $select = $cnnPDO->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $select->execute([$correo]);
        if ($select->rowCount() > 0) {
            echo json_encode(['status' => 'error', 'message' => 'El correo ya está registrado.']);
            exit;
        }

        // Verifica que el número de cuenta no este registrado
        $select_number = $cnnPDO->prepare("SELECT * FROM usuarios WHERE numero_cuenta = ?");
        $select_number->execute([$numero_cuenta]);
        if ($select_number->rowCount() > 0) {
            echo json_encode(['status' => 'error', 'message' => 'El número de cuenta ya está registrado.']);
            exit;
        }

        // Genera contraseña
        $bytes = random_bytes(5);
        $password = substr(bin2hex($bytes), 0, 5);

        $sql = $cnnPDO->prepare("INSERT INTO usuarios (numero_cuenta, nombre, correo, tipo_cuenta, password) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$numero_cuenta, $nombre_cliente, $correo, $tipo_cuenta, $password]);

        $mensaje = "<html>

<head>
    <!-- Poppins Font -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link
        href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
        rel='stylesheet'>
    <title>Registro Completado</title>
    <style>
        body {
            background-image: url(images/bg-msg.jpg);
            background-size: cover;
            font-family: Poppins;
        }

        .table {
            background-color: #c0c3c59f;
            padding: 5px;
           
        }

        h1 {
            font-weight: 200;
            margin: 0;
        }
        .img-cont{
            display: flex;
            justify-content: end;
        }
        .img{
            width: 60px;
            
        
        }
        .msg {
            margin: 0;
            font-size: 20px;
        }

        ul {
            list-style: none;
        }
        .password{
            text-align: center;
            font-size: 35px;
            font-weight: 200;
            margin: 0;
        }
        .link{
            text-align: center;
        }
    </style>

</head>

<body>
    <table class='table'>
        <tr class='img-cont'>
            <td><img class='img' src='images/logo.png'></td>
        </tr>
        <tr>
            <td>
                <div class='mail'>
                    <h1>Bienvenido $nombre_cliente</h1>
                    <p class='msg'>Muchas gracias por confiar en nosotros</p><br>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p>Tus datos son los siguientes:</p>
                <ul>
                    <li>Numero de cuenta: <strong>$numero_cuenta</strong></li>
                    <li>Nombre: <strong>$nombre_cliente</strong></li>
                    <li>Correo: <strong>$correo</strong></li>
                    <li>Tipo de cuenta: <strong>$tipo_cuenta</strong></li>
                </ul>
            </td>
        <tr>
            <td>
                <p class='msg'>Podras acceder a tu cuenta con la contrasena:</p>
                <p class='password'>$password</p>
                <p class='link'>En la siguiente liga <a href='login.php'>Iniciar Sesion</a></p>
            </td>
        </tr>
        </tr>
        <tr>

        </tr>
    </table>
</body>

</html>";
        $headers = "From: BitBank <no-reply@bitBank.com>\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $destinatario = $correo;
        $asunto = "Registro Completo | BitBank";

        (mail($destinatario, $asunto, $mensaje, $headers));

        echo json_encode(['status' => 'success', 'message' => 'Registro exitoso. Se ha enviado un correo con la contraseña.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
