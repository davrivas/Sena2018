<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Ejercicio 5</h1>

    <p><strong>Vendedor:</strong> <?php echo $_POST['vendedor'] ?></p>

    <?php
        $salarioBasico = 450000;
        $comision = $_POST['cant-autos'] * 50000;
        $valorVenta = $_POST['total'] * 0.05;
        $salario = $salarioBasico + $comision + $valorVenta;
    ?>

    <p>Ganó en este mes $<?php echo $salario ?></p>
</body>
</html>
