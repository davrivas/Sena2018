<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 7</title>
</head>
<body>
	<h1>Ejercicio 7</h1>

	<form action="ejercicio-7.php" method="post">
		<div>
			<label for="numero">Numero</label>
			<input type="number" name="numero" autofocus required>
		</div>
		<div>
			<input type="submit" id="calcular" name="calcular" value="Calcular si es primo">
		</div>
	</form>

	<?php
		if (isset($_POST['numero'])) {
			$numero = $_POST['numero'];
			$mensaje = "";

			if ($numero < 0) {
				$mensaje = "Los números primos no pueden ser negativos.";
			} elseif ($numero == 0 || $numero == 1) {
				$mensaje = $numero . " no es un número primo";
			} else {
				$contadorPrimos = 0;
				for ($i = 1; $i <= $numero; $i++) {
					if (($numero % $i) == 0) {
						$contadorPrimos++;
					}
				}

				if ($contadorPrimos == 2) {
					$mensaje = $numero . " es un número primo";
				} else {
					$mensaje = $numero . " no es un número primo";
				}
			}

			echo $mensaje;
		}
	?>
</body>
</html>
