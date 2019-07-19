<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar ventas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Ventas</h1>

        <div class="row mb-3">
        <a href="index.php" class="btn btn-primary">
            Volver a inicio <span class="fa fa-home"></span>
        </a>
            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#ingresar">
            Ingresar venta <span class="fa fa-plus"></span>
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
            $sqlVentas = "SELECT v.*, cn.*, cl.*, p.* FROM tbl_ventas v, tbl_proyectos p, tbl_clientes cl, tbl_consultores cn WHERE (p.id_proyecto = v.id_proyecto) AND (cl.id_cliente = v.id_cliente) AND (cn.id_consultor = v.id_consultor)";
            $sqlConsultores = "SELECT * FROM tbl_consultores";
            $sqlClientes = "SELECT * FROM tbl_clientes";
            $sqlProyectos = "SELECT * FROM tbl_proyectos";

            // Asignar a una variable el resultado de la consulta
            // Ventas
            $resultadoVn = $objConexion->query($sqlVentas);
            $cantidadVn = $resultadoVn->num_rows;
            // Consultores
            $resultadoCn = $objConexion->query($sqlConsultores);
            $cantidadCn = $resultadoCn->num_rows;
            // Clientes
            $resultadoCl = $objConexion->query($sqlClientes);
            $cantidadCl = $resultadoCl->num_rows;
            // Proyectos
            $resultadoPr = $objConexion->query($sqlProyectos);
            $cantidadPr = $resultadoPr->num_rows;
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre del cliente</th>
                    <th>Nombre del consultor</th>
                    <th>Nombre del proyecto</th>
                    <th>Descripción del proyecto</th>
                    <th>Costo del proyecto</th>
                    <th>Costo asociado</th>
                    <th>Costo total</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha final</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Los iremos mostrando
                    for ($i = 0; $i < $cantidadVn; $i++) {
                        $registroVn = $resultadoVn->fetch_object();
                        $total = $registroVn->precio + $registroVn->costo_asociado;
                ?>
                    <tr>
                        <td><?php echo $registroVn->nombre_empresa ?></td>
                        <td><?php echo $registroVn->nombre_consultor . " " . $registroVn->apellido_consultor ?></td>
                        <td><?php echo $registroVn->nombre_proyecto ?></td>
                        <td><?php echo $registroVn->descripcion ?></td>
                        <td><?php echo "$" . $registroVn->precio ?></td>
                        <td><?php echo "$" . $registroVn->costo_asociado ?></td>
                        <td><?php echo "$" . $total ?></td>
                        <td><?php echo $registroVn->fecha_inicio ?></td>
                        <td><?php echo $registroVn->fecha_fin ?></td>
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
            <form action="ingresar-venta.php" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="ingresarLabel">Ingresar venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="cliente">Nombre del cliente <span style="color:#f00">*</span></label>
                    <select name="cliente" id="cliente" class="form-control" required>
                        <option selected value>Seleccione</option>
                        <?php
                            for ($i = 0; $i < $cantidadCl; $i++) {
                                $registroCl = $resultadoCl->fetch_object();
                        ?>
                        <option value="<?php echo $registroCl->id_cliente ?>"><?php echo $registroCl->cif . " - " . $registroCl->nombre_empresa ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="proyecto">Nombre del proyecto <span style="color:#f00">*</span></label>
                    <select name="proyecto" id="proyecto" class="form-control" required>
                        <option selected value>Seleccione</option>
                        <?php
                            for ($i = 0; $i < $cantidadPr; $i++) {
                                $registroPr = $resultadoPr->fetch_object();
                        ?>
                        <option value="<?php echo $registroPr->id_proyecto ?>"><?php echo $registroPr->nombre_proyecto ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="consultor">Nombre del consultor <span style="color:#f00">*</span></label>
                    <select name="consultor" id="consultor" class="form-control" required>
                        <option selected value>Seleccione</option>
                        <?php
                            for ($i = 0; $i < $cantidadCn; $i++) {
                                $registroCn = $resultadoCn->fetch_object();
                        ?>
                        <option value="<?php echo $registroCn->id_consultor ?>"><?php echo $registroCn->nombre_consultor . " " . $registroCn->apellido_consultor ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="costo">Costo asociado <span style="color:#f00">*</span></label>
                    <input type="number" min="0" name="costo" id="costo" class="form-control" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de inicio <span style="color:#f00">*</span></label>
                        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaFinal">Fecha final <span style="color:#f00">*</span></label>
                        <input type="date" name="fechaFinal" id="fechaFinal" class="form-control" required>
                    </div>
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