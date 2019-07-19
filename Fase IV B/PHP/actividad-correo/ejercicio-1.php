<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 1</title>
</head>
<body>
	<h1>Ejercicio 1</h1>

	<?php $numero = 0; ?>

	<h2>Números pares</h2>

	<table border="1">
		<tbody>
			<?php for ($i=1; $i <= 5; $i++) { ?>
				<tr>
					<?php for ($j=1; $j <= 5; $j++) { ?>
					
						<?php if (($numero % 2) == 0) { ?>
							<td> <?php echo $numero; ?> </td>
						<?php } ?>
						
						<?php $numero++; ?>
					<?php } ?>
				</tr>
						<?php
							// Miro si el número es mayor o igual a 50
							if ($numero >= 50) { 
								break;
							}
						?>
			<?php } ?>
		</tbody>
	</table>
	
	<h2>Números impares</h2>
	
	<ul>
		<?php for ($i=0; $i <= 50; $i++) { ?>
			<?php if ($i % 2 != 0) { ?>
				<li><?php echo $i; ?></li>
			<?php } ?>
		<?php } ?>
	<ul>
</body>
</html>