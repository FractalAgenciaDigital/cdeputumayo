<?php
include 'funciones.php';
header('Content-type: application/vnd.ms-excel; charset=utf8');
header("Content-Disposition: attachment; filename=diligencias.xls");
header("Pragma: no-cache");
header("Expires: 0");

print_r($_GET);


$cons_order = "SELECT * FROM programas where estado = 1 order by programa";
$res_a = mysqli_query($conn, $cons_order);
$programas = array();

while ($afila = mysqli_fetch_array($res_a)) {
	$programas[] = $afila['programa'];
}

$cons_a = "SELECT * FROM programas order by programa";
$res_a = mysqli_query($conn, $cons_a);
$programas2 = array();
$programas = array();
while ($afila = mysqli_fetch_array($res_a)) {
	$programas2[$afila['id_programa']] = $afila['programa'];
	$programas[$afila['id_programa']] = $afila;
}


$cons = 'SELECT * FROM diligencias_new';
$donde = '';

if (isset($_GET['tipoDoc']) && $_GET['tipoDoc'] != '') {
	$donde .= ' WHERE tipoDocumento = ' . $_GET['tipoDoc'];
}
if (isset($_GET['txtBuscar']) && $_GET['txtBuscar'] != '') {
	$txt = "LIKE '%" . $_GET['txtBuscar'] . "%'";
	$bloque = "nombres $txt OR apellidos $txt or documento $txt";
	$donde .= $donde ? " AND ($bloque)" : " WHERE $bloque";
}
$cons .= $donde;


$res = mysqli_query($conn, $cons);

$stmt = mysqli_query($conn, $cons);

$tbody = '';
$cont = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!---->
</head>

