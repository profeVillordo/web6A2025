<?php
$id=$_GET['id'];
//echo $id; 

$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"base2025");

$peticion=mysqli_query($conexion, "DELETE FROM `datos` WHERE `id`='".$id."'");
if($peticion){
    echo "<script>alert('Los datos se han eliminado correctamente');</script>";
    echo "<script>window.location='listaDatos.php';</script>"; 
} else {
    echo "<script>alert('Error al eliminar los datos');</script>";
    echo "<script>window.location='listaDatos.php';</script>";
} 
?>