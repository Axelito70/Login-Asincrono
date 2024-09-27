
<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Si se está haciendo una solicitud POST (envío de datos)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'] ?? null;
    $precio = $_POST['precio'] ?? null;

    // Validar que ambos campos estén completos
    if ($producto && $precio) {
        // Agregar el producto a la sesión
        $_SESSION['productos'][] = [$producto, $precio];

        // Responder con un éxito y un mensaje
        echo json_encode([1, "¡Producto agregado con éxito!"]);
    } else {
        // Responder con un error si los datos están incompletos
        echo json_encode([0, "Error: Producto o precio incompletos."]);
    }
} else {
    echo json_encode($_SESSION['productos']);
}
?>