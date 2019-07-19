<?php
session_start();
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/head.php'; ?>
        <title>Vehiculos</title>
    </head>
    <body>
        <?php
        require '../acciones/Conexion.php';
       
        $conexion = getConexion();
        $sqlVehiculos = "SELECT c.*, v.* "
                . "FROM tbl_concesionarios AS c "
                . "INNER JOIN tbl_vehiculos AS v "
                . "ON c.nit_concesionario = v.codigo_concesionario "
                . "ORDER BY v.codigo_vehiculo";
        $vehiculos = $conexion->query($sqlVehiculos);
        $sqlConcesionarios = "SELECT * FROM tbl_concesionarios";
        $concesionarios = $conexion->query($sqlConcesionarios);
        $sqlVehiculoReciente = "SELECT * FROM tbl_vehiculos "
                . "ORDER BY modelo_vehiculo DESC LIMIT 1";
        $vehiculoReciente = $conexion->query($sqlVehiculoReciente);
        $sqlVehiculoEconomico = "SELECT * FROM tbl_vehiculos "
                . "ORDER BY precio_vehiculo ASC LIMIT 1";
        $vehiculoEconomico = $conexion->query($sqlVehiculoEconomico);
        $sqlMarcaMasSolicitada = "SELECT marca_vehiculo, COUNT(*) FROM tbl_vehiculos GROUP BY marca_vehiculo "
                . "ORDER BY COUNT(*) DESC LIMIT 1";
        $marcaMasSolicitada = $conexion->query($sqlMarcaMasSolicitada);
        ?>
        <div class="container">
            <?php include '../includes/navbar.php'; ?>

            <h1>Vehículos</h1>

            <p><strong>Vehículo más reciente:</strong> <?php
                foreach ($vehiculoReciente as $v) {
                    echo $v['marca_vehiculo'] . " (" . $v['modelo_vehiculo'] . ")";
                }
                ?></p>
            <p><strong>Vehículo más económico:</strong> <?php
                foreach ($vehiculoEconomico as $v) {
                    echo $v['marca_vehiculo'] . " modelo " .  $v['modelo_vehiculo'] . " ($" . $v['precio_vehiculo'] . ")";
                }
                ?></p>
            <p><strong>Marca más solicitada:</strong> <?php
                foreach ($marcaMasSolicitada as $v) {
                    echo $v['marca_vehiculo'] . " (" . $v['COUNT(*)'] . ")";
                }
                ?></p>

            <h2>Buscar por precio ($)</h2>

            <form action="vehiculos.php" method="post" class="mb-3">
                <div class="form-inline">
                    <label class="mr-1" for="buscar-precio">Precio ($)</label>
                    <input type="number" class="form-control mr-1" name="buscar-precio" id="buscar-precio" placeholder="Precio en $" required>
                    <input type="submit" value="Buscar" class="btn btn-primary mr-1">
                    <?php if (isset($_POST['buscar-precio'])) { ?>
                        <?php
                        $buscarPrecio = $_POST['buscar-precio'];
                        $sqlVehiculoPrecio = "SELECT * FROM tbl_vehiculos WHERE precio_vehiculo > $buscarPrecio";
                        $vehiculosPrecio = $conexion->query($sqlVehiculoPrecio);
                        ?>                
                    <strong>Vehículos con un precio mayor a $<?php echo $buscarPrecio ?>:&nbsp;</strong> <?php echo $vehiculosPrecio->num_rows ?>
                    <?php } ?>
                </div>
            </form>

            <div class="row">
                <button class="btn btn-primary" data-target="#ingresar" data-toggle="modal">
                    <span class="fa fa-plus"></span> Nuevo vehículo
                </button>
                <a class="btn btn-danger ml-1" href="reporte-vehiculos.php" target="_blank">
                    <span class="fa fa-file-pdf"></span> PDF
                </a>
            </div>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Concesionario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculos as $v) { ?>
                        <tr>
                            <td><?php echo $v['codigo_vehiculo'] ?></td>
                            <td><?php echo $v['marca_vehiculo'] ?></td>
                            <td><?php echo $v['modelo_vehiculo'] ?></td>
                            <td>$<?php echo $v['precio_vehiculo'] ?></td>
                            <td>
                                <strong>Nombre:</strong> <?php echo $v['nombre_concesionario'] ?><br>
                                <strong>Teléfono:</strong> <?php echo $v['telefono_concesionario'] ?><br>
                                <strong>Dirección:</strong> <?php echo $v['direccion_concesionario'] ?><br>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo vehículo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <
                    <form action="../acciones/nuevo-vehiculo.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="marca">Marca <span class="requerido">*</span></label>
                                <input type="text" class="form-control" name="marca" id="marca" placeholder="Ingresa la marca del vehículo" maxlength="25" required>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo <span class="requerido">*</span></label>
                                <input type="number" class="form-control" name="modelo" id="modelo" placeholder="Ingresa el modelo del vehículo" max="9999" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio ($) <span class="requerido">*</span></label>
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingresa el precio del vehículo" required>
                            </div>
                            <div class="form-group">
                                <label for="concesionario">Concesionario <span class="requerido">*</span></label>
                                <select class="form-control" name="concesionario" id="concesionario" required>
                                    <option value>Seleccione concesionario</option>
                                    <?php foreach ($concesionarios as $c) { ?>
                                        <option value="<?php echo $c['nit_concesionario'] ?>">
                                            <?php echo $c['nombre_concesionario'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <small class="requerido">* Campos requeridos</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Nuevo vehículo" class="btn btn-primary">
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