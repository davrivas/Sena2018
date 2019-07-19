<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 2</title>
</head>
<body>
	<h1>Ejercicio 2</h1>

	<form action="ejercicio-2.php" method="post">
		<div>
			<label for="edad">Edad</label> <input type="number" name="edad" autofocus required>
		</div>
		<div>
			<input type="submit" name="enviar" value="Enviar">
		</div>
	</form>

	<?php
		if (isset($_POST['edad'])) {
			$edad = $_POST['edad'];
			$mensaje = "";

		   	if ($edad >= 18 && $edad <= 67) {
		   		$mensaje = "El usuario está en edad para trabajar";
		   	} else {
		   		$mensaje = "El usuario no está en edad para trabajar";
		   	}

			echo $mensaje;
		}
	?>
</body>
</html>
