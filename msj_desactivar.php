<?php

$email = $_SESSION['correo'];
$mensaje = "
<html>

<head>
    <title>Desactivacion de Cuenta</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
          
        }

        table {
            width: 100%;
          
        }

        td {
            
            background-color: #c0c3c59f;
            border-radius: 5px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        td h1,
        td p {
            color: white;
            margin: 0;
            letter-spacing: 2px;
            background-color: #c0c3c59f;

        }

        .content {
            font-size: 16px;
            line-height: 1.5;
        }

        .mail {
            background: url(images/adios.jpg);
            width: 100%;
            height: 500px;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <table>
       
        <tr>
            <td>
                <div class='mail'>
                    <h1>Tu cuenta a sido desactivada</h1><br>
                    <p>Esperamos que puedas volver pronto</p>

                </div>
            </td>
        </tr>
    </table>
</body>

</html>";


// $mensaje = "Este mail fue enviado por el usuario: " . $name . "\n";
// $mensaje .= "Su correo es: " . $email . "\n";
// $mensaje .= "Su celular es: " . $celular . "\n";
// $mensaje .= "Ingreso: " . $ingreso . "\n";

$headers = "From: BitBank <no-reply@bitBank.com>\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$destinatario = $email;
$asunto = "Desactivacion de cuenta";

mail($destinatario, $asunto, $mensaje, $headers);

header("location: logout.php");
