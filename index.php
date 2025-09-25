<?php

$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"negocio");
$peticion=mysqli_query($conexion, "SELECT * FROM productos");

mysqli_close($conexion);

//print_r($peticion);





?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-5">
        <section class="productos">
            <div class="container">
                <h2 class="text-center mb-5">Nuestros Productos</h2>
                
                <!-- Primera fila -->
              <div class="row mb-4">
                 <?php
            while($fila=mysqli_fetch_array($peticion)){ ?>
                
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="img/<?php echo $fila['imagen'];?>" class="card-img-top" alt="Producto 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Smartphone Premium</h5>
                                <p class="card-text">Último modelo con cámara de alta resolución y batería de larga duración. Perfecto para usuarios exigentes.</p>
                                <div class="mt-auto">
                                    <p class="price mb-3">$599.99</p>
                                    <button class="btn btn-primary w-100" onclick="agregarCarrito('Smartphone Premium', 599.99)">
                                        <i class="bi bi-cart-plus"></i> Agregar al Carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 <?php } ?>   
                
                <!-- Segunda fila -->
                
                    
                    <!-- fin -->
                </div>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function agregarCarrito(producto, precio) {
            // Mostrar notificación de éxito
            alert(`¡${producto} agregado al carrito por $${precio}!`);
            
            // Aquí puedes agregar la lógica real para añadir al carrito
            console.log(`Producto agregado: ${producto} - Precio: $${precio}`);
        }
    </script>
</body>
</html>