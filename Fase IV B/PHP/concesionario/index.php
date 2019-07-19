<?php
session_start();
if (!isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include './includes/head.php'; ?>
        <title>Inicio</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Concesionario</h1>
            <h2 class="text-center">Iniciar sesión</h2>
            <form action="acciones/login.php" method="post">
                <div class="form-group">
                    <label for="correo-electronico">Correo electrónico <span class="requerido">*</span></label>
                    <input class="form-control" type="email" name="correo-electronico" id="correo-electronico" placeholder="Ingresa tu correo electrónico" required autofocus>
                </div>
                <div class="form-group">
                    <label for="clave">Clave <span class="requerido">*</span></label>
                    <input class="form-control" type="password" name="clave" id="clave" placeholder="Ingresa tu clave" required>
                </div>
                <div class="form-group">
                    <small class="requerido">* Campos requeridos</small>
                </div>
                <div class="form-group">
                    <input type="submit" value="Iniciar sesión" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
        <?php include './includes/scripts.php'; ?>
    </body>
</html>
<?php } else { echo "<script>window.history.back()</script>"; } ?>