<?php
include "cabecera.php";
include '../funciones.php';

$cons3 = "SELECT * FROM programas WHERE programa like '%CISP%'  ";
$res3 = mysqli_query($conn, $cons3);
while ($fila3 = mysqli_fetch_array($res3)) {
	$cons2 = "INSERT INTO progsxdiligencias (id_diligencia,id_programa,recibe_apoyo, dinero_espcie, descrip_val) VALUES (" . $fila3['0'] . ",'" . $fila3['1'] . "','" . $fila3['2'] . "')";
	// echo "$cons2 <br>";
	$res2 = mysqli_query($conn, $cons2);
}


$cons3 = "SELECT id_programa, programa FROM programas ";
$aux_progs = array();
$res3 = mysqli_query($conn, $cons3);
while ($fila3 = mysqli_fetch_array($res3)) {
	$aux_progs[$fila3['programa']] = $fila3;
}

// $cons = "SELECT * FROM extras_usus ";
// $res = mysqli_query($conn, $cons);
// while ($fila = mysqli_fetch_array($res)) {
// 	//echo $fila['nom_progr']."siiiiii <br>";
// 	if ($fila['nom_progr'] && $aux_progs[$fila['nom_progr']]) {

// 		$cons2 = "INSERT INTO progsxdiligencias (id_diligencia,id_programa,recibe_apoyo, dinero_espcie, descrip_val) VALUES (" . $fila['id_usu'] . "," . $aux_progs[$fila['nom_progr']]['id'] . ",'" . $fila['apoyo'] . "','"
// 			. $fila['dinero_espcie'] . "','" . $fila['especie'] . "')";
// 		$res2 = mysqli_query($conn, $cons2);
// 		// echo "<br>$cons2";
// 	}
// }




//echo "acaaaa";
$cons_a = "SELECT * FROM programas   order by programa";
$res_a = mysqli_query($conn, $cons_a);
$programas2 = array();
while ($afila = mysqli_fetch_array($res_a)) {
	$programas2[$afila['id_programa']] = $afila['programa'];
}

$cons_a = "SELECT * FROM programas where estado = 1 order by programa";
$res_a = mysqli_query($conn, $cons_a);
$programas = array();
while ($afila = mysqli_fetch_array($res_a)) {
	$programas[] = $afila['programa'];
}

?>
<script>
	function ruta() {
		var td = document.getElementById("tipoDoc").value;
		var tb = document.getElementById("txtBuscar").value;
		var prog = document.getElementById("proyecto").value;
		var proyecto = "info_d.php?tipoDoc=" + td + "&txtBuscar=" + tb + "&proyecto=" + prog;

		console.log(td);
		// console.log('holi');
		window.open(proyecto, "_blank");
	}
