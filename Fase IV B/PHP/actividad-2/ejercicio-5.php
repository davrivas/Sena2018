<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 5</title>
</head>
<body>
	<h1>Ejercicio 5</h1>

	<?php $numero = 1; //Defino el número a incrementar ?>

	<table border="1">
		<tbody>
			<?php for ($i=1; $i <= 10; $i++) { // Para incrementar el número de filas ?> 
				<tr>
					<?php for ($j=1; $j <= 10; $j++) { // Para incrementar el número de columnas ?>
						<?php if (($i % 2) == 0) { // Pregunto si la fila es impar ?>
							<td style="background-color: #d3d3d3"> <?php echo $numero; // La coloreo de gris ?> </td>
						<?php } else { ?>
							<td><?php echo $numero; ?></td>
						<?php }
							$numero++; // Se incrementa el número
						?>
							</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>