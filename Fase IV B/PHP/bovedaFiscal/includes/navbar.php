<?php
@session_start();
require_once ('../controlador/permisosControlador.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary " style="border-radius: 5px;">
    <a class="navbar-brand" style="color:#fff;" href="#"><?php echo $_SESSION['tipoUsuario'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
            <?php foreach ($permisos as $p) { ?>
                <li class="nav-item active">
                    <a class="nav-link" style="color:#fff;" href="<?php echo $p['urlPermiso'] ?>">
                        <span class="<?php echo $p['iconoPermiso'] ?>"></span> <?php echo $p['nombrePermiso'] ?>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" style="color:#fff;" data-toggle="modal" data-target="#modal-logout"><span class="icon-log-out"></span> Cerrar Sesión (<?php echo $_SESSION['emisorRazonSocial'] ?>)</a>
            </li>
        </ul>
    </div>
</nav>