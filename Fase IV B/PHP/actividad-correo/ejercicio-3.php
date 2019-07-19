<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 3</title>
</head>
<body>
	<h1>Ejercicio 3</h1>

	<form action="ejercicio-3.php" method="post">
		<div>
			<label for="numero1">Número 1</label> <input type="number" name="numero1" autofocus="autofocus" required>
		</div>
		<div>
			<label for="numero2">Número 2</label> <input type="number" name="numero2" required>
		</div>
		<div>
			<label for="numero3">Número 3</label> <input type="number" name="numero3" required>
		</div>
		<div>
			<input type="submit" name="enviar" value="Enviar">
		</div>
	</form>

	<?php
		if (isset($_POST['numero1']) && isset($_POST['numero2']) && isset($_POST['numero3'])) {
			$numero1 = $_POST['numero1'];
			$numero2 = $_POST['numero2'];
			$numero3 = $_POST['numero3'];
			$mayor = max($numero1, $numero2, $numero3); // Encuento el máximo valor
			$mensaje = "";

			if ($numero1 == $numero2 && $numero1 == $numero3 && $numero2 == $numero3) {
				$mensaje = "Todo los números son iguales.";
			} else {
				$mensaje = "El mayor número mayor es " . $mayor;
			}

			echo $mensaje;
		}	
	?>
</body>
</html>
