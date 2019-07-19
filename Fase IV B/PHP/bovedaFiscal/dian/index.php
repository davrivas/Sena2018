<html>
    <head>
        <?php include ('../includes/head.php'); ?>
        <title>Consultar facturas</title>
    </head>
    <body>
        <?php
        @session_start();

//        if (isset($_SESSION['idEmpresa'])) {
        ?>

        <div class="container">
            <?php include ('../includes/navbar.php'); ?>

            <h1>Consultar Facturas</h1>

            <?php
            if (!isset($_POST['nrs'])) {
                $nrs = "";
            } else {
                $nrs = $_POST['nrs'];
            }
            ?>

            <form action="index.php" method='post' class="mb-5">
                <div class="form-group">
                    <label for="nrs">NIT o Razón Social</label>
                    <input type="text" class="form-control" id="nrs" name="nrs"  placeholder="Ingresa nit o razón social" required="" value="<?php echo $nrs; ?>">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Consultar</button>
            </form>

            <?php
            if (isset($_POST['nrs'])) {
                require_once ('../modelo/Factura.php');
                require_once ('../modelo/Emisor.php');
                $facturaObj = new Factura();
                $facturasNRS = $facturaObj->facturaPorNitRS($nrs);
                $emisorObj = new Emisor();
                $emisor = $emisorObj->emisorNitRazonSocial($nrs);

                if (!empty($facturasNRS)) {
                    ?>

                    <h2>Facturas del emisor</h2>
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th>Razon Social</th>
                                <th>Nit</th>
                                <th>Nombre Representate</th>
                                <th>Número Telefónico</th>
                                <th>Dirección</th>
                                <th>Correo electrónico</th>
                                <th>Sitio web</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $emisor['emisorRazonSocial'] ?></td>
                                <td><?php echo $emisor['emisorNit'] ?></td>
                                <td><?php echo $emisor['emisorNombreRepresentante'] ?></td>
                                <td><?php echo $emisor['emisorNumeroTelefonico'] ?></td>
                                <td><?php echo $emisor['emisorDireccion'] ?></td>
                                <td><?php echo $emisor['emisorCorreoElectronico'] ?></td>
                                <td><?php echo $emisor['emisorSitioWeb'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped display mt-3" id="tabla" style="width:1000px;">
                        <thead>
                            <tr>
                                <th>Fecha de emisión</th>
                                <th>Nombre del producto</th>
                                <th>Cantidad</th>
                                <th>Valor unitario</th>
                                <th>Subtotal</th>
                                <th>IVA recaudado</th>
                                <th>Total a pagar</th>
                                <th>Fecha de pago</th>
                                <th>Receptor</th>
                                <th>Estado de la factura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($facturasNRS as $f) { ?>
                                <tr>
                                    <td><?php echo $f['fechaEmision'] ?></td>
                                    <td><?php echo $f['nombreProducto'] ?></td>
                                    <td><?php echo $f['cantidad'] ?></td>
                                    <td><?php echo "$" . $f['valorUnitario'] ?></td>
                                    <td><?php echo "$" . $f['total'] ?></td>
                                    <td><?php echo "$" . $f['totalIvaRecaudado'] ?></td>
                                    <td><?php echo "$" . $f['montoTotalAPagar'] ?></td>
                                    <td><?php echo $f['fechaPago'] ?></td>
                                    <td><?php echo $f['receptorNit'] . " " . $f['receptorRazonSocial'] ?></td>
                                    <td><?php echo $f['estadoFactura'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                } else {
            ?>
                    <div class="alert alert-danger" role="alert">
                        No se encontraron facturas del emisor por NIT o razón social
                    </div>
            <?php
                    
                }
            }
            ?>
        </div>

        <?php include ('../includes/cerrarSesion.php'); ?>

        <?php
//         } else {
//            header("Location: ../index.php");
//        }
        ?>

        <?php include ('../includes/scripts.php'); ?>       
    </body>
</html>
