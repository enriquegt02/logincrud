
<?php
session_start();

if(isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Control de gastos</title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
    <?php require_once "nav.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tablas dinamicas con datatble y php
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos gasto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Concepto de gasto</label>
						<input type="text" class="form-control input-sm" id="gasto" name="gasto">
						<label>cantidad</label>
						<input type="number" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>fecha</label>
						<input type="date" class="form-control input-sm" id="fecha" name="fecha">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar gasto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="id" name="id">
						<label>Concepto de gasto</label>
						<input type="text" class="form-control input-sm" id="gastoU" name="gastoU">
						<label>Cantidad</label>
						<input type="number" class="form-control input-sm" id="cantidadU" name="cantidadU">
						<label>Fecha</label>
						<input type="date" class="form-control input-sm" id="fechaU" name="fechaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
 

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/crud/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito ");
					}else{
						alertify.error("Fallo al agregar ");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/crud/actualizar.php",
				success:function(r){
					if(r){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Fallo al actualizar ");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idjuego){
		$.ajax({
			type:"POST",
			data:"id=" + idjuego,
			url:"../procesos/crud/obtenerDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#id').val(datos['id']);
				$('#gastoU').val(datos['concepto_gasto']);
				$('#cantidadU').val(datos['cantidad']);
				$('#fechaU').val(datos['fecha']);
			}
		});
	}

	function eliminarDatos(idjuego){
		alertify.confirm('Eliminar un juego', '¿Seguro de eliminar gasto?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + idjuego,
				url:"../procesos/crud/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>
<?php
}else{
   header('location:../index.php');
}
?>
