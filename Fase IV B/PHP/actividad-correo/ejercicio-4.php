<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 4</title>
</head>
<body>
	<h1>Ejercicio 4</h1>

	<form action="ejercicio-4.php" method="post">
		<div>
			<label for="valor1">Valor 1</label> <input type="number" name="valor1" autofocus required>
		</div>
		<div>
			<label for="valor2">Valor 2</label> <input type="number" name="valor2" required>
		</div>
		<div>
			<input type="submit" name="enviar" value="Enviar">
		</div>
	</form>

	<?php
		if (isset($_POST['valor1']) && isset($_POST['valor2'])) {
			$valor1 = $_POST['valor1'];
			$valor2 = $_POST['valor2'];
			$suma = $valor1 + $valor2;
			echo "La suma de " . $valor1 . " y " . $valor2 . " es " . $suma;
		}
	?>
</body>
</html>
