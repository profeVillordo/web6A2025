<?php

$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"negocio");
$peticion=mysqli_query($conexion, "SELECT * FROM productos");
$categorias=mysqli_query($conexion, "SELECT * FROM categorias");
mysqli_close($conexion);

//print_r($peticion);



session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}


function contar_total_items() {
    $total = 0;
    foreach ($_SESSION['carrito'] as $item) {
        $total += $item['cantidad'];
    }
    return $total;
}

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
        <select id="cat" name="cat">
             <option value="">Seleccione categoria</option>
             <?php
            while($row=mysqli_fetch_array($categorias)){ ?>
           
            <option value="<?php echo $row['id_categoria'];?> "><?php echo $row['categoria'];?></option>
           

                <?php } ?>
    </select>
        <section class="productos">
            <div class="container">
                <h2 class="text-center mb-5">Nuestros Productos</h2>
                <a href="carrito.php" class="btn btn-success mb-4">
                    Carrito <i class="bi bi-cart"></i> 
                    <span class="badge bg-light text-success"><?php echo contar_total_items();?></span> 
                </a>
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
                                   <form method="POST" action="agregar_carrito.php">
                                        <input type="hidden" name="id_producto" value="<?php echo $fila['id'];?>">
                                        <input type="hidden" name="nombre" value="<?php echo $fila['nom_del_producto'];?>">
                                        <input type="hidden" name="precio" value="<?php echo $fila['precio_unitario'];?>">
                                        
                                        <label for="cantidad_<?php echo $fila['id'];?>" class="form-label visually-hidden">Cantidad</label>
                                        <input type="number" id="cantidad_<?php echo $fila['id'];?>" name="cantidad" value="1" min="1" class="form-control mb-2 text-center" required>
                                        
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-cart-plus"></i> Agregar al Carrito
                                        </button>
                                    </form>
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
            $_SESSION['mis_producto'] += 1;
            window.location.reload();
            // Aquí puedes agregar la lógica real para añadir al carrito
            console.log(`Producto agregado: ${producto} - Precio: $${precio}`);
        }
    </script>
</body>
</html> 