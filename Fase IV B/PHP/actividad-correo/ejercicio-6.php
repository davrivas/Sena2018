<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 6</title>
</head>
<body>
	<h1>Ejercicio 6</h1>

	<form action="ejercicio-6.php" method="post">
		<div>
			<label for="numero">Numero</label>
			<input type="number" name="numero" autofocus required>
		</div>
		<div>
			<input type="submit" id="calcular" name="calcular" value="Calcular factorial">
		</div>
	</form>

	<?php
		if (isset($_POST['numero'])) {
			$numero = $_POST['numero'];
			$mensaje = "";

			if ($numero < 0) {
				$mensaje = "No existe el factorial.";
			} elseif ($numero == 0) {
				$mensaje = "0! = 1";
			} elseif ($numero >= 150) {
				$mensaje = "El factorial tiende a ser infinito";
			} else {
				$factorial = 1;
				for ($i = 1; $i <= $numero; $i++) {
					$factorial = $factorial * $i;
				}
				$mensaje = $numero . "! = " . $factorial;
			}

			echo $mensaje;
		}
	?>
</body>
</html>
