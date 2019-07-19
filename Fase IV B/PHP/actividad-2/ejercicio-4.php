<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 4</title>
</head>
<body>
	<h1>Ejercicio 4</h1>

	<?php $numero = 1; //Defino el número a incrementar ?>

	<table border="1">
		<tbody>
			<?php for ($i=1; $i <= 10; $i++) { // Para incrementar el número de filas ?> 
				<tr>
					<?php for ($j=1; $j <= 10; $j++) { // Para incrementar el número de columnas ?>
						<td>
							<?php echo $numero; // Se escribe el número ?>
							<?php $numero++; // Se incrementa el número ?>
						</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>