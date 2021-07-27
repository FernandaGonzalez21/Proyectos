<!-- Delete -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="formeliminar2">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <center><h4 class="modal-title" id="myModalLabel">Borrar Cliente</h4></center>
            </div>
            <input type="hidden" name="IdCliente" id="IdCliente">
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de borrar el registro?</p>
				<h2 class="text-center">
			</div>
            <div class="modal-footer">
                <button type="button" name="cancelar" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="eliminar" class="btn btn-default" ><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
            </div>
            </form>
        </div>
    </div>
</div>