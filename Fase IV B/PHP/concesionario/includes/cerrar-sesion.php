<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar sesión?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/concesionario/acciones/logout.php" method="post">
                <div class="modal-body">
                    <p>¿Estas seguro(a) de cerrar sesión?</p>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Cerrar sesión" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
