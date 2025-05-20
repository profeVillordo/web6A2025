<?php

$id=$_GET['id'];
$conexion= mysqli_connect("localhost","root","");
if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}
mysqli_select_db($conexion,"base2025");
$peticion=mysqli_query($conexion, "SELECT * FROM datos WHERE id=".$id);
$datos=mysqli_fetch_array($peticion);
print_r($datos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        section {
            margin-top: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Formulario de Edicion de Datos</h1>
    </header>
    <section>
        <form id="myForm" method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $datos['id'];?>" required>

            <label for="">Apellido y Nombres</label>
            <input type="text" id="apeynom" name="apeynom" value="<?php echo $datos['apeynom']; ?>" required>
            <label for="dni">DNI:</label>
            <input type="number" id="dni" name="dni" value="<?php echo $datos['dni']; ?>" required>
            
            <label for="genero">Genero:</label>
            <select id="genero" name="genero">
                <option value="1" <?php if($datos['genero'] == '1') echo 'selected'; ?>>Masculino</option>
                <option value="2" <?php if($datos['genero'] == '2') echo 'selected'; ?>>Femenino</option>
                <option value="3" <?php if($datos['genero'] == '3 ') echo 'selected'; ?>>Otro</option>
            </select>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" value="<?php echo $datos['domicilio']; ?>" required>

            <label for="fecha_nac">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nac" name="fecha_nac" value="<?php echo $datos['fecha_nac']; ?>" required>

            <button type="submit">Actualizar</button>

        </form>
    </section>
    
</body>
</html>