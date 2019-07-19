<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3</h1>

    <?php
        if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['genero']) && isset($_POST['fecha-nacimiento'])) {
            echo "Sus datos fueron registrados correctamente";
        } else {
            echo "Sus datos no fueron registrados correctamente";
        }
    ?>
</body>
</html>
