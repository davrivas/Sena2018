<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 7</title>
</head>
<body>
	<h1>Ejercicio 7</h1>

	<?php $dir = scandir('img'); // Escanedo el directorio ?>

	<?php foreach ($dir as $img) { ?>
		<p><img src="img/<?php echo $img ?>" alt="<?php echo $img ?>"></p>
	<?php } ?>
</body>
</html>