<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<div class="align-self-center">
							<strong>Diligencias</strong>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-responsive table-bordered table-striped table-sm" style="font-size: 12px;" border="1">
						<thead>
							<tr>
								<th class="text-center align-middle">#</th>
								<th class="text-center align-middle">Tipo documento</th>
								<th class="text-center align-middle">Doc. persona</th>
								<th class="text-center align-middle">Nombre Completo</th>
								<th class="text-center align-middle">Ciudad</th>
								<th class="text-center align-middle">Correos</th>
								<th class="text-center align-middle">Celulares</th>
								<th class="text-center align-middle">Direcc. Empresa</th>
								<th class="text-center align-middle">Actividad Económica</th>
								<th class="text-center align-middle">Des. Productivo</th>
								<th class="text-center align-middle">Fort. Empresarial</th>
								<th class="text-center align-middle">Form. Empresarial</th>
								<th class="text-center align-middle">Nombre Representante</th>
								<th class="text-center align-middle">Población</th>
								<th class="text-center align-middle">Fecha Matricula</th>
								<th class="text-center align-middle">Matricula</th>
								<th class="text-center align-middle">Registrado</th>
								<th class="text-center align-middle">Num. Cam. Comercio</th>
								<th class="text-center align-middle">Estado Solicitud</th>
								<th class="text-center align-middle">Fecha Solicitud</th>
								<th class="text-center align-middle">Solicitud</th>
								<th class="text-center align-middle">Genero</th>
								<th class="text-center align-middle">Escolaridad</th>
								<th class="text-center align-middle">Rango EDAD</th>

								<th class="text-center align-middle">Proyecto CPP u otros</th>
								<?php foreach ($programas2 as $programa) { ?>
									<th class="text-center align-middle">Proyecto = <?= $programa ?></th>
									<th class="text-center align-middle">Recibe apoyo</th>
									<th class="text-center align-middle">Tipo apoyo</th>
									<th class="text-center align-middle">Descripción / Valor</th>
								<?php   } ?>
							</tr>
						</thead>
						<tbody id="cuerpo">
							<?php
							$sectores["1"] = "Sector agropecuario";
							$sectores["2"] = "Sector de servicios";
							$sectores["3"] = "Sector industrial";
							$sectores["4"] = "Sector de transporte";
							$sectores["5"] = "Sector de comercio";
							$sectores["6"] = "Sector financiero";
							$sectores["7"] = "Sector de la construcción";
							$sectores["8"] = "Sector minero y energético";
							$sectores["9"] = "Sector solidario";
							$sectores["10"] = "Sector de comunicaciones";
							$sectores["11"] = "Sector agroindustrial";
							$sectores["12"] = "Otro";

							$formtal["1"] = "Alianzas para la innovación";
							$formtal["2"] = "Fábricas de productividad";
							$formtal["3"] = "Propiedad industrial";
							$formtal["4"] = "Ferias, misiones comerciales, ruedas de negocio y postulaciones";
							$formtal["5"] = "Centro de transformación digital empresarial";
							$formtal["6"] = "Técnicas y acompañamiento especializado";
							$formtal["7"] = "Marcas y Patentes";
							$formtal["8"] = "Otro";

							while ($fila = mysqli_fetch_array($res)) {
								$filt_proyecto = '';

								if (isset($_GET['proyecto']) && $_GET['proyecto'] != '') {
									$filt_proyecto = " AND id_programa=" . $_GET['proyecto'];
									"$filt_proyecto=$filt_proyecto<br>";
								}

								$consp = "SELECT * FROM progsxdiligencias WHERE id_diligencia = " . $fila['id_diligencia'] . " " . $filt_proyecto;
								$aux_pxd_x_id_pro = array();
								$resp = $stmt = mysqli_query($conn, $consp);

								while ($filap = mysqli_fetch_array($resp)) {
									$aux_pxd_x_id_pro[$filap['id_programa']] = $filap;
								}
								// var_dump($consp);


								// var_dump($filt_proyecto);
								if (($_GET['proyecto'] != '' && count($aux_pxd_x_id_pro) > 0) || $_GET['proyecto'] == '') {

									// if (($_GET['proyecto'] != '' && count($fila2) > 0) || $_GET['proyecto'] == '') {

									$cont++;
									$tipoDocumento = $fila['tipoDocumento'] == '1' ? 'CÉDULA DE CIUDADANÍA'
										: ($fila['tipoDocumento'] == '2' ? 'NIT' : 'OTROS');

									$ciudad = $fila['ciudad'] == 1 ? 'COLÓN'
										: ($fila['ciudad'] == 2 ? 'MOCOA'
											: ($fila['ciudad'] == 3 ? 'ORITO'
												: ($fila['ciudad'] == 4 ? 'PUERTO ASÍS'
													: ($fila['ciudad'] == 5 ? 'PUERTO CAICEDO'
														: ($fila['ciudad'] == 6 ? 'PUERTO GUZMÁN'
															: ($fila['ciudad'] == 7 ? 'PUERTO LEGUÍZAMO'
																: ($fila['ciudad'] == 8 ? 'SANTIAGO'
																	: ($fila['ciudad'] == 9 ? 'SAN FRANCISCO'
																		: ($fila['ciudad'] == 10 ? 'SAN MIGUEL'
																			: ($fila['ciudad'] == 11 ? 'SIBUNDOY'
																				: ($fila['ciudad'] == 12 ? 'VALLE DEL GUAMUEZ' : 'VILLAGARZÓN')))))))))));

									$fechaSol = explode('-', explode(' ', $fila['create_at'])[0]);
									$updated_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];
									$apellido = $fila['apellidos'];
									if ($fila['tipoDocumento'] == '2') {
										$aux = explode(" ", $fila['apellidos']);
										$apellido =  $aux[0];
									}

									$tbody .= "
        									<tr>
        										<td>$cont</td>
        										<td>" . $tipoDocumento . "</td>
        										<td>" . $fila['documento'] . "</td>
                								<td>" . $fila['nombres'] . ' ' . (!is_null($fila['apellidos']) ? $fila['apellidos'] : '') . "</td>
                								<td>" . $fila['ciudad'] . "</td>
                								<td>" . $fila['email'] . '<br>' . $fila['email_representante'] . "</td>
                								<td>" . $fila['celular'] . '<br>' . $fila['celular_representante'] . "</td>
                								<td>" . $fila['direccEmpr'] . "</td>
                								<td>" . $fila['activEcon'] . '<br>' . $fila['otro_activEcon'] . "</td>
                								<td>" . $fila['des_productivo'] . "</td>
                								<td>" . $fila['fort_empresarial'] . "</td>
                								<td>" . $fila['form_empresarial'] . "</td>
                								<td>" . $fila['nombre_representante'] . "</td>
                								<td>" . $fila['poblacion'] . '<br>' . $fila['otro_poblacion'] . "</td>
                								<td>" . $fila['fecha_matricula'] . "</td>
                								<td>" . $fila['matricula'] . "</td>
                								<td>" . $fila['registrado'] . "</td>
                								<td>" . $fila['num_cam_comercio'] . "</td>
                								<td>" . $fila['programa_ccp'] . "</td>
                								<td>" . $fila['estado_solicitud'] . "</td>
                								<td>" . $fila['solicitud'] . "</td>
                								<td>" . $fila['genero'] . "</td>
                								<td>" . $fila['escolaridad'] . "</td>
                								<td>" . $fila['rango_edad'] . "</td>
                								<td>" . $fila['programa_ccp'] . "</td>";

									foreach ($programas as $programa) {

										if (isset($aux_pxd_x_id_pro[$programa['id_programa']])) {
											$tbody .= "<td>Si</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['recibe_apoyo'] . "</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['dinero_espcie'] . "</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['descrip_val'] . "</td>";
										} else {
											$tbody .= "<td>No</td><td><td></td><td></td>";
										}
									}

									"</tr>";
								}
							}
							echo $tbody;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>