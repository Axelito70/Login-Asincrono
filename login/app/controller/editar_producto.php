<?php
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

$data = json_decode(file_get_contents("php://input"), true);
$index = $data['index'];
$producto = $data['producto'];
$precio = $data['precio'];

if (isset($_SESSION['productos'][$index])) {
    $_SESSION['productos'][$index] = [$producto, $precio];
    echo json_encode([1, "Producto editado", $_SESSION['productos']]);
} else {
    echo json_encode([0, "Producto no encontrado"]);
}
?>
