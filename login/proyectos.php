<?php
		include "cabecera.php";
		
		
?><!--
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
                    <strong>Usuarios</strong> </div>
					<div class="card-body">
						<form class="form-horizontal" action="" name="forma2" method="post">
							<div class="form-group row">
								<label class="col-md-1 col-form-label" for="hf-email">Buscar</label>
								<div class="col-md-5">
									<input class="form-control" id="text_buscar" type="text" name="text_buscar" >
									
								</div>
								<div class="col-md-1">
									<button type="button" class="btn btn-ghost-primary active" name="buscar" id="buscar"
									onClick="listar()">
										<i class="cui-magnifying-glass"></i>
									</button>
								</div>
								<div class="col-md-1">
									<button type="button" class="btn btn-ghost-success active" name="nuevo" id="nuevo" data-toggle="modal" data-target="#exampleModal" onClick="limpiar()">
										Nuevo
									</button>
								</div>
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
                    <strong>Programas</strong> 
				</div>
				<div class="card-body">
					<button type="button" class="btn btn-ghost-primary active" name="nuevo" id="nuevo" data-toggle="modal" data-target="#exampleModal" onClick="limpiar()">
						Nuevo
					</button><br><br>
					<table class="table table-responsive-sm table-bordered table-striped table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Programa</th>
								<th>Estado</th>								
								
								<th>-</th>
							</tr>
						</thead>
						<tbody id="cuerpo">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-primary modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Datos Programa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form-horizontal" action="" name="FORMA" method="post" onSubmit="return validar()">
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="nombre">Nombre Programa*</label>
						<div class="col-md-10">
							<input class="form-control " id="proyecto" type="text" name="proyecto" required>									
						</div>
					</div>
					
					<div class="form-group row">
						
						
						<label class="col-md-2 col-form-label" for="estado">Estado</label>
						<div class="col-md-4">
							<select class="form-control" name="estado" id="estado">
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
							</select>							
						</div>
					</div>				
				</div>
				<div class="modal-footer">
					
					<button type="submit" name="agregar_usu" id="agregar_usu" class="btn btn-success">Enviar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<input type="hidden" name="editando" id="editando"  value="0">

<?php
		include "pie.php";
?>
	<script>
		$( document ).ready(function() {
			
			listar();
		});
		
		function listar(parametro){		
			if($("#text_buscar").val()!=""){
					parametro = $("#text_buscar").val();
			}
			$.post( "proyectos_ajax.php", { lista_proyectos: "1", parametro: parametro})
			.done(function( data ) {
				$("#cuerpo").html(data);
			});
		}
		function crear(){
			var proyecto = $("#proyecto").val();
			
			var estado = $("#estado").val();
			
			//SACAFADFASDFASDFASFASDFASDF
			$.post( "proyectos_ajax.php", { crear: "1", programa: proyecto, estado: estado})
			.done(function( data ) {				
				listar();
			});
			return false;
		}
		
		function validar(){
			
			
				if($("#editando").val()=="0"){
					crear();
					
				}
				else{
					//console.log("llega 3 "+$("#editando").val()); return false;
					editar($("#editando").val());
				}
				
		
			//$("#editando").val("0");
			$("#exampleModal").modal("hide");
			return false;
		}
		
		function editar(id_usu){
			
			var proyecto = $("#proyecto").val();
		
			var estado = document.FORMA.estado.value;
			//console.log("llega 3 "+$("#editando").val()); return false;
			
			$.post( "proyectos_ajax.php", { editar: id_usu, programa: proyecto,  estado: estado})
			.done(function( data ) {				
				listar();				
			});
			$("#editando").val("0");			
			$("#exampleModal").modal("hide");
			return false;
		}
		
		function cargar_editar(id_usu){
			//console.log("id_usu="+id_usu);
			$("#editando").val(id_usu);
			$.post( "proyectos_ajax.php", { cargar_editar: id_usu})
			.done(function( data ) {				
				res =  JSON.parse(data) ;
				//console.log(resultado);
				$("#proyecto").val(res.programa);
			
			
				document.FORMA.estado.value = res.estado;
				
			});
		}
		
		function limpiar(){
			$("#nombre").val("");
		
			$("#editando").val("0");
		}
		
		function eliminar(id_usu){
			if(confirm("Esta seguro de inactivar este proyecto?"))
			{
				$.post( "proyectos_ajax.php", { eliminar: id_usu})
				.done(function( data ) {				
					listar();				
				});
			}
		}
		
		$('#exampleModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('whatever') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			//modal.find('.modal-title').text('New message to ' + recipient)
			//modal.find('.modal-body input').val(recipient)
		});
	</script>
		