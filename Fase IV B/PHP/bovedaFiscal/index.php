<!DOCTYPE html>
<html lang="es-CO">
    <head>
        <?php include('includes/head.php'); ?>
        <title>Inicio de sesión</title>
    </head>    
    <body style="background-image:url(recursos/img/fondo.jpg); background-size: 100% ;">
        <div class="container " >
            <div class='row d-flex justify-content-center '>
                <div class="col-md-6 mt-4" style="background-color: rgba(0,0,0,.4); border-radius: 5px;">
                    <h1 class="text-center mt-3" style="color: #fff;">Boveda fiscal</h1>

                    <h2 class="text-center" style="color: #fff">Inicio de sesión</h2>

                    <form  action="controlador/sesion/login.php" method="post">
                        <div class="form-group">
                            <label for="correo" style="color: #fff;">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo"  placeholder="Ingresa tu correo" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="contraseña" style="color: #fff;">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="clave" placeholder="Ingresa tu contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </form>

                    <p class="text-center mt-3"><a href="registro.php" style="text-decoration: none; color: #fff;">Registrarse</a></p>

                </div>
            </div>
        </div>

        <?php include('includes/scripts.php'); ?>
    </body>
</html>
