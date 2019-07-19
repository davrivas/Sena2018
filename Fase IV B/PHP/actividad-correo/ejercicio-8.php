<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 8</title>
</head>
<body>
	<h1>Ejercicio 8</h1>

	<form action="ejercicio-8.php" method="post">
		<div>
			<label for="numero">Numero</label>
			<input type="number" name="numero"  autofocus required>
		</div>
		<div>
			<input type="submit" id="calcular" name="calcular" value="Calcular multiplos de cuatro hasta el número">
		</div>
	</form>

	<?php
		if (isset($_POST['numero'])) {
			$numero = $_POST['numero'];
			if ($numero == 0) {
				echo "No es posible calcular";
			} elseif($numero < 0) {
				echo "Los multiplos de 4 del -1 hasta " . $numero . " son: ";

				for ($i = (-1); $i>= $numero; $i--) {
					if (($i % 4) == 0) {
						echo $i . " ";
					}
				}
			} else {
				echo "Los multiplos de 4 del 1 hasta " . $numero . " son: ";
				for ($i = 1; $i<= $numero; $i++) {
					if (($i % 4) == 0) {
						echo $i . " ";
					}
				}
			}
		}
	?>
</body>
</html>
