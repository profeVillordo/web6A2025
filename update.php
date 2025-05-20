<?php
$id=$_POST['id'];
$apeynom=$_POST['apeynom'];
$dni=$_POST['dni'];
$genero=$_POST['genero'];
$domicilio=$_POST['domicilio'];
$fecha_nac=$_POST['fecha_nac'];
//echo $id; die();
//echo $apeynom."-".$dni."-".$genero."-".$domicilio."-".$fecha_nac;die();
$conexion= mysqli_connect("localhost","root","");

if(!$conexion){
    die('la conexion a fallado:'.mysqli_error());
}

mysqli_select_db($conexion,"base2025");
$peticion=mysqli_query($conexion, "UPDATE `datos` SET `apeynom`= '".$apeynom."',`dni`='".$dni."',`genero`='".$genero."',`domicilio`='".$domicilio."',`fecha_nac`='".$fecha_nac."' WHERE `id`='".$id."'");
if($peticion){
    echo "<script>alert('Los datos se han actualizado correctamente');</script>";
    echo "<script>window.location='listaDatos.php';</script>";
}else{
    echo "<script>alert('Error al actualizar los datos');</script>";
    echo "<script>window.location='listaDatos.php';</script>";
}

mysqli_close($conexion);

?>