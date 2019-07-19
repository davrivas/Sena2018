<!DOCTYPE html>
<html lang="es-CO">
    <head>
        <?php include('includes/head.php'); ?>
        <title>Registrase</title>
    </head>
    <style>
        label{
            color: #fff;
        }        
    </style>
    <body style="background-image: url(recursos/img/fondo.jpg); background-size: 100%;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-4 mb-4" style="background-color: rgba(0,0,0,.4); border-radius: 5px;">
                    <h1 class="text-center" style="color: #fff;">Boveda fiscal</h1>

                    <h2 class="text-center" style="color: #fff;">Registrate</h2>

                    <form action="controlador/sesion/registrar.php" method='post'>
                        <div class="row">
                            <div class='col'>
                                <div class="form-group">
                                    <label for="nit">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit"  placeholder="Ingresa el nit de tu empresa" required="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="rs">Razón Social</label>
                                    <input type="text" class="form-control" id="rs" name="rs" placeholder="Ingresa tu razón social" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col'>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Ingresa la dirección de tu empresa" required="">
                                </div>
                            </div>
                            <div class='col'>
                                <div class="form-group">
                                    <label for="telefono">Número Telefónico</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Número telefónico" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="password" class="form-control" id="clave" name="clave"  placeholder="Ingresa tu contraseña" required="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="ccontraseña">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="cclave" name="cclave"  placeholder="Confirma tu contraseña" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo"  placeholder="Ingresa tu correo" required="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="web">Sitio web (opcional)</label>
                                    <input type="url" class="form-control" id="web" name="web"  placeholder="Ingresa tu sitio web">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="rl">Nombre del representante legal</label>
                                    <input type="text" class="form-control" id="rl" name="rl"  placeholder="Ingresa el nombre del representante legal">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        
                        <p class="text-center mt-3"><a href="index.php" style="text-decoration: none; color: #fff;">Iniciar Sesión</a></p>

                    </form>
                </div>
            </div>

        </div>
        
      


        <?php include('includes/scripts.php'); ?>
    </body>
</html>
