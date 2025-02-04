<?php
require 'db_conexion.php';
session_start();
header('Content-Type: application/json');

if (isset($_POST["cuenta_correo"])){
    try {
        $cuenta_correo = $_POST['cuenta_correo'];
        $password = $_POST['password'];

        // Verifica que el correo no este registrado
        $select = $cnnPDO->prepare('SELECT * from usuarios WHERE (correo = ? OR numero_cuenta = ?) AND password = ?');
        $select->execute([$cuenta_correo, $cuenta_correo, $password]);
        $count = $select->rowCount();
        $campo = $select->fetch(PDO::FETCH_ASSOC);

        if ($count) {
            if($campo['estado']== 0) {
                    echo json_encode(['status' => 'error', 'message' => 'Cuenta desactivada']);
            } elseif($campo['estado']== 1){
                $_SESSION['numero_cuenta'] = $campo['numero_cuenta'];
                $_SESSION['correo'] = $campo['correo'];
                $_SESSION['nombre'] = $campo['nombre'];
                $_SESSION['tipo_cuenta'] = $campo['tipo_cuenta'];
                $_SESSION['password'] = $campo['password'];
                $_SESSION['saldo'] = $campo['saldo'];
                $_SESSION['estado'] = $campo['estado'];

                echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso.']);
                exit;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Correo o Contrasena incorrectos']);
            
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}