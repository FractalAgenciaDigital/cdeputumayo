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
                    <strong>Usuarios</strong> 
				</div>
				<div class="card-body">
					<button type="button" class="btn btn-ghost-primary active" name="nuevo" id="nuevo" data-toggle="modal" data-target="#exampleModal" onClick="limpiar()">
						Nuevo
					</button><br><br>
					<table class="table table-responsive-sm table-bordered table-striped table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Usuario</th>								
								<th>Cargo</th>
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
					<h5 class="modal-title" >Datos Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form-horizontal" action="" name="FORMA" method="post" onSubmit="return validar()">
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="nombre">Nombre*</label>
						<div class="col-md-10">
							<input class="form-control " id="nombre" type="text" name="nombre" required>									
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="usuario">Usuario*</label>
						<div class="col-md-4">
							<input class="form-control " id="usuario" type="text" name="usuario" required>									
						</div>
						<label class="col-md-2 col-form-label" for="usuario">Cargo</label>
						<div class="col-md-4">
							<input class="form-control " id="cargo" type="text" name="cargo">									
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="correo">Correo</label>
						<div class="col-md-4">
							<input class="form-control " id="correo" type="email" name="correo" >									
						</div>
						<label class="col-md-2 col-form-label" for="celular">Celular</label>
						<div class="col-md-4">
							<input class="form-control " id="celular" type="text" name="celular" >									
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label" for="clave">Clave</label>
						<div class="col-md-4">
							<input class="form-control " id="clave" type="password" name="clave" >	
							 <div class="invalid-feedback">
								Please choose a username.
							</div>							
						</div>
						
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
			$.post( "usuarios_ajax.php", { listar_usus: "1", parametro: parametro})
			.done(function( data ) {
				$("#cuerpo").html(data);
			});
		}
		function crear(){
			var nombre = $("#nombre").val();
			var usuario = $("#usuario").val();
			var clave = $("#clave").val();
			var correo = $("#correo").val();
			var celular = $("#celular").val();
			var cargo = $("#cargo").val();
			var estado = $("#estado").val();
			
			//SACAFADFASDFASDFASFASDFASDF
			$.post( "usuarios_ajax.php", { crear: "1", nombre: nombre, usuario: usuario, clave: clave, correo: correo, celular: celular, cargo: cargo, estado: estado})
			.done(function( data ) {				
				listar();
			});
			return false;
		}
		
		function validar(){
			
			if($("#clave").val()==""&&$("#editando").val()=="0"){
				alert("debe digitar la clave del usuario!!!");
				return false;
			}
			else{
				if($("#editando").val()=="0"){
					crear();
					
				}
				else{
					//console.log("llega 3 "+$("#editando").val()); return false;
					editar($("#editando").val());
				}
				
			}
			//$("#editando").val("0");
			$("#exampleModal").modal("hide");
			return false;
		}
		
		function editar(id_usu){
			
			var nombre = $("#nombre").val();
			var usuario = $("#usuario").val();
			var clave = $("#clave").val();
			var correo = $("#correo").val();
			var celular = $("#celular").val();			
			var cargo = $("#cargo").val();
			var estado = document.FORMA.estado.value;
			//console.log("llega 3 "+$("#editando").val()); return false;
			
			$.post( "usuarios_ajax.php", { editar: id_usu, nombre: nombre, usuario: usuario, clave: clave, correo: correo, celular: celular, cargo: cargo, estado: estado})
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
			$.post( "usuarios_ajax.php", { cargar_editar: id_usu})
			.done(function( data ) {				
				res =  JSON.parse(data) ;
				//console.log(resultado);
				$("#nombre").val(res.nombre);
				$("#usuario").val(res.usuario);
				$("#clave").val("");
				$("#correo").val(res.correo);
				$("#celular").val(res.celular);
				$("#cargo").val(res.cargo);
				
				document.FORMA.estado.value = res.estado;
				
			});
		}
		
		function limpiar(){
			$("#nombre").val("");
			$("#usuario").val("");
			$("#clave").val("");
			$("#correo").val("");
			$("#celular").val("");
			$("#cargo").val("");
			$("#editando").val("0");
		}
		
		function eliminar(id_usu){
			if(confirm("Esta seguro de eliminar este usuario?"))
			{
				$.post( "usuarios_ajax.php", { eliminar: id_usu})
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
		