<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar clientes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Clientes</h1>

        <div class="row mb-3">
            <a href="index.php" class="btn btn-primary">
                Volver a inicio <span class="fa fa-home"></span>
            </a>
        
            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#ingresar">
            Ingresar cliente <span class="fa fa-plus"></span>
        </button>
        </div>

        


        <?php
            // Importo el archivo necesario para hacer la consulta
            require "conexion.php";

            $objConexion = new mysqli($host,$user,$password,$baseDatos);

            if ($objConexion->connect_errno) {
                echo "Error de conexión a la Base de Datos " . $objConexion->connect_errno;
                exit();
            }


            // Consultar todos los pacientes
            $sql = "SELECT * FROM tbl_clientes";
            // Asignar a una variable el resultado de la consulta
            $resultado = $objConexion->query($sql);
            $cantidad = $resultado->num_rows;
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre de la empresa</th>
                    <th>Dirección</th>
                    <th>CIF</th>
                    <th>Teléfonos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Los iremos mostrando
                    for ($i = 0; $i < $cantidad; $i++) {
                        $registro = $resultado->fetch_object();
                ?>
                    <tr>
                        <td><?php echo $registro->nombre_empresa ?></td>
                        <td><?php echo $registro->direccion ?></td>
                        <td><?php echo $registro->cif ?></td>
                        <td><?php echo $registro->telefonos ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresarModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="ingresar-cliente.php" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="ingresarLabel">Ingresar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="nombreEmpresa">Nombre de la empresa <span style="color:#f00">*</span></label>
                    <input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección <span style="color:#f00">*</span></label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cif">CIF <span style="color:#f00">*</span></label>
                    <input type="text" name="cif" id="cif" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefonos">Telefonos</label>
                    <input type="text" name="telefonos" id="telefonos" class="form-control">
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </div>
        </form>
            </div>
        </div>
    </div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>