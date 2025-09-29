<?php session_start();
if(isset($_POST['usuario']) && isset($_POST['clave'])) {
  $usuario = $_POST['usuario'];
  $clave = sha1($_POST['clave']);
  //echo 'usuario:'.$usuario.' clave:'.$clave; die();

  // Validar el usuario y la contraseña
  $conexion = mysqli_connect("localhost","root","");

if(!$conexion){die('La conexion ha fallado por:'.mysqli_error());}

mysqli_select_db($conexion,"miempresa");


$peticionUsu= mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `usuario`='".$usuario."' AND `clave`='".$clave."'");
//print_r($peticionUsu); die();

 while($usua=mysqli_fetch_array($peticionUsu)){
    echo 'usuario:'.$usua['usuario'];
    $_SESSION['usuario']=$usua['usuario']; $_SESSION['loggedin'] = true;


    }

   // exit();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // Mostrar el contenido protegido
 // echo "¡Bienvenido, " . $_SESSION['usuario'] . "!";
  header('Location: listandoPersonas.php');
} else {
  // Redirigir al usuario al formulario de inicio de sesión
  header('Location: login_form.php');
    

 
mysqli_close($conexion);
}
}
 ?>

