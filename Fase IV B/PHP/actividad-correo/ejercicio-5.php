<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 5</title>
</head>
<body>
	<h1>Ejercicio 5</h1>

	<?php
		$horaColombia = ("5" * 60) * 60; // Calculo la hora de Colombia
		$fecha = new DateTime(gmdate("Y-m-d H:i:s", time()-($horaColombia))); // Creo una nueva fecha
		$hora = $fecha->format('H'); // Saco la hora

		$saludo = ""; // Defino la variable del saludo

		if ($hora > 8 && $hora <= 13) {
			$saludo = "Buenos días.";
		} elseif ($hora > 13 && $hora <= 15) {
			$saludo = "Que aproveche la comida.";
		} elseif ($hora > 15 && $hora <= 17) {
			$saludo = "Es la hora del café";
		} elseif ($hora > 17 && $hora <= 20) {
			$saludo = "Es la hora de la merienda";
		} else {
			$saludo = "Buenas noches";
		}
	?>

	<p>Son las <?php echo $fecha->format('H:i') // La formateo como hora:minuto ?></p>
	<p><?php echo $saludo; ?></p>
</body>
</html>