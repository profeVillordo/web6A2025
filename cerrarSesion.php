<?php
session_start();

// Elimina la variable de sesión del carrito
unset($_SESSION['loggedin']);

// Opcional: Puedes establecer un mensaje de confirmación aquí
// $_SESSION['mensaje'] = "El carrito ha sido vaciado.";

// Redirige de vuelta al carrito o a la página principal
header("Location: login_form.php");
exit();
?>