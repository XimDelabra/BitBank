<?php
require 'db_conexion.php';

# Inicia Código de REGISTRAR
if (isset($_POST['registrar'])) {
    $numero_cuenta = $_POST['numero_cuenta'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo = $_POST['correo'];
    $tipo_cuenta = $_POST['tipo_cuenta'];
    $password = '';
    $bytes = random_bytes(5);
    $password = substr(bin2hex($bytes), 0, 5);

    if (!empty($numero_cuenta) && !empty($nombre_cliente) && !empty($correo) && !empty($tipo_cuenta)) {
        #Verificamos que el correo no este registrado
            $select = $cnnPDO->prepare("SELECT * FROM usuarios WHERE correo = ?");
            $select->execute([$correo]);
            $correo_registrado = $select->fetchColumn();

        #Verificamos que el numero de cuenta no este registrado
            $select_number = $cnnPDO->prepare("SELECT * FROM usuarios WHERE numero_cuenta = ?");
            $select_number->execute([$numero_cuenta]);
            $numero_registrado = $select_number->fetchColumn();

        if ($correo_registrado > 0) {
            $alertType = 'error';
            $alertMessage = 'Mensaje: El correo ' . $correo . ' ya está registrado.';

        } elseif ($numero_registrado > 0){
            $alertType = 'error';
            $alertMessage = 'Mensaje: El numero de cuenta ' . $numero_cuenta . ' ya está registrado.';

        } else{
            $sql = $cnnPDO->prepare("INSERT INTO usuarios
                    (numero_cuenta,nombre,correo,tipo_cuenta,password) VALUES (?,?,?,?,?)");
            $sql->execute([$numero_cuenta, $nombre_cliente, $correo, $tipo_cuenta, $password]);

            $alertType = 'success';
            $alertMessage = 'Registro exitoso. Se envió un correo con su contrasena.';

            $mensaje = "<html>

            <head>
                <title>Correo desde la web</title>
                
            </head>

            <body>
                <table>
                    <tr>
                        <td>
                            <div class='mail'>
                                <h1>Correo enviado desde la web</h1><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ol>
                                <li>Tu numero de cuenta: <strong>$numero_cuenta</strong></li>
                                <li>Tu nombre: <strong>$nombre_cliente</strong></li>
                                <li>Tu correo: <strong>$correo</strong></li>
                                <li>Tu tipo de cuenta: <strong>$tipo_cuenta</strong></li>
                                <li>Tu nueva CONTRASENA: <strong>$password</strong></li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOkKe7Eh7DaTREZ0Tz12-Kh7Ij0s9INOYP5g&s'>
                        </td>
                    </tr>
                </table>
            </body>

            </html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $destinatario = $correo;
            $asunto = "Correo enviado desde la web :)";

            (mail($destinatario, $asunto, $mensaje, $headers));

            unset($sql);
            unset($cnnPDO);
        
        }
    } else {
        $alertType = 'success';
        $alertMessage = 'Por favor, rellena todos los campos.';
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
    <script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
   
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
                <label for="numero_cuenta" class="form-label ">Número de Cuenta</label>
                <input type="text" class="form-control input-number" id="numero_cuenta" name="numero_cuenta">
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
    <script>
        new Cleave('.input-number', {
            blocks: [4, 4, 4, 4], // Cuatro bloques de 4 dígitos
            numericOnly: true
        });


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