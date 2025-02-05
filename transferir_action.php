<?php
require 'db_conexion.php';
header('Content-Type: application/json');
session_start();
$correoRemitente=$_SESSION['correo'];

if (isset($_POST["numero_transferir"])) {
    try {
        $numero_transferir = $_POST['numero_transferir'];
        $saldo_transferir = $_POST['saldo_transferir'];
        $numero_cuenta = $_POST['numero_cuenta'];

        // Verifica que el numero a transferir exista
        $select = $cnnPDO->prepare("SELECT * FROM usuarios WHERE numero_cuenta = ?");
        $select->execute([$numero_transferir]);
        $datosDestino = $select->fetch(PDO::FETCH_ASSOC); 
        $correoDestinatario = $datosDestino['correo'];
        if ($select->rowCount() > 0) {
            
            $agg_saldo = $cnnPDO ->prepare('UPDATE usuarios SET saldo = saldo + ? WHERE numero_cuenta = ? ');
            $agg_saldo->execute([$saldo_transferir, $numero_transferir ]);

            $bajar_saldo = $cnnPDO ->prepare('UPDATE usuarios SET saldo = saldo - ? WHERE numero_cuenta = ? ');
            $bajar_saldo->execute([$saldo_transferir, $numero_cuenta ]);

            $mensajeRemitente = "<html>

<head>
    <!-- Poppins Font -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link
        href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
        rel='stylesheet'>
    <title>Transferencia Realizada</title>
    <style>
        body {
            font-family: Poppins;
        }

        .table {
            background-color: #c0c3c59f;
            padding: 20px;
            text-align: center;

        }

        h1 {
            font-weight: 200;
            margin: 10px;
        }

        .msg {
            margin: 0;
            font-size: 20px;
        }

        ul {
            list-style: none;
        }

        .password {
            text-align: center;
            font-size: 35px;
            font-weight: 200;
            margin: 0;
        }
    </style>

</head>

<body>
    <table class='table'>
        <tr>
            <td>
                <div class='mail'>
                    <h1>Tranferencia Exitosa!</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p>A Realizado una tranferencia a la cuenta:</p>
                <p class='msg'>$numero_transferir</p>
             
            </td>
        <tr>
            <td>
                <p>Por el Monto de:</p>
                <p class='msg'>$saldo_transferir</p>
            </td>
        </tr>
        </tr>
    </table>
</body>

</html>";
        $headers = "From: BitBank <no-reply@bitBank.com>\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $destinatario = $correoRemitente;
        $asunto = "Tranferencia Realizada | BitBank";

        (mail($destinatario, $asunto, $mensajeRemitente, $headers));


        $mensajeDestino = "<html>

<head>
    <!-- Poppins Font -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link
        href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
        rel='stylesheet'>
    <title>Recibiste una Tranferencia</title>
    <style>
        body {
            font-family: Poppins;
        }

        .table {
            background-color: #c0c3c59f;
            padding: 20px;
            text-align: center;

        }

        h1 {
            font-weight: 200;
            margin: 10px;
        }

        .msg {
            margin: 0;
            font-size: 20px;
        }

        ul {
            list-style: none;
        }

        .password {
            text-align: center;
            font-size: 35px;
            font-weight: 200;
            margin: 0;
        }
    </style>

</head>

<body>
    <table class='table'>
        <tr>
            <td>
                <div class='mail'>
                    <h1>Recibiste dinero en tu cuenta!</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p>La cuenta:</p>
                <p class='msg'>$numero_cuenta</p>
             
            </td>
        <tr>
            <td>
                <p>Te mando la cantidad de:</p>
                <p class='msg'>$saldo_transferir</p>
            </td>
        </tr>
        </tr>
    </table>
</body>

</html>";
        $headers = "From: BitBank <no-reply@bitBank.com>\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $destinatario = $correoDestinatario;
        $asunto = "Recibiste una Tranferencia | BitBank";

        (mail($destinatario, $asunto, $mensajeRemitente, $headers));

            echo json_encode(['status' => 'success', 'message' => 'Trasferecia exitosa. Se ha enviado un correo con los detalles.']);
            $_SESSION['saldo'] = $_SESSION['saldo']- $saldo_transferir;

            $insertt = $cnnPDO->prepare('INSERT INTO transferencias(cuenta_destino, cuenta_remitente, monto) VALUES (?,?,?)');
            $insertt->execute([$numero_transferir, $numero_cuenta, $saldo_transferir]);

        } else {
            echo json_encode(['status' => 'error', 'message' => 'El numero de cuenta a transferir no existe.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
