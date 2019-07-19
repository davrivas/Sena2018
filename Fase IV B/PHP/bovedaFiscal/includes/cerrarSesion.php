<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar sesión?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p> <?php echo $_SESSION['emisorRazonSocial'] ?> estas seguro(a) de cerrar sesión ? </p>      
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" href='/bovedaFiscal/controlador/sesion/logout.php'>Aceptar</a>
      </div>
    </div>
  </div>
</div>
