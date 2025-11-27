<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>


<style>
		body{
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
			text-align: center;
			margin-top: 50px;
			margin-right:20%;
			margin-left:20%;
			padding: 20px;
		}
		header{
			background-color: #4CAF50;
			color: white;
			padding: 10px 0;
		}
		h1{
			margin: 0;
		}
		section{
			background-color: white;
			padding: 20px;
			border-radius: 5px;
		}
		label{
			display: block;
			margin-bottom: 5px;
		}
		input, select{
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}
		button{
			background-color: #4CAF50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button:hover{
			background-color: #45a049;
		}
</style>

</head>
<body>
	<header>
		<h1>Formulario de Ingreso</h1>
	</header>

	<section>
		<form method="post" id="miForm"   action="insertaDatos.php">
			<label>Ingrese apellido y Nombres</label>
			<input type="text" required name="apeynom" id="apeynom"> <br>

			<label>Dni</label>
			<input type="number" required  maxlength="8" name="dni" id="dni"><br>

			<label>Genero</label>
			<select required name="genero" id="genero">
				<option value="">Seleccione</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
				
			</select><br>
			<label>Domicilio</label>
			<input required type="text" name="domicilio" id="domicilio" placeholder="por ej: Las Heras 4567"><br>
			<label>Fecha de Nac.</label>
			<input required type="date" name="fecha_nac" id="fecha_nac"><br>

			<a href="listaDatos.php"><button type="button">Cancelar</button></a>
			<input type="submit" name="" value="Enviar">

		</form>
	</section>
	<footer>
		<?php echo "Hoy es: ".date("d/m/Y"); ?>
		<i><?php echo "Es la hora: ".date('H:m:s');?></i>
	</footer>

</body>
</html>