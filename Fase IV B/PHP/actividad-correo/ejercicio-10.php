<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicio 10</title>
  </head>
  <body>
      <h1>Ejercicio 10</h1>

      <?php
        // Si no se han inicializado
        $mensaje = "";
        if(!isset($_POST['aleatorio']) && !isset($_POST['contador'])) {
            $aleatorio = rand(0, 100);
            $contador = 0;
            $numero = -1;
        } else {
            $aleatorio = $_POST['aleatorio'];
            $contador = $_POST['contador'];
            $numero = $_POST['numero'];
            $contador++;
        }


        if ($aleatorio != $numero) { ?>
        <form action="ejercicio-10.php" method="post">
            <div>
                <label for="number">Número</label> <input type="number" name="numero" min="0" max="100" autofocus required>
            </div>
            <div>
                <input type="submit" name="adivinar" value="Adivinar">
            </div>
            <?php #Se guarda la variable $aleatorio ?>
            <input type="hidden" name="aleatorio" value="<?php echo $aleatorio; ?>">
            <?php #Se guarda la variable $contador ?>
            <input type="hidden" name="contador" value="<?php echo $contador; ?>">
        </form>
        <?php
            if (isset($_POST['numero'])) {
                // Aquí miro si sus 5 números mayores y menores son los que se pusieron en el form
                if (($numero - 5) == $aleatorio || ($numero - 4) == $aleatorio ||
                  ($numero - 3) == $aleatorio || ($numero - 2) == $aleatorio ||
                  ($numero - 1) == $aleatorio || ($numero + 5) == $aleatorio ||
                  ($numero + 4) == $aleatorio || ($numero + 3) == $aleatorio ||
                  ($numero + 2) == $aleatorio || ($numero + 1) == $aleatorio) {
                    $mensaje = "Caliente";
                } else {
                    $mensaje = "Frío";
                }
                ?> <p><?php echo $mensaje ?></p> <?php
            }
        } else { ?>
          <p>¡Haz ganado en <?php echo $contador; ?> intentos!"</p>
          <p>El número es <?php echo $aleatorio; ?></p>

          <a href="ejercicio-10.php">Volver a jugar</a>
        <?php } ?>
  </body>
</html>
