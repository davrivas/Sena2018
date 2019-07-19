<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1</h1>

    <ul>
        <li><strong>Tílulo:</strong> <?php echo $_POST['titulo'] ?></li>
        <li><strong>Director:</strong> <?php echo $_POST['director'] ?></li>
        <li><strong>Género:</strong> <?php echo $_POST['genero'] ?></li>
        <li><strong>Año:</strong> <?php echo $_POST['year'] ?></li>
        <li><strong>Duración:</strong> <?php echo $_POST['duracion'] ?> minutos</li>
        <?php
            $alt = $_POST['titulo'] . ", " . $_POST['year'];
            $temp = $_FILES["caratula"]["tmp_name"];

            $ruta = "img/" . $alt;

            move_uploaded_file($temp, $ruta);
        ?>
        <li>
            <strong>Carátula:</strong><br>
            <img src="<?php echo $ruta ?>" alt="<?php echo $alt ?>" width="200" height="auto">
        </li>
    </ul>
</body>
</html>
