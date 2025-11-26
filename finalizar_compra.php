<?php
session_start();

if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit();
}


$pedido_finalizado = $_SESSION['carrito'];
$total_final = 0;
foreach ($pedido_finalizado as $item) {
    $total_final += $item['precio'] * $item['cantidad'];
}

unset($_SESSION['carrito']);


$_SESSION['confirmacion_total'] = number_format($total_final, 2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Compra</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="text-center">
            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
            <h1 class="mt-3 text-success">¡Compra Finalizada con Éxito!</h1>
            
            <p class="lead mt-4">Tu pedido ha sido procesado. Hemos vaciado tu carrito.</p>
            
            <?php if (isset($_SESSION['confirmacion_total'])): ?>
                <div class="alert alert-info d-inline-block p-3">
                    <strong>Total pagado:</strong> $<?php echo $_SESSION['confirmacion_total']; ?>
                </div>
                <?php unset($_SESSION['confirmacion_total']); ?>
            <?php endif; ?>
            
            <hr class="my-4">
            
            <a href="index.php" class="btn btn-primary btn-lg">Volver al Catálogo</a>
            
            <p class="mt-4 text-muted">Gracias por tu compra.</p>
        </div>
    </div>
</body>
</html>