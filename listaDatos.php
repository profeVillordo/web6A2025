<?php

$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"base2025");
$peticion=mysqli_query($conexion, "SELECT * FROM datos");

mysqli_close($conexion);

//print_r($peticion);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #agrega{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 12px;
        }
        #agrega:hover{
            background-color: #45a049;
            color: #000;
        }
    
         #editar{
            background-color: #FFFF00;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 12px;
        }
        #editar:hover{
            background-color:rgb(70, 71, 70);
            color: #fff;
        }
        #eliminar{
            background-color: #FF0000;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 12px;
        }
        #eliminar:hover{
            background-color:rgb(170, 174, 170);
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Datos</h1>
    </header>
    <section>
        <h2>Tabla de Datos</h2>

        <a href="form.php"><button id='agrega' type="button">Agregar</button></a>
        
        <table border="1">
            <tr><th>Apellido y nombres</th><th>DNI</th><th>Genero</th><th>Domicilio</th><th>Fecha de Nacimiento</th><th colspan="2">Acciones</th></tr>
            <?php
            while($fila=mysqli_fetch_array($peticion)){
                if ($fila['genero']==1) {
                    $gen="Masculino";
                }elseif ($fila['genero']==2) {
                    $gen="Femenino";
                }else{
                    $gen="Otro";
                }
                ?>
                <tr><td><?php echo $fila['apeynom'];?></td><td><?php echo $fila['dni'];?></td>
                <td><?= $gen;?></td><td><?= $fila['domicilio'];?></td><td><?= $fila['fecha_nac'];?></td><td><a href="editar.php?id=<?= $fila['id'];?>"><button id=editar type="button">Editar</button></a></td><td><button id=eliminar type="button">Eliminar</button></td></tr>
            <?php

            }

            ?>
            
        </table>    
    </section>
</body>
</html>