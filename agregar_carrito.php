<?php
session_start();

// Redirigir si no viene de una solicitud POST válida
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id_producto'])) {
    header("Location: index.php");
    exit();
}

// 1. Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// 2. Capturar y sanear los datos
$id_producto = $_POST['id_producto'];
$nombre = htmlspecialchars($_POST['nombre']);
$precio = (float)$_POST['precio'];
$cantidad = (int)$_POST['cantidad'];

// Validación básica de cantidad
if ($cantidad <= 0) {
    $cantidad = 1;
}

// 3. Lógica para añadir/actualizar
if (array_key_exists($id_producto, $_SESSION['carrito'])) {
    // El producto ya está, solo actualiza la cantidad
    $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
} else {
    // El producto es nuevo, agrégalo al array con sus detalles
    $_SESSION['carrito'][$id_producto] = [
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad
    ];
}

// 4. Redirigir al usuario de vuelta a la página principal
header("Location: index.php");
exit();
?>