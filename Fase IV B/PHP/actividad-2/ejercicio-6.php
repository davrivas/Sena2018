<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejercicio 6</title>
</head>
<body>
	<h1>Ejercicio 6</h1>
	
	<table border="1">
		<thead>
			<tr>
				<th>n¹</th>
				<th>n²</th>
				<th>n³</th>
				<th>n⁴</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=1; $i <= 4; $i++) { ?>
				<tr>
					<?php for ($j=1; $j <= 4; $j++) { ?>
						<td><?php echo pow($i, $j) ?></td>
					<?php } ?>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>