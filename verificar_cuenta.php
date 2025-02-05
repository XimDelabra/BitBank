<?php
require 'db_conexion.php';
header('Content-Type: application/json');

if (isset($_POST["numeroTransferir"])) {
    
        $numero_transferir = $_POST['numeroTransferir'];

        // Verifica que el numero a transferir exista
        $select = $cnnPDO->prepare("SELECT * FROM usuarios WHERE numero_cuenta = ?");
        $select->execute([$numero_transferir]);
        
       
        if ($select->rowCount() > 0) {
            $campo = $select->fetch();
            $nombre = $campo['nombre'];
            echo json_encode(['status' => 'success', 'nombre' => $nombre]);
        } else {
            echo json_encode(['status' => 'error', 'message' => ' no existe.']);
        }
    
} 