</script>
<div class="row">
	<!-- <?php if (isset($_SESSION['message'])) { ?>
		<div class="alert alert-<? $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
			<?php $_SESSION['message'] ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php session_unset();
			} ?>limpiar datos en la sesion -->
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between">
					<div class="align-self-center">
						<strong>Diligencias</strong>
					</div>
					<button class="btn btn-success" id="exportar" onclick="ruta();">Exportar</button>
					<div class="col-1"></div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-md-auto col-form-label">Tipo documento:</label>
					<div class="col-md-2">
						<select id="tipoDoc" name="tipoDocumento" class="form-control">
							<option value="">Seleccione</option>
							<option value="1">CEDULA DE CIUDADANIA</option>
							<option value="2">NIT</option>
							<option value="3">OTROS</option>
						</select>
					</div>
					<label class="col-md-auto col-form-label">Programa:</label>
					<div class="col-md-2">
						<select id="proyecto" name="proyecto" class="form-control">

						</select>
					</div>
					<label class="col-md-auto col-form-label">Tercero o Razón social:</label>
					<div class="col-md-3">
						<input id="txtBuscar" type="text" class="form-control">
					</div>
					<div class="" style="margin-left:10px">
						<div class=" float-left" style="margin-right:10px">
							<button type="button" class="btn btn-success" name="nuevo" onclick="document.location='diligencias_new.php'">
								Nuevo
							</button>
						</div>
						<div class="float-right">
							<button type="button" class="btn btn-ghost-primary active" name="nuevo" onClick="listar()">
								Buscar
							</button>
						</div>

					</div>
				</div>
				<!--<button type="button" class="btn btn-ghost-primary active" name="nuevo" id="nuevo" data-toggle="modal" data-target="#exampleModal" onClick="limpiar()">
    						Nuevo
    					</button><br><br>-->
				<table class="table table-responsive table-bordered table-striped table-sm" style="font-size: 12px; max-height: 425px;">
					<thead>
						<tr>
							<th class="text-center align-middle">#</th>
							<th class="text-center align-middle">Tipo documento</th>
							<th class="text-center align-middle">Doc. persona</th>
							<th class="text-center align-middle">Nombres</th>
							<th class="text-center align-middle">Apellidos</th>
							<th class="text-center align-middle">Ciudad</th>
							<th class="text-center align-middle">Email</th>
							<th class="text-center align-middle">Celular</th>
							<th class="text-center align-middle">Dirección Empresa</th>
							<th class="text-center align-middle">Act. Económica</th>
							<th class="text-center align-middle">Otra Act. Económica</th>
							<th class="text-center align-middle">Des. Productivo</th>
							<th class="text-center align-middle">Principal Prod/Serv</th>
							<th class="text-center align-middle">Fortalecimiento Empresarial</th>
							<th class="text-center align-middle">Formación Empresarial</th>
							<th class="text-center align-middle">Nombre Representante</th>
							<th class="text-center align-middle">Celular Representante</th>
							<th class="text-center align-middle">Email Representante</th>
							<th class="text-center align-middle">Población</th>
							<th class="text-center align-middle">Otro Población</th>
							<th class="text-center align-middle">Fecha Matricula</th>
							<th class="text-center align-middle">Número Matricula</th>
							<th class="text-center align-middle">Registrado</th>
							<th class="text-center align-middle"># Cámara Comercio</th>
							<th class="text-center align-middle">Estado solicitudds</th>
							<th class="text-center align-middle">Fecha solicitud</th>
							<th class="text-center align-middle">Solicitud</th>
							<th class="text-center align-middle">Genero</th>
							<th class="text-center align-middle">Escolaridad</th>
							<th class="text-center align-middle">Rango de Edad</th>

							<th class="text-center align-middle">Pertenece a programa/proyecto de CCP u otras organizaciones:</th>
							<?php foreach ($programas2 as $p) { ?>
								<th class="text-center align-middle">Proyecto = <?= $p ?></th>
								<th class="text-center align-middle">Recibe apoyo1</th>
								<th class="text-center align-middle">Tipo apoyo1</th>
								<th class="text-center align-middle">Descripción / Valor1</th>
							<?php   } ?>

							<th class="text-center align-middle" colspan="2">-</th>
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
	function listar() {
		let cuerpo = {
			listar: '1',
			tipoDoc: $('#tipoDoc').val(),
			proyecto: $('#proyecto').val(),

			txtBuscar: $('#txtBuscar').val()
		};
		$("#exportar").attr('href', `info_d.php?exportar=1&tipoDoc=${cuerpo.tipoDoc}&txtBuscar=${cuerpo.txtBuscar}`);

		$.post('../diligencias_ajax.php', cuerpo).done(function(resp) {
			$('#cuerpo').html(resp);
		});
	}

	function listar_proyects() {
		let cuerpo = {
			listar: '1',
			tipoDoc: $('#tipoDoc').val(),
			proyecto: $('#proyecto').val(),

			txtBuscar: $('#txtBuscar').val()
		};

		$.post('proyectos_ajax.php', cuerpo).done(function(resp) {
			$('#proyecto').html(resp);
		});

	}

	$(document).ready(function() {
		// listar();
		listar_proyects();
	});



	function Eliminar(id) {
		let cuerpo = {
			elimin_d: '1',
			id_elim: id
		};

		if (confirm("Esta seguro de eliminar este registro?")) {
			$.post('../diligencias_ajax.php', cuerpo).done(function(resp) {
				listar();
			});
		}
	}
</script>