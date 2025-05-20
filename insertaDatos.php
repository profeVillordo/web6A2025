<?php
$apeynom=$_POST['apeynom'];
$dni=$_POST['dni'];
$genero=$_POST['genero'];
$domicilio=$_POST['domicilio'];
$fecha_nac=$_POST['fecha_nac'];
//echo $apeynom."-".$dni."-".$genero."-".$domicilio."-".$fecha_nac;die();
$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"base2025");
$peticion=mysqli_query($conexion, "INSERT INTO `datos`(`id`, `apeynom`, `dni`, `genero`, `domicilio`, `fecha_nac`) VALUES (DEFAULT,'".$apeynom."',".$dni.",".$genero.",'".$domicilio."','".$fecha_nac."')");

mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    57d48bf2b83ad4cd8aa8cd00354278d0d31c6ac2

    
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
        body{
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            margin-right:20%;
            margin-left:20%;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php if($peticion){ ?>
        <h1>Los datos se han guardado correctamente</h1>
        <a href="listaDatos.php"><button id="agrega">Ver Datos</button></a>
    <?php }else{ ?>
        <h1>Los datos no se han guardado correctamente</h1>
        <a href="form.php"><button id="agrega">Volver</button></a>
    <?php } ?>
</body>
</html>