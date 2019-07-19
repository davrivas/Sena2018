<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Ejercicio 4</h1>

    <?php
        $mensaje = "";
        $promedio = ($_POST['parcial1'] + $_POST['parcial2'] + $_POST['parcial3']) / 3;

        $promedioPorcentaje = $promedio * 0.35;
        $promedioExamen = $_POST['examen-final'] * 0.35;
        $promedioTrabajo = $_POST['trabajo-final'] * 0.3;
        $notaFinal = $promedioPorcentaje + $promedioExamen + $promedioTrabajo;

        if ($notaFinal >= 3) {
            $mensaje = "Aprobó";
        } else {
            $mensaje = "No aprobó";
        }
    ?>

    <p><strong>Nota final:</strong> <?php echo $notaFinal ?></p>
    <p><?php echo $mensaje ?></p>
</body>
</html>
