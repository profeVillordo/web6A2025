<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$carrito = $_SESSION['carrito'];
$total_general = 0;

// Lógica para ELIMINAR un producto
if (isset($_GET['action']) && $_GET['action'] == 'eliminar' && isset($_GET['id'])) {
    $id_a_eliminar = $_GET['id'];
    if (array_key_exists($id_a_eliminar, $_SESSION['carrito'])) {
        unset($_SESSION['carrito'][$id_a_eliminar]);
        // Redirigir para limpiar la URL
        header("Location: carrito.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito de Compras</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Resumen de tu Carrito <i class="bi bi-cart"></i></h2>
        
        <?php if (empty($carrito)): ?>
            <div class="alert alert-info">Tu carrito está vacío. ¡Ve a la <a href="index.php">tienda</a> para agregar productos!</div>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $id => $item): 
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total_general += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                        <td>$<?php echo number_format($item['precio'], 2); ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <a href="carrito.php?action=eliminar&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total General:</th>
                        <th>$<?php echo number_format($total_general, 2); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            
            <div class="text-end mt-4">
                               <div class="text-end mt-4">
    <a href="index.php" class="btn btn-secondary me-2">Seguir Comprando</a>
    <a href="finalizar_compra.php" class="btn btn-success">
        <i class="bi bi-bag-check"></i> Finalizar Compra
    </a>
</div>
                <a href="vaciar_carrito.php" class="btn btn-warning ms-2">Vaciar Carrito</a>
            </div>
        <?php endif; ?>
        
        <div class="mt-3"><a href="index.php">Volver al Catálogo</a></div>
    </div>
                        <a href="cerrarSesion.php">Cerrar Sesion</a>
</body>
</html>