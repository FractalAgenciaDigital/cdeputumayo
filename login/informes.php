<?php
include "cabecera.php";
$ND = getDate();
$C1 = "";
if ($ND['mon'] < 10) $C1 = "0";
$C2 = "";
if ($ND['mday'] < 10) $C2 = "0";
$fechaHasta = $ND['year'] . "-" . $C1 . $ND['mon'] . "-" . $C2 . $ND['mday'];
$fechaDesde = $ND['year'] . "-" . $C1 . $ND['mon'] . "-01";
?>

<script>
	function ruta() {
		document.getElementById("btn_export").href = "informe.php?tipoDoc=" + document.FORMA.tipoDoc.value + "&txtBuscar=" + document.FORMA.txtBuscar.value + "&fechaDesde=" + document.FORMA.fechaDesde.value + "&fechaHasta=" + document.FORMA.fechaHasta.value;
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between">
					<div class="align-self-center">
						<strong>Informes</strong>
					</div>


					<a class="btn btn-success" target="_blank" role="button" href="#" id="btn_export" onclick="ruta();">Exportar</a>
					<div class="col-1"></div>
				</div>
			</div>
			<div class="card-body">
				<form name="FORMA">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Tipo documento</label>
						<div class="col-md-3">
							<select id="tipoDoc" name="tipoDoc" class="form-control">
								<option value="">Seleccione</option>
								<option value="1">CÉDULA DE CIUDADANIA</option>
								<option value="2">NIT</option>
								<option value="3">OTROS</option>
							</select>
						</div>
						<label class="col-md-2 col-form-label">Tercero o Raz&oacute;n social</label>
						<div class="col-md-3">
							<input id="txtBuscar" name="txtBuscar" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Desde</label>
						<div class="col-md-3">
							<input id="fechaDesde" name="fechaDesde" type="date" class="form-control" value="<?= $fechaDesde ?>">
						</div>
						<label class="col-md-2 col-form-label">Hasta</label>
						<div class="col-md-3">
							<input id="fechaHasta" name="fechaHasta" type="date" class="form-control" value="<?= $fechaHasta ?>">
						</div>
						<div class="col-md-1">
							<button type="button" class="btn btn-ghost-primary active" name="nuevo" onClick="listar()">
								Buscar
							</button>
						</div>
					</div>
				</form>
				<table class="table table-responsive table-bordered table-striped table-sm" style="font-size: 12px;">
					<thead>
						<tr>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Tipo documento</th>
							<th class="text-center align-middle">Doc. persona</th>
							<th class="text-center align-middle">Nombres completos</th>
							<th class="text-center align-middle">Email</th>
							<th class="text-center align-middle">Act. econ&oacute;mica</th>
							<th class="text-center align-middle">Ciudad</th>
							<th class="text-center align-middle">Correos</th>
							<th class="text-center align-middle">Tel&eacute;fonos</th>
							<th class="text-center align-middle">CTDE</th>
							<th class="text-center align-middle">Desarrollo prod.</th>
							<th class="text-center align-middle">Form. empresarial</th>
							<th class="text-center align-middle">Fort. empresarial</th>
							<th class="text-center align-middle">Fecha solicitud</th>
							<th class="text-center align-middle">Solicitud</th>
						</tr>
					</thead>
					<tbody id="cuerpo">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<?php
include "pie.php";
?>
<script>
	$(document).ready(function() {
		listar();
	});

	function listar() {
		let cuerpo = {
			listar: '1',
			tipoDoc: $('#tipoDoc').val(),
			txtBuscar: $('#txtBuscar').val(),
			fechaDesde: $("#fechaDesde").val(),
			fechaHasta: $("#fechaHasta").val()
		};
		$.post('informes_ajax.php', cuerpo).done(function(resp) {
			$('#cuerpo').html(resp);
		});
	}
</script>