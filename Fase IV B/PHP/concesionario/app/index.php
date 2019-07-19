<?php
session_start();
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../includes/head.php'; ?>
        <title>Ventas</title>
    </head>
    <body>
        <?php
        require '../acciones/Conexion.php';
        $conexion = getConexion();
        $sqlVentas = "SELECT vn.*, cl.*, cn.*, vh.* FROM tbl_concesionarios AS cn "
                . "INNER JOIN tbl_vehiculos AS vh ON vh.codigo_concesionario = cn.nit_concesionario "
                . "INNER JOIN tbl_ventas AS vn ON vn.id_vehiculo = vh.codigo_vehiculo "
                . "INNER JOIN tbl_clientes AS cl ON cl.id_cliente = vn.id_cliente";
        $ventas = $conexion->query($sqlVentas);
        $sqlClientes = "SELECT * FROM tbl_clientes";
        $clientes = $conexion->query($sqlClientes);
        $sqlConcesionarios = "SELECT * FROM tbl_concesionarios";
        $concesionarios = $conexion->query($sqlConcesionarios);
        $sqlVehiculos = "SELECT * FROM tbl_vehiculos";
        $vehiculos = $conexion->query($sqlVehiculos);
        ?>
        <div class="container">
            <?php include '../includes/navbar.php'; ?>

            <div class="row">
                <button class="btn btn-primary mr-1" data-target="#ingresar" data-toggle="modal">
                    <span class="fa fa-plus"></span> Nueva venta
                </button>
                <a class="btn btn-danger ml-1" href="reporte-ventas.php" target="_blank">
                    <span class="fa fa-file-pdf"></span> PDF
                </a>
            </div>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Vehículo</th>
                        <th>Concesionario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $v) { ?>
                        <tr>
                            <td><?php echo $v['id_venta'] ?></td>
                            <td><?php echo $v['fecha_venta'] ?></td>
                            <td>
                                <strong>Nombre:</strong> <?php echo $v['nombre_cliente']?><br>
                                <strong>Teléfono:</strong> <?php echo $v['telefono_cliente'] ?><br>
                                <strong>Dirección:</strong> <?php echo $v['direccion_cliente'] ?><br>
                            </td>
                            <td>
                                <strong>Marca:</strong> <?php echo $v['marca_vehiculo'] ?><br>
                                <strong>Modelo:</strong> <?php echo $v['modelo_vehiculo'] ?><br>
                                <strong>Precio:</strong> $<?php echo $v['precio_vehiculo'] ?><br>
                            </td>
                            <td>
                                <strong>Nombre:</strong> <?php echo $v['nombre_concesionario']?><br>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva venta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../acciones/nueva-venta.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="fecha">Fecha <span class="requerido">*</span></label>
                                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa la fecha de la venta" min="<?php echo date('Y-m-d') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="vehiculo">Vehículo <span class="requerido">*</span></label>
                                <select class="form-control" name="vehiculo" id="vehiculo" required>
                                    <option value>Seleccione vehículo</option>
                                    <?php foreach ($vehiculos as $v) { ?>
                                        <option value="<?php echo $v['codigo_vehiculo'] ?>">
                                            <?php echo $v['marca_vehiculo'] . " modelo " . $v['modelo_vehiculo'] . " ($" . $v['precio_vehiculo'] . ")" ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cliente">Cliente <span class="requerido">*</span></label>
                                <select class="form-control" name="cliente" id="cliente" required>
                                    <option value>Seleccione cliente</option>
                                    <?php foreach ($clientes as $c) { ?>
                                        <option value="<?php echo $c['id_cliente'] ?>">
                                            <?php echo $c['nombre_cliente'] ?>
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
                            <input type="submit" value="Nueva venta" class="btn btn-primary">
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