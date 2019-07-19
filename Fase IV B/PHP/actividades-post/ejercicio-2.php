<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>

    <?php
        $subTotalSinIVA = $_POST['producto1'] + $_POST['producto2'] + $_POST['producto3'];
        $subTotalConIVA = ($subTotalSinIVA * $_POST['iva']) / 100;
        $total = $subTotalSinIVA + $subTotalConIVA;
    ?>

    <p><strong>Subtotal: </strong> $<?php echo $subTotalSinIVA ?></p>
    <p><strong>IVA:</strong> <?php echo $_POST['iva'] ?>%</p>
    <p><strong>Total:</strong> $<?php echo $total ?></p>
</body>
</html>
