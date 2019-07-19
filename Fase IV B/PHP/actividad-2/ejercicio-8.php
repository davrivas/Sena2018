<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 7</title>
</head>
<body>
	<h1>Ejercicio 8</h1>

	<?php $dir = scandir('img'); // Escanedo el directorio ?>

	<?php foreach ($dir as $img) { ?>
		<?php $ext = pathinfo($img, PATHINFO_EXTENSION); // Reviso la extensión del archivo ?>
		<?php
			// Reviso si la extensión es de imágen
			if ($ext == 'jpeg' ||
				$ext == 'jpg' || 
				$ext == 'png' || 
				$ext == 'bmp' || 
				$ext == 'gif')
			{
		?>
			<p>
				<a href="img/<?php echo $img ?>">
					<img src="img/<?php echo $img ?>" alt="<?php echo $img ?>" width="100" height="100">
				</a>
			</p>
		<?php } ?>
	<?php } ?>
</body>
</html>