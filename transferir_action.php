<?php
require 'db_conexion.php';
header('Content-Type: application/json');

if (isset($_POST["numero_transferir"])) {
    try {
        $numero_transferir = $_POST['numero_transferir'];
        $saldo_transferir = $_POST['saldo_transferir'];
        $numero_cuenta = $_POST['numero_cuenta'];


        // Verifica que el numero a transferir exista
        $select = $cnnPDO->prepare("SELECT * FROM usuarios WHERE numero_cuenta = ?");
        $select->execute([$numero_transferir]);
        if ($select->rowCount() > 0) {
            
            $agg_saldo = $cnnPDO ->prepare('UPDATE usuarios SET saldo = saldo + ? WHERE numero_cuenta = ? ');
            $agg_saldo->execute([$saldo_transferir, $numero_transferir ]);

            $bajar_saldo = $cnnPDO ->prepare('UPDATE usuarios SET saldo = saldo- ? WHERE numero_cuenta = ? ');
            $bajar_saldo->execute([$saldo_transferir, $numero_cuenta ]);

            

            echo json_encode(['status' => 'success', 'message' => 'Trasferecia exitosa. Se ha enviado un correo con los detalles.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'El numero de cuenta a transferir no existe.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error del servidor: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}
