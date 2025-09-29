<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="logincss.css">
</head>
<body>
    <header>
        <h1>Acceso Usuario</h1>
    </header>
    <section>
        <div class="container" >
        <form method="post" name="miLogin" id="miLogin" action="verificaUsuario.php">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required> <br>
            <label for="clave">Clave</label>
            <input type="password" name="clave" id="clave"><br><br>
            <input type="submit" value="Ingresar">
        </form>
        </div>

    </section>
</body>
</html>