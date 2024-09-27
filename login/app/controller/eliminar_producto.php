<?php
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$data = json_decode(file_get_contents("php://input"), true);
$index = $data['index'];

if (isset($_SESSION['productos'][$index])) {
    unset($_SESSION['productos'][$index]);
    $_SESSION['productos'] = array_values($_SESSION['productos']); 
    echo json_encode([1, "Producto eliminado", $_SESSION['productos']]);
} else {
    echo json_encode([0, "Producto no encontrado"]);
}
?>
