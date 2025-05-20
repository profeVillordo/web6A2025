<?php
$id=$_POST['id'];
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
$peticion=mysqli_query($conexion, "UPDATE `datos` SET `apeynom`= '".$apeynom."',`dni`='".$dni."',`genero`='".$genero."',`domicilio`='".$domicilio."',`fecha_nac`=[value-6] WHERE 1");

mysqli_close($conexion);

?>