<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 7</title>
</head>
<body>
    <h1>Ejercicio 7</h1>

    <?php
        $presupuesto = $_POST['presupuesto'];
        $ginecologia = $presupuesto * 0.4;
        $traumatologia = $presupuesto * 0.3;
        $pediatria = $presupuesto * 0.3;
    ?>

    <p><strong>Presupuesto anual:</strong> $<?php echo $presupuesto ?></p>
    <p><strong>Para ginecologia:</strong> $<?php echo $ginecologia ?></p>
    <p><strong>Para traumatologia:</strong> $<?php echo $traumatologia ?></p>
    <p><strong>Para pediatria:</strong> $<?php echo $pediatria ?></p>
</body>
</html>
