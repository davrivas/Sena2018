<?php
session_start();
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/head.php'; ?>
        <title>Clientes</title>
    </head>
    <body>
        <?php
        require '../acciones/Conexion.php';
        
        $conexion = getConexion();
        $sqlClientes = "SELECT * FROM tbl_clientes";
        $clientes = $conexion->query($sqlClientes);
        ?>
        <div class="container">
            <?php include '../includes/navbar.php'; ?>
            
            <h1>Clientes</h1>

            <div class="row">
                <button class="btn btn-primary" data-target="#ingresar" data-toggle="modal">
                    <span class="fa fa-plus"></span> Nuevo cliente
                </button>
            </div>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cl) { ?>
                        <tr>
                            <td><?php echo $cl['id_cliente'] ?></td>
                            <td><?php echo $cl['nombre_cliente'] ?></td>
                            <td><?php echo $cl['telefono_cliente'] ?></td>
                            <td><?php echo $cl['direccion_cliente'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../acciones/nuevo-cliente.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre <span class="requerido">*</span></label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa el nombre del cliente" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono <span class="requerido">*</span></label>
                                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingresa el teléfono del cliente" max="99999999999" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección <span class="requerido">*</span></label>
                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa la dirección del cliente" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <small class="requerido">* Campos requeridos</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Nuevo cliente" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php include '../includes/cerrar-sesion.php'; ?>
        <?php include '../includes/scripts.php'; ?>
    </body>
</html>
<?php } else { header('Location: ../index.php'); } ?>