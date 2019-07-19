<html>
    <head>
        <?php include ('../includes/head.php'); ?>
        <title>Mis facturas</title>
    </head>
    <body>
        <?php
        @session_start();
        
        require ('../controlador/facturaControlador.php');

//        if (isset($_SESSION)) {
        ?>

        <div class="container-fluid">
            <?php include ('../includes/navbar.php'); ?>
            
            <h1 class="ml-2">Mis facturas <a href="misFacturas.php" target="_blank" class="btn btn-danger">PDF</a></h1>
            
            
          
            
            <table class="table table-striped display mt-3" id="tabla" style="width:100%;">
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
                    <?php foreach ($misFacturas as $f) { ?>
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
