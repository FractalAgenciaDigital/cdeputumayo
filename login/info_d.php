<?php
include 'funciones.php';
header('Content-type: application/vnd.ms-excel; charset=utf8');
header("Content-Disposition: attachment; filename=diligencias.xls");
header("Pragma: no-cache");
header("Expires: 0");


$cons_a = "SELECT * FROM programas   order by programa";
$res_a = mysqli_query($conn, $cons_a);
$programas2 = array();
$programas3 = array();
while ($afila = mysqli_fetch_array($res_a)) {
	$programas2[$afila['id_programa']] = $afila['programa'];
	$programas3[$afila['id_programa']] = $afila;
}



$cons = 'SELECT * FROM diligencias_new';
$donde = '';

if (isset($_GET['tipoDocumento']) && $_GET['tipoDocumento'] != '') {
	$donde .= ' WHERE tipoDocumento = ' . $_GET['tipoDoc'];
}
if (isset($_GET['txtBuscar']) && $_GET['txtBuscar'] != '') {
	$txt = "LIKE '%" . $_GET['txtBuscar'] . "%'";
	$bloque = "nombres $txt OR apellidos $txt or documento $txt";
	$donde .= $donde ? " AND ($bloque)" : " WHERE $bloque";
}
$cons .= $donde;

$res = mysqli_query($conn, $cons);
//echo $cons; exit;
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
								<th class="text-center align-middle">Nombres completos</th>
								<th class="text-center align-middle">Correos</th>
								<th class="text-center align-middle">Celulares</th>
								<th class="text-center align-middle">Ciudad</th>
								<th class="text-center align-middle">Direcc. Empresa</th>
								<th class="text-center align-middle">Actividad Económica</th>
								<th class="text-center align-middle">Des. Productivo</th>
								<th class="text-center align-middle">Princ. Prod. Serv</th>
								<th class="text-center align-middle">Fort. Empresarial</th>
								<th class="text-center align-middle">Form. Empresarial</th>
								<th class="text-center align-middle">Nombre Representante</th>
								<th class="text-center align-middle">Población</th>
								<th class="text-center align-middle">Fecha Matricula</th>
								<th class="text-center align-middle">Matricula</th>
								<th class="text-center align-middle">Registrado</th>
								<th class="text-center align-middle">Num. Cam. Comercio</th>
								<th class="text-center align-middle">Programa CCP</th>
								<th class="text-center align-middle">Estado Solicitud</th>
								<th class="text-center align-middle">Fecha Solicitud</th>
								<th class="text-center align-middle">Genero</th>
								<th class="text-center align-middle">Escolaridad</th>
								<th class="text-center align-middle">Rango EDAD</th>
								<th class="text-center align-middle">Solicitud</th>

								<th class="text-center align-middle">Desarrollo prod.</th>
								<th class="text-center align-middle">Des. prod. Otro</th>
								<th class="text-center align-middle">Principal Prod/Serv</th>
								<th class="text-center align-middle">Formación empresarial</th>
								<th class="text-center align-middle">Fortalecimiento empresarial</th>
								<th class="text-center align-middle">Fort. empresarial Otro</th>
								<th class="text-center align-middle">Solicitud</th>

								<th class="text-center align-middle">Genero</th>
								<th class="text-center align-middle">Tipo Población</th>
								<th class="text-center align-middle">Otro Tipo Población</th>
								<th class="text-center align-middle">Escolaridad</th>
								<th class="text-center align-middle">Rango Edad</th>
								<th class="text-center align-middle">Registrado en Cámara</th>
								<th class="text-center align-middle">Número Matricula</th>
								<th class="text-center align-middle">Fecha Matricula</th>
								<th class="text-center align-middle">Proyecto CPP u otros</th>
								<?php foreach ($programas2 as $p) { ?>
									<th class="text-center align-middle">Proyecto = <?= $p ?></th>
									<th class="text-center align-middle">Recibe apoyo1</th>
									<th class="text-center align-middle">Tipo apoyo1</th>
									<th class="text-center align-middle">Descripción / Valor1</th>
								<?php   } ?>
								<!--
        								<th class="text-center align-middle">Nombre Proyecto 1</th>
        								<th class="text-center align-middle">Recibe apoyo1</th>
        								<th class="text-center align-middle">Tipo apoyo1</th>
        								<th class="text-center align-middle">Descripción / Valor1</th>
        								
        								<th class="text-center align-middle">Nombre Proyecto 2</th>
        								<th class="text-center align-middle">Recibe apoy2o</th>
        								<th class="text-center align-middle">Tipo apoyo2</th>
        								<th class="text-center align-middle">Descripción / Valor2</th>
        								
        								<th class="text-center align-middle">Nombre Proyecto 3</th>
        								<th class="text-center align-middle">Recibe apoyo3</th>
        								<th class="text-center align-middle">Tipo apoyo3</th>
        								<th class="text-center align-middle">Descripción / Valor3</th>
        								
        								<th class="text-center align-middle">Nombre Proyecto 4</th>
        								<th class="text-center align-middle">Recibe apoyo4</th>
        								<th class="text-center align-middle">Tipo apoyo4</th>
        								<th class="text-center align-middle">Descripción / Valor4</th>
        								
        								<th class="text-center align-middle">Nombre Proyecto 5</th>
        								<th class="text-center align-middle">Recibe apoyo5</th>
        								<th class="text-center align-middle">Tipo apoyo5</th>
        								<th class="text-center align-middle">Descripción / Valor5</th>
        								
        								<th class="text-center align-middle">Nombre Proyecto 6</th>
        								<th class="text-center align-middle">Recibe apoyo6</th>
        								<th class="text-center align-middle">Tipo apoyo6</th>
        								<th class="text-center align-middle">Descripción / Valor6</th>
        								-->
								<!-- 
								<th class="text-center align-middle">Estado Solicitud</th>
								<th class="text-center align-middle">Fecha Respuesta</th>
								<th class="text-center align-middle">Enero</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Febrero</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Marzo</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Abril</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Mayo</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Junio</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Julio</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Agosto</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Septiembre</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Octubre</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Noviembre</th>
								<th class="text-center align-middle">Observación</th>
								<th class="text-center align-middle">Diciembre</th>
								<th class="text-center align-middle">Observación</th>
								<th>Fec. Actualiza</th> -->
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
									$aux_proyect = $_GET['proyecto'];
									$filt_proyecto = " and nom_progr='$aux_proyect'";
								}


								// $cons2 = "SELECT * FROM extras_usus WHERE id_usu=" . $fila['id'] . " " . $filt_proyecto;
								// $res2 = $stmt = mysqli_query($conn, $cons2);
								// $fila2 = mysqli_fetch_array($res2);



								if (($_GET['proyecto'] != '' && count($fila2) > 0) || $_GET['proyecto'] == '') {

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

									$consp = "SELECT * FROM progsxdiligencias WHERE id_diligencia=" . $fila['id_diligencia'];

									$aux_pxd_x_id_pro = array();
									$resp = $stmt = mysqli_query($conn, $consp);
									while ($filap = mysqli_fetch_array($resp)) {
										$aux_pxd_x_id_pro[$filap['id_programa']] = $filap;
									}

									echo "
        									<tr>
        										<td>$cont</td>
        										<td>" . $tipoDocumento . "</td>
        										<td>" . $fila['documento'] . "</td>
												<td>" . $fila['documento'] . "</td>
                								<|td>" . $fila['nombres'] . ' ' . (!is_null($fila['apellidos']) ? $fila['apellidos'] : '') . "</								td>
                								<td>" . $fila['email'] . '<br>' . $fila['email_representante'] . "</td>
                								<td>" . $fila['celular'] . '<br>' . $fila['celular_representante'] . "</td>
                								<td>" . $fila['ciudad'] . "</td>
                								<td>" . $fila['direccEmpr'] . "</td>
                								<td>" . $fila['activEcon'] . '<br>' . $fila['otro_activEcon'] . "</td>
                								<td>" . $fila['des_productivo'] . "</td>
                								<td>" . $fila['princ_prod_serv'] . "</td>
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
                								<td>" . $fila['solicitud'] . "</td>";

									foreach ($programas3 as $p) {

										if ($aux_pxd_x_id_pro[$p['id_programa']]) {
											echo "<td>Si</td><td>" . $aux_pxd_x_id_pro[$p['id_programa']]['recibe_apoyo'] . "</td><td>" . $aux_pxd_x_id_pro[$p['id_programa']]['dinero_espcie'] . "</td><td>" . $aux_pxd_x_id_pro[$p['id_programa']]['descrip_val'] . "</td>";
										} else {
											echo "<td>No</td><td></td><td></td><td></td>";
										}
										$tbody .= "<td>" . $p['programa'] . "</td><td >Recibe apoyo1</td><td >Tipo apoyo1</td><td >Descripción / Valor1</td>";
									}


									/*
                                        echo     "<td>".$fila2['nom_progr']."</td>
                                                  <td>".$fila2['apoyo']."</td>
                                                  <td>".$fila2['dinero_espcie']."</td>
                                                  <td>".$fila2['especie']."</td>
                                                  
                                                  <td>".$fila2['nom_progr2']."</td>
                                                  <td>".$fila2['apoyo2']."</td>
                                                  <td>".$fila2['dinero_espcie2']."</td>
                                                  <td>".$fila2['especie2']."</td>
                                                  
                                                  <td>".$fila2['nom_progr3']."</td>
                                                  <td>".$fila2['apoyo3']."</td>
                                                  <td>".$fila2['dinero_espcie3']."</td>
                                                  <td>".$fila2['especie3']."</td>
                                                  
                                                  <td>".$fila2['nom_progr4']."</td>
                                                  <td>".$fila2['apoyo4']."</td>
                                                  <td>".$fila2['dinero_espcie4']."</td>
                                                  <td>".$fila2['especie4']."</td>
                                                  
                                                  <td>".$fila2['nom_progr5']."</td>
                                                  <td>".$fila2['apoyo5']."</td>
                                                  <td>".$fila2['dinero_espcie5']."</td>
                                                  <td>".$fila2['especie5']."</td>
                                                  
                                                  <td>".$fila2['nom_progr6']."</td>
                                                  <td>".$fila2['apoyo6']."</td>
                                                  <td>".$fila2['dinero_espcie6']."</td>
                                                  <td>".$fila2['especie6']."</td>";"
                                                  */
									// echo  "<td>" . $fila2['estado_solicitud'] . "</td>
									//   <td>" . $fila2['fecha_solicitud'] . "</td>
									//   <td>" . $fila2['enero'] . "</td>
									//   <td>" . $fila2['obs_ene'] . "</td>
									//   <td>" . $fila2['febrero'] . "</td>
									//   <td>" . $fila2['obs_feb'] . "</td>
									//   <td>" . $fila2['marzo'] . "</td>
									//   <td>" . $fila2['obs_mar'] . "</td>
									//   <td>" . $fila2['abril'] . "</td>
									//   <td>" . $fila2['obs_abr'] . "</td>
									//   <td>" . $fila2['mayo'] . "</td>
									//   <td>" . $fila2['obs_may'] . "</td>
									//   <td>" . $fila2['junio'] . "</td>
									//   <td>" . $fila2['obs_jun'] . "</td>
									//   <td>" . $fila2['julio'] . "</td>
									//   <td>" . $fila2['obs_jul'] . "</td>
									//   <td>" . $fila2['agosto'] . "</td>
									//   <td>" . $fila2['obs_ago'] . "</td>
									//   <td>" . $fila2['septiembre'] . "</td>
									//   <td>" . $fila2['obs_sep'] . "</td>
									//   <td>" . $fila2['octubre'] . "</td>
									//   <td>" . $fila2['obs_oct'] . "</td>
									//   <td>" . $fila2['noviembre'] . "</td>
									//   <td>" . $fila2['obs_nov'] . "</td>
									//   <td>" . $fila2['diciembre'] . "</td>
									//   <td>" . $fila2['obs_dic'] . "</td>
									// <td>$updated_at</td>

									"</tr>";
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>