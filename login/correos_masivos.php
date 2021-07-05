<?php
		include "cabecera.php";
		
	if (isset($_POST["nuevo"])) {
		
	}	
	
?>
<script>
	function ruta() {
		var tb = document.getElementById("txtBuscar").value;
		var prog = document.getElementById("proyectos").value;
		var cft = document.getElementById("contenidoFormControlTextarea1").value;
		var proyecto = "info_d.php?tipoDoc="+td+"&txtBuscar="+tb+"&contenidoFormControlTextarea1="+cft+"&proyecto="+prog;
		
		window.open(proyecto, "_blank"); 
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<strong>Correos masivos</strong> 
			</div>
			<div class="card-body">
			<style>
				.form-control {
					background-color: #e6e6e6 !important;
					color: #1c1c1d;
				}
			</style>
			<div class="card-body">
				<form name="FORMA">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Programa</label>
						<div class="col-md-4">
							<select id="proyectos" name="proyectos" class="form-control">
							</select>
						</div>
						<label class="col-md-2 col-form-label">Asunto</label>
						<div class="col-md-4">
							<input id="txtBuscar" name="txtBuscar" type="text" class="form-control">
						</div>
						</div>
						<div class="form-group row">
						<div class="col-md-12">
							<label for="contenidoFormControlTextarea1" class="form-label">Contenido</label>
							<textarea  id="contenidoFormControlTextarea1" name="contenidoFormControlTextarea1" rows="3" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-md-1">
						<button type="button" class="btn btn-ghost-primary active" name="nuevo" onClick="listar()" >
						Buscar
						</button>
					</div>
				</form>
				<tbody id="cuerpo">
    							
    			</tbody>
		    </div>
		</div>
	</div>
</div>
<?php
		include "pie.php";
?>
<script>
    function listar()
    {
		let cuerpo = {
		    enviar : '1', 
		    proyecto: $('#proyectos').val(),
		    txtBuscar: $('#txtBuscar').val(),
			contenidoFormControlTextarea1: $('#contenidoFormControlTextarea1').val()
			
		};

	
        $.post('correos_masivos_ajax.php', cuerpo).done(function ( resp ) {
            $('#cuerpo').html(resp);
        });
    }
    function listar_proyects()
    {
		let cuerpo = {
		    listar : '1', 
		    proyecto: $('#proyectos').val(),
		    txtBuscar: $('#txtBuscar').val(),
			contenidoFormControlTextarea1: $('#contenidoFormControlTextarea1').val()
		};
		
		$.post('proyectos_ajax.php', cuerpo).done(function ( resp ) {
            $('#proyectos').html(resp);
        });
		
    }
    
    $( document ).ready(function () {
       // listar();
        listar_proyects();
    });
</script>
	