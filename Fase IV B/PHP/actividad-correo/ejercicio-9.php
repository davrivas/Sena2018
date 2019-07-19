<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 9</title>
</head>
<body>
	<h1>Ejercicio 9</h1>

	<p>
		Números primos de 0 hasta 100:
		<?php

			for ($i=0; $i <= 100; $i++) {
				$contador = 0;
				for ($j=1; $j <= $i; $j++) {
					if (($i % $j) == 0) {
						$contador++;
					}
				}

				if ($contador == 2) {
					echo $i . " ";
				}
			}
		?>
	</p>
</body>
</html>
