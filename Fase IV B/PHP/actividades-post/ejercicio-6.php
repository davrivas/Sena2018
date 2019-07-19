<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>Ejercicio 6</h1>

    <?php
        $paciente = $_POST['paciente'];
        $peso = $_POST['peso'];
        $estatura = $_POST['estatura'];
        $estaturaMT = $estatura / 100;
        $imc = ($peso) / (pow($estaturaMT, 2));
        $categoria = "";

        if ($imc < 18.5) {
            $categoria = "Por debajo del peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            $categoria = "Saludable";
        } elseif ($imc >= 25.0 && $imc <= 29.9) {
            $categoria = "Con sobrepeso";
        } elseif ($imc >= 30.0 && $imc <= 39.9) {
            $categoria = "Obeso";
        } else {
            $categoria = "Obesidad mórbida";
        }
    ?>

    <p><strong>Paciente:</strong> <?php echo $paciente ?></p>
    <p><strong>Peso:</strong> <?php echo $peso ?>kg</p>
    <p><strong>Estatura:</strong> <?php echo $estatura ?>cm</p>
    <p><strong>Indice de masa corporal (IMC):</strong> <?php echo $imc ?></p>
    <p><strong>Categoría:</strong> <?php echo $categoria ?></p>
</body>
</html>
