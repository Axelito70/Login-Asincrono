<?php
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

if (isset($_POST['producto']) && isset($_POST['precio'])) {
    array_push($_SESSION['productos'], [$_POST['producto'], $_POST['precio']]);
    echo json_encode([1, "Producto agregado", $_SESSION['productos']]);
} else {
    echo json_encode([0, "Error al agregar el producto"]);
}
?>
