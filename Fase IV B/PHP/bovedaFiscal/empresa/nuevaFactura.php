<html>
    <head>
        <?php include ('../includes/head.php'); ?>
        <title>Nueva factura</title>
    </head>
    <body>
        <?php
        @session_start();

//        $tipoUsuario = $_SESSION['idEm'];
//
//        if (isset($_SESSION['idEmpresa'])) {
        ?>

        <div class="container-fluid">
            <?php include ('../includes/navbar.php'); ?>

            <h1>Nueva factura</h1>

            <?php
            require_once('../controlador/receptorControlador.php');
            require_once('../controlador/tipoFacturaControlador.php');
            ?>
            <form action="../controlador/empresa/nuevaFactura.php" method='post'>
                <div class="row">
                    <div class='col'>
                        <div class="form-group">
                            <label for="nombreProducto">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto"  placeholder="Ingresa el nombre del producto" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingresa la cantidad" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class='col'>
                        <div class="form-group">
                            <label for="valorUnitario">Valor Unitario</label>
                            <input type="number" class="form-control" id="valorUnitario" name="valorUnitario"  placeholder="Ingresa el valor del producto" required="">
                        </div>
                    </div>
                    <div class='col'>
                        <div class="form-group">
                            <label for="fechaEmision">Fecha Emision</label>
                            <input type="date" class="form-control" id="fechaEmision" name="fechaEmision"  required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fechaPago">Fecha Pago</label>
                            <input type="date" class="form-control" id="fechaPago" name="fechaPago" required="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="tipoFactura">Tipo Factura</label>
                            <select class="custom-select" id="tipoFactura" name="tipoFactura">
                                <option selected value="">Seleccionar tipo de factura</option>
                                <?php foreach ($tiposFactura as $tf) { ?>
                                    <option value="<?php echo $tf['idTipoFactura'] ?>"><?php echo $tf['tipoFactura'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="receptor">ID Receptor</label>
                            <select class="custom-select" id="receptor" name="receptor">
                                <option selected value="">Seleccionar receptor</option>
                                <?php foreach ($receptores as $r) { ?>
                                    <option value="<?php echo $r['idReceptor'] ?>"><?php echo $r['receptorNit'] . " " . $r['receptorRazonSocial'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-block">Registrar</button>

            </form>
        </div>
        <?php include '../includes/cerrarSesion.php';?>

        <?php
//         } else {
//            header("Location: ../index.php");
//        }
        ?>

        <?php include ('../includes/scripts.php'); ?>       
    </body>
</html>
