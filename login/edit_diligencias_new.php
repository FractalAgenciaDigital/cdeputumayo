<?php
include "cabecera.php";
include '../funciones.php';
// include 'controller.php';

$id_edit = '';
$id_registro = '';

if (isset($_GET['id_diligencia'])) {
	$id_diligencia = $_GET['id_diligencia'];
	$query = "SELECT * FROM diligencias_new WHERE id_diligencia = $id_diligencia";
	$result = mysqli_query($conn, $query);


	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$tipoDocumento = isset($row['tipoDocumento']) ? $row['tipoDocumento'] : "";
		// $tipoDocumento = $row['tipoDocumento'];
		$documento = $row['documento'];
		// $nombres = $row['nombres'];
		$nombres = isset($row['nombres']) ? $row['nombres'] : "";
		$apellidos = $row['apellidos'];
		$ciudad = $row['ciudad'];
		$email = $row['email'];
		$celular = $row['celular'];
		$direccEmpr = $row['direccEmpr'];
		$activEcon = $row['activEcon'];
		$otro_activEcon = $row['otro_activEcon'];
		$des_productivo = $row['des_productivo'];
		// $princ_prod_serv = $row['princ_prod_serv'];
		$fort_empresarial = isset($row['fort_empresarial']) ? $row['fort_empresarial'] : "";
		// $fort_empresarial = $row['fort_empresarial'];
		$form_empresarial = $row['form_empresarial'];
		$nombre_representante = $row['nombre_representante'];
		$celular_representante = $row['celular_representante'];
		$email_representante = $row['email_representante'];
		$poblacion = $row['poblacion'];
		$otro_poblacion = $row['otro_poblacion'];
		$fecha_matricula = $row['fecha_matricula'];
		$matricula = $row['matricula'];
		$registrado = $row['registrado'];
		$num_cam_comercio = $row['num_cam_comercio'];
		$programa_ccp = $row['programa_ccp'];
		$estado_solicitud = $row['estado_solicitud'];
		$fecha_solicitud = $row['fecha_solicitud'];
		$genero = $row['genero'];
		$escolaridad = $row['escolaridad'];
		$rango_edad = $row['rango_edad'];
		$solicitud = $row['solicitud'];
	}

	// header("Location: diligencias.php");
}

if (isset($_POST['update'])) {

	$id_diligencia = $_GET['id_diligencia'];
	$tipoDocumento = $_POST['tipoDocumento'];
	$documento = $_POST['documento'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$ciudad = $_POST['ciudad'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$direccEmpr = $_POST['direccEmpr'];
	$activEcon = $_POST['activEcon'];
	$otro_activEcon = $_POST['otro_activEcon'];
	// $des_productivo = $_POST['des_productivo'];
	$des_productivo = isset($_POST['des_productivo']) ? $_POST['des_productivo'] : "";
	// $princ_prod_serv = $_POST['princ_prod_serv'];
	$fort_empresarial = isset($_POST['fort_empresarial']) ? $_POST['fort_empresarial'] : "";
	// $fort_empresarial = $_POST['fort_empresarial'];
	$form_empresarial = isset($_POST['form_empresarial']) ? $_POST['form_empresarial'] : "";
	// $form_empresarial = $_POST['form_empresarial'];
	$nombre_representante = $_POST['nombre_representante'];
	$celular_representante = $_POST['celular_representante'];
	$email_representante = $_POST['email_representante'];
	$poblacion = $_POST['poblacion'];
	$otro_poblacion = $_POST['otro_poblacion'];
	$fecha_matricula = $_POST['fecha_matricula'];
	$matricula = $_POST['matricula'];
	$registrado = $_POST['registrado'];
	$num_cam_comercio = $_POST['num_cam_comercio'];
	$programa_ccp = $_POST['programa_ccp'];
	$estado_solicitud = $_POST['estado_solicitud'];
	$fecha_solicitud = $_POST['fecha_solicitud'];
	$genero = $_POST['genero'];
	$escolaridad = $_POST['escolaridad'];
	$rango_edad = $_POST['rango_edad'];
	$solicitud = $_POST['solicitud'];

	$edit_diligencias_new = "UPDATE `diligencias_new` SET `tipoDocumento` = '$tipoDocumento', `documento` = '$documento', `nombres` = '$nombres', `apellidos` = '$apellidos', `ciudad` = '$ciudad', `email` = '$email', `celular` = '$celular', `direccEmpr` = '$direccEmpr', `activEcon` = '$activEcon', `otro_activEcon` = '$otro_activEcon', `des_productivo` = '$des_productivo', `fort_empresarial` = '$fort_empresarial', `form_empresarial` = '$form_empresarial', `nombre_representante` = '$nombre_representante', `celular_representante` = '$celular_representante', `email_representante` = '$email_representante', `poblacion` = '$poblacion', `otro_poblacion` = '$otro_poblacion', `fecha_matricula` = '$fecha_matricula', `matricula` = '$matricula', `registrado` = '$registrado', `num_cam_comercio` = '$num_cam_comercio', `programa_ccp` = '$programa_ccp', `estado_solicitud` = '$estado_solicitud', `fecha_solicitud` = '$fecha_solicitud', `genero` = '$genero', `escolaridad` = '$escolaridad', `rango_edad` = '$rango_edad', `solicitud` = '$solicitud' WHERE `diligencias_new`.`id_diligencia` = $id_diligencia";



	$ejecutar = mysqli_query($conn, $edit_diligencias_new);
	// echo "<pre>";
	// print_r($edit_diligencias_new);
	// echo "</pre>";
	// exit;

	// --------------------
	// if ($ejecutar != false) {

	// ---------------------PROGXDILIGENCIAS TABLE------------------------
	$id_programa = 0;
	$datos_programa = isset($_POST['datos_programa']) ? $_POST['datos_programa'] : "";
	$select_progs = "SELECT * FROM programas";


	// $consp = "SELECT * FROM progsxdiligencias WHERE id_diligencia=" . $fila['id_diligencia'] . " " . $filt_proyecto;


	foreach ($datos_programa as $program) {

		$selectpxd = "SELECT * FROM `progsxdiligencias` WHERE `progsxdiligencias`.`id_diligencia` = $id_diligencia";
		$exe_selectpxd = mysqli_query($conn, $selectpxd);
	}


	$lista_progsxdiligencias = array();

	while ($row = mysqli_fetch_array($exe_selectpxd)) {
		$lista_progsxdiligencias[$row['id_programa']] = $row;
	}


	// INSERT INTO `progsxdiligencias` (`id`, `id_diligencia`, `id_programa`, `recibe_apoyo`, `dinero_espcie`, `descrip_val`) VALUES ('4', '154', '15', 'Si', 'Dinero', '7896541230000');


	$deletepxd = "DELETE FROM `progsxdiligencias` WHERE `progsxdiligencias`.`id_diligencia` = $id_diligencia";
	$exe_deletepxd = mysqli_query($conn, $deletepxd);


	foreach ($datos_programa as $program) {
		if (isset($program['si_programa'])) {

			$info_progsxdiligencias = "INSERT INTO progsxdiligencias ( `id_diligencia`, `id_programa`, `recibe_apoyo`, `dinero_espcie`, `descrip_val`) VALUES ('$id_diligencia', '{$program['si_programa']}', '{$program['recibe_apoyo']}', '{$program['dinero_espcie']}', '{$program['descrip_val']}')";

			$exe_proxdiligencias = mysqli_query($conn, $info_progsxdiligencias);
		}
	}
	// }
}
?>

<style>
	.form-control {
		background-color: #e6e6e6 !important;
		color: #1c1c1d;
	}
</style>

<div class=" bg-light">
	<form action="edit_diligencias_new.php?id_diligencia=<?php echo $_GET['id_diligencia']; ?>" name="registro_diligencia" method="POST">
		<div class="container bg-white mb-4">
			<div class="form-row pt-2">
				<div class="form-group col-12">
					<strong>DATOS PRINCIPALES</strong>
					<div class="dropdown-divider"></div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-3">
					<label for="tipoDocumento">Tipo Documento</label>
					<select required name="tipoDocumento" id="tipoDocumento" class="form-control">
						<option value="">Seleccione</option>
						<option value="1" <?php if ($tipoDocumento == "1") {
												echo "selected";
											} ?>>Cedula de Ciudadania</option>
						<option value="2" <?php if ($tipoDocumento == "2") {
												echo "selected";
											} ?>>NIT</option>
						<option value="3" <?php if ($tipoDocumento == "3") {
												echo "selected";
											} ?>>Cedula de Extranjeria</option>
						<option value="NA" <?php if ($tipoDocumento == "NA") {
												echo "selected";
											} ?>>Otro</option>
					</select>
				</div>
				<div class="form-group col-3">
					<label for="documento">Documento</label>
					<input type="text" name="documento" required="" id="documento" class="form-control" placeholder="Documento" value="<?php echo $documento ?>">
				</div>
				<!-- <div class="form-group col-3">
          <label for="nitEmpr">NIT Empresa</label>
          <input type="text" name="nitEmpr" v-model="nitEmpr" id="nitEmpr" class="form-control" placeholder="NIT">
        </div> -->
				<div class="form-group col-3">
					<label for="nombres">Nombres</label>
					<input type="text" v-model="" id="nombres" value="<?php echo $nombres ?>" name="nombres" class="form-control" value="">
				</div>
				<div class="form-group col-3">
					<label for="apellidos">Apellidos</label>
					<input type="text" v-model="apellidos" value="<?php echo $apellidos ?>" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-3">
					<label for="ciudad">Ciudad</label>
					<input type="text" class="form-control" value="<?php echo $ciudad ?>" id="ciudad" name="ciudad" placeholder="Ciudad">
				</div>
				<div class="form-group col-3">

					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" value="<?php echo $email ?>" id="email" name="email" placeholder="Email">
				</div>
				<div class="form-group col-md-3">
					<label for="celular">Celular</label>
					<input type="number" id="celular" value="<?php echo $celular ?>" name="celular" v-model="celular" class="form-control" placeholder="Celular">
				</div>
				<!-- <div class="form-group col-3">
					<label for="des_productivo">Des. Productivo:</label>
					<input type="text" id="des_productivo" value="<?php echo $des_productivo ?>" name="des_productivo" class="form-control" placeholder="example" aria-label="DesProductivo">
				</div> -->
				<div class="form-group col-md-3">
					<label for="direccEmpr">Dirección Empresa:</label>
					<input type="text" id="direccEmpr" value="<?php echo $direccEmpr ?>" v-model="direccEmpr" name="direccEmpr" class="form-control" placeholder="Dirección Empresa" aria-label="DirEmpresa">
				</div>
			</div>

			<div class="form-row">
				<!-- <div class="form-group col-3">
					<label for="princ_prod_serv">Principal Prod/Serv:</label>
					<input type="text" id="princ_prod_serv" value="<?php echo $princ_prod_serv ?>" name="princ_prod_serv" class="form-control" placeholder="Principal Prod/Serv" aria-label="PrincipalProd/Serv">
				</div> -->
				<!-- <div class="form-group col-3">
					<label for="fort_empresarial">Fortalecimiento Empresarial</label>
					<input type="text" id="fort_empresarial" value="<?php echo $fort_empresarial ?>" name="fort_empresarial" class="form-control" placeholder="Fortalecimiento Empresarial" aria-label="fort_empresarial">
				</div> -->
				<div class="form-group col-md-3">
					<label for="solicitud">Solicitud:</label>
					<input type="text" id="solicitud" value="<?php echo $solicitud ?>" v-model="solicitud" name="solicitud" class="form-control" placeholder="Solicitud" aria-label="Solicitud">
				</div>
				<!-- ---------------------------------------------- -->
				<div class="form-group col-3">
					<label for="activEcon">Actividad Económica:</label>
					<select class="form-control" name="activEcon" v-model="select" onChange="activEconomica(this.value)">
						<option value="Supermercados - Tiendas - Autoservicios - Minimercados" <?php if (isset($activEcon) && $activEcon == "Supermercados - Tiendas - Autoservicios - Minimercados") {
																									echo "selected";
																								} ?>>
							Supermercados - Tiendas - Autoservicios - Minimercados</option>

						<option value="Venta de celulares - Accesorios - Tecnologia - Internet" <?php if (isset($activEcon) && $activEcon == "Venta de celulares - Accesorios - Tecnologia - Internet") {
																									echo "selected";
																								} ?>>
							Venta de celulares - Accesorios - Tecnologia - Internet</option>

						<option value="Calzado - Boutique - Prendas de Vestir - Confecciones" <?php if (isset($activEcon) && $activEcon == "Calzado - Boutique - Prendas de Vestir - Confecciones") {
																									echo "selected";
																								} ?>>
							Calzado - Boutique - Prendas de Vestir - Confecciones</option>

						<option value="Resturantes - Piqueteaderos - Asaderos" <?php if (isset($activEcon) && $activEcon == "Resturantes - Piqueteaderos - Asaderos") {
																					echo "selected";
																				} ?>>
							Resturantes - Piqueteaderos - Asaderos</option>

						<option value="Cafeteria - Panaderia - Heladeria" <?php if (isset($activEcon) && $activEcon == "Cafeteria - Panaderia - Heladeria") {
																				echo "selected";
																			} ?>>
							Cafeteria - Panaderia - Heladeria</option>

						<option value="Ferreterias - Obras civiles" <?php if (isset($activEcon) && $activEcon == "Ferreterias - Obras civiles") {
																		echo "selected";
																	} ?>>
							Ferreterias - Obras civiles</option>

						<option value="Publicidad - Imprentas" <?php if (isset($activEcon) && $activEcon == "Publicidad - Imprentas") {
																	echo "selected";
																} ?>>Publicidad
							- Imprentas</option>

						<option value="Taller de motos y bicicletas- Venta de Respuestos - Montallantas" <?php if (isset($activEcon) && $activEcon == "Taller de motos y bicicletas- Venta de Respuestos - Montallantas") {
																												echo "selected";
																											} ?>>
							Taller de motos y bicicletas- Venta de Respuestos - Montallantas</option>

						<option value="Discotekas - Bares - Licoreras - Estancos" <?php if (isset($activEcon) && $activEcon == "Discotekas - Bares - Licoreras - Estancos") {
																						echo "selected";
																					} ?>>
							Discotekas - Bares - Licoreras - Estancos</option>

						<option value="Billares" <?php if (isset($activEcon) && $activEcon == "Billares") {
														echo "selected";
													} ?>>
							Billares</option>

						<option value="Cacharrerias - Variedades - Accesorios - Distribuidoras" <?php if (isset($activEcon) && $activEcon == "Cacharrerias - Variedades - Accesorios - Distribuidoras") {
																									echo "selected";
																								} ?>>
							Cacharrerias - Variedades - Accesorios - Distribuidoras</option>

						<option value="Publicidad - Imprentas" <?php if (isset($activEcon) && $activEcon == "Publicidad - Imprentas") {
																	echo "selected";
																} ?>>Publicidad
							- Imprentas</option>

						<option value="Droguerias - Servicios medicos (odontologia-citologia-otros)" <?php if (isset($activEcon) && $activEcon == "Droguerias - Servicios medicos (odontologia-citologia-otros)") {
																											echo "selected";
																										} ?>>
							Droguerias - Servicios medicos (odontologia-citologia-otros)</option>

						<option value="Tapicerias - Venta de muebles - Carpinterias" <?php if (isset($activEcon) && $activEcon == "Tapicerias - Venta de muebles - Carpinterias") {
																							echo "selected";
																						} ?>>
							Tapicerias - Venta de muebles - Carpinterias</option>

						<option value="Papelerias - Fotocopiadoras" <?php if (isset($activEcon) && $activEcon == "Papelerias - Fotocopiadoras") {
																		echo "selected";
																	} ?>>
							Papelerias - Fotocopiadoras</option>

						<option value="Hoteles - Residencias - Hostales - Moteles - Reservados" <?php if (isset($activEcon) && $activEcon == "Hoteles - Residencias - Hostales - Moteles - Reservados") {
																									echo "selected";
																								} ?>>
							Hoteles - Residencias - Hostales - Moteles - Reservados</option>

						<option value="Casa de lenocidio" <?php if (isset($activEcon) && $activEcon == "Casa de lenocidio") {
																echo "selected";
															} ?>>Casa de
							lenocidio</option>

						<option value="Expendio de carnes (Cerdo - Res - Pollo - Pescado)" <?php if (isset($activEcon) && $activEcon == "Expendio de carnes (Cerdo - Res - Pollo - Pescado)") {
																								echo "selected";
																							} ?>>
							Expendio de carnes (Cerdo - Res - Pollo - Pescado)</option>

						<option value="Peluquerias - Barberias - Spa" <?php if (isset($activEcon) && $activEcon == "Peluquerias - Barberias - Spa") {
																			echo "selected";
																		} ?>>
							Peluquerias - Barberias - Spa</option>

						<option value="Espectáculos musicales en vivo" <?php if (isset($activEcon) && $activEcon == "Espectáculos musicales en vivo") {
																			echo "selected";
																		} ?>>
							Espectáculos musicales en vivo</option>

						<option value="Servicios ambientales" <?php if (isset($activEcon) && $activEcon == "Servicios ambientales") {
																	echo "selected";
																} ?>>Servicios
							ambientales</option>

						<option value="Other" onclick="mostrarOther();" <?php if (isset($activEcon) && $activEcon == "Other") {
																			echo "selected";
																		} ?>>Otro</option>
					</select>
				</div>

				<div class="form-group col-3 act_econ" style="display:none">
					<label for="otro_activEcon">¿Cual es su Actividad Económica?</label>
					<input class="form-control" type="text" placeholder="Escriba su tipo de población" name="otro_activEcon" value="<?php echo $otro_activEcon ?>">
				</div>

				<!-- ------------------------------------- -->
			</div>

			<style>
				.btn-outline-secondary {
					color: black;
					background-color: #e6e6e6;
					border-color: #c8ced3;
				}

				.btn-outline-secondary:hover {
					color: black;
					background-color: #c8ced3;
					border-color: #c8ced3;
				}
			</style>

			<!-- ---------------------------------------------- -->


			<div class="form-row">
				<!-----EL Script para mostrar u ocultar es en la cabecera = form_empresarial ------- -->
				<div class="form-group col-3">
					<label for="">Componentes:</label></br>
				</div>
				<div class="form-group col-3">
					<input class="form-check-input" name="des_productivo" v-model="des_productivo" type="checkbox" value="Fortalecimiento Empresarial" <?php if (isset($des_productivo) && $des_productivo == "Fortalecimiento Empresarial") {
																																							echo "checked";
																																						} ?> id="des_productivo">
					<label class="form-check-label" for="des_productivo">
						Desarrollo Productivo.
					</label>
				</div>
				<div class="form-group col-3">
					<input class="form-check-input" name="fort_empresarial" v-model="fort_empresarial" type="checkbox" value="Fortalecimiento Empresarial" <?php if (isset($fort_empresarial) && $fort_empresarial == "Fortalecimiento Empresarial") {
																																								echo "checked";
																																							} ?> id="fort_empresarial">
					<label class="form-check-label" for="fort_empresarial">
						Fortalecimiento Empresarial
					</label>
				</div>
				<div class="form-group col-3">
					<input class="form-check-input" type="checkbox" name="check" value="" name="form_empresarial" v-model="form_empresarial" id="check" onchange="javascript:showContent()" <?php if (isset($form_empresarial) && $form_empresarial != "") {
																																																echo "checked";
																																															} ?>>
					<label class="form-check-label" for="check">
						Formación Empresarial
					</label>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-3" id="content" style="display: none;">
					<select class="btn btn-outline-secondary" name="form_empresarial" v-model="select">
						<option value="" <?php if (isset($form_empresarial) && $form_empresarial == "") {
												echo "selected";
											} ?>>
							Ninguno</option>
						<option value="Mercadeo y Ventas" <?php if (isset($form_empresarial) && $form_empresarial == "Mercadeo y Ventas") {
																echo "selected";
															} ?>>
							Mercadeo y Ventas</option>

						<option value="Administrativo" <?php if (isset($form_empresarial) && $form_empresarial == "Administrativo") {
															echo "selected";
														} ?>>
							Administrativo</option>

						<option value="Desarrollo del Empresario " <?php if (isset($form_empresarial) && $form_empresarial == "Desarrollo del Empresario ") {
																		echo "selected";
																	} ?>>
							Desarrollo del Empresario </option>

						<option value="Entidades sin ánimo de lucro" <?php if (isset($form_empresarial) && $form_empresarial == "Entidades sin ánimo de lucro") {
																			echo "selected";
																		} ?>>
							Entidades sin ánimo de lucro</option>

						<option value="Financiero y Tributario" <?php if (isset($form_empresarial) && $form_empresarial == "Financiero y Tributario") {
																	echo "selected";
																} ?>>
							Financiero y Tributario</option>

						<option value="Juridico" <?php if (isset($form_empresarial) && $form_empresarial == "Juridico") {
														echo "selected";
													} ?>>Jurídico
						</option>

						<option value="Emprendimiento e Innovacion" <?php if (isset($form_empresarial) && $form_empresarial == "Emprendimiento e Innovacion") {
																		echo "selected";
																	} ?>>
							Emprendimiento e Innovación</option>

						<option value="Produccion" <?php if (isset($form_empresarial) && $form_empresarial == "Produccion") {
														echo "selected";
													} ?>>
							Producción</option>

						<option value="Comercio Exterior" <?php if (isset($form_empresarial) && $form_empresarial == "Comercio Exterior") {
																echo "selected";
															} ?>>
							Comercio Exterior</option>

					</select>

				</div>
			</div>
			<script type="text/javascript">
				function showContent() {
					element = document.getElementById("content");
					check = document.getElementById("check");
					if (check.checked) {
						element.style.display = 'block';
					} else {
						element.style.display = 'none';
					}
				}
			</script>

			<!-- ------------------------------------- -->

			<br>
			<div class="form-row">
				<div class="form-group col-12">
					<b>DATOS ADICIONALES</b>
					<div class="dropdown-divider"></div><br>
				</div>
			</div>
			<div class="form-row ">
				<div class="form-group col-3">
					<label for="nombre_representante">Nombre Representante</label>
					<input type="text" value="<?php echo $nombre_representante ?>" name="nombre_representante" id="nombre_representante" class="form-control" placeholder="Nombre Completo">
				</div>
				<div class="form-group col-3">
					<label for=fecha_matricula">Fecha Matricula:</label>
					<input class="form-control" type="date" name="fecha_matricula" id="fecha_matricula" value="<?= $fecha_matricula ?>">
				</div>
				<!-- ---------------------------------------------- -->

				<div class="form-group col-3">
					<label for="poblacion">Tipo Poblacion:</label>
					<select class="form-control" name="poblacion" v-model="select" onChange="tipoPobla(this.value)">
						<option value="Ninguna" <?php if (isset($poblacion) && $poblacion == "Ninguna") {
													echo "selected";
												} ?>>Ninguno</option>
						<option value="Desplazado" <?php if (isset($poblacion) && $poblacion == "Desplazado") {
														echo "selected";
													} ?>>Desplazado</option>
						<option value="Afrocolombiano" <?php if (isset($poblacion) && $poblacion == "Afrocolombiano") {
															echo "selected";
														} ?>>Afrocolombiano</option>
						<option value="Indigena" <?php if (isset($poblacion) && $poblacion == "Indigena") {
														echo "selected";
													} ?>>Indígena</option>
						<option value="Victima" <?php if (isset($poblacion) && $poblacion == "Victima") {
													echo "selected";
												} ?>>Victima</option>
						<option value="Cabeza de Familia" <?php if (isset($poblacion) && $poblacion == "Cabeza de Familia") {
																echo "selected";
															} ?>>Cabeza de Familia</option>

						<option value="Condicion Discapacidad" <?php if (isset($poblacion) && $poblacion == "Condicion Discapacidad") {
																	echo "selected";
																} ?>>Condición Discapacidad</option>

						<option value="Otro" <?php if (isset($poblacion) && $poblacion == "Otro") {
													echo "selected";
												} ?>>Otro</option>
					</select>
				</div>

				<div class="form-group col-3 aux_cual" style="display:none">
					<label for="otro_poblacion">¿Cual es su Tipo Población?</label>
					<input class="form-control" type="text" placeholder="Escriba su tipo de población" name="otro_poblacion" value="<?php echo $otro_poblacion ?>">
				</div>
			</div>
			<!-- ------------------------------------- -->
			<!-- ------------------------------------- -->

			<div class="form-row">
				<div class="form-group col-3">
					<label for="email_representante">Email Representante</label>
					<input type="text" v-model="email_representante" name="email_representante" id="email_representante" class="form-control" value="<?php echo $email_representante ?>" placeholder="Email Representante">
				</div>
				<div class="form-group col-3">
					<label for="matricula" id="matricula" name="matricula">Número Matricula:</label>
					<input class="form-control" type="text" value="<?php echo $matricula ?>" placeholder="matricula" name="matricula" v-model="matricula" id="matricula">
				</div>


				<div class=" form-group col-3">
					<label for="regis_camc">Registrado en C. de Comercio:</label>
					<select class="form-control" name="registrado" id="registrado" v-model="registrado" onChange="siRegistrado(this.value)">
						<option value="No" <?php if (isset($registrado) && $registrado == "No") {
												echo "selected";
											} ?>>No</option>
						<option value="Si" <?php if (isset($registrado) && $registrado == "Si") {
												echo "selected";
											} ?>>Si</option>
					</select>
				</div>
				<div class="form-group col-3 aux_regis " style="display:none">
					<label id="num_cam_comercio" for="num_cam_comercio">Número C. de Comercio:</label>
					<input class="form-control" type="text" placeholder="Número C. de Comercio:" name="num_cam_comercio" id="num_cam_comercio" value="<?= $num_cam_comercio ?>">
				</div>
			</div>
			<!-- --------------------------------------------------- -->
			<!-- 
        <div class="form-group col-3">
          <label for="registrado">Registrado en C. de Comercio:</label>
          <select class="form-control" style="width: 5em;" name="registrado" v-model="" id="registrado">
            <option value="Si" <?php if ($registrado == "Si") {
									echo "selected";
								} ?>>Si</option>
            <option value="No" <?php if ($registrado == "No") {
									echo "selected";
								} ?>>No</option>
          </select>
        </div>
        <div class="form-group col-3" style="display:none">
          <label id="registrado" for="registrado">Número C. de Comercio:</label>
          <input class="form-control" type="text" placeholder="Número cámara comercio" name="registrado" id="registrado" value="<?= $registrado ?>">
        </div> -->
			<d class="form-row">
				<div class="form-group col-3">
					<label for="celular_representante">Celular Representante</label>
					<input type="number" value="<?php echo $celular_representante ?>" id="celular_representante" name="celular_representante" class="form-control" placeholder="Celular Representante">
				</div>
				<!-- -------------------------- -->
				<div class="form-group col-3">
					<label for="genero">Género:</label>
					<select class="form-control" name="genero" v-model="select">
						<option value="">Seleccione</option>
						<option value="Mujer" <?php if (isset($genero) && $genero == "Mujer") {
													echo "selected";
												} ?>>Mujer</option>

						<option value="Hombre" <?php if (isset($genero) && $genero == "Hombre") {
													echo "selected";
												} ?>>Hombre</option>
					</select>
				</div>
				<!-- -------------- -->
				<div class="form-group col-3">
					<label for="escolaridad">Escolaridad:</label>
					<select class="form-control" name="escolaridad" v-model="select">
						<option value="Ninguna" <?php if (isset($escolaridad) && $escolaridad == "Ninguna") {
													echo "selected";
												} ?>>Ninguna</option>

						<option value="Basica" <?php if (isset($escolaridad) && $escolaridad == "'Basica") {
													echo "selected";
												} ?>>Básica (Primaria)</option>

						<option value="Media" <?php if (isset($escolaridad) && $escolaridad == "Media") {
													echo "selected";
												} ?>>Media (Secundaria)</option>
						<option value="Superior" <?php if (isset($escolaridad) && $escolaridad == "Superior") {
														echo "selected";
													} ?>>Superior (Técnico, Tecnólogo)</option>
						<option value="Universitario" <?php if (isset($escolaridad) && $escolaridad == "Universitario") {
															echo "selected";
														} ?>>Universitario</option>
						<option value="Posgrado" <?php if (isset($escolaridad) && $escolaridad == "Posgrado") {
														echo "selected";
													} ?>>Posgrado (Especialización, Maestría, Doctorado)</option>
					</select>
				</div>
				<!-- -------------------------- -->
				<div class="form-group col-3">
					<label for="rango_edad">Rango de edad:</label>
					<select class="form-control" name="rango_edad" v-model="select">
						<option value="Menor a 18" <?php if (isset($rango_edad) && $rango_edad == "Menor a 18") {
														echo "selected";
													} ?>>Menor a 18</option>

						<option selected value="18 a 24 años" <?php if (isset($rango_edad) && $rango_edad == "'18 a 24 años") {
																	echo "selected";
																} ?>>18 a 24 años</option>

						<option value="25 a 34 años" <?php if (isset($rango_edad) && $rango_edad == "25 a 34 años") {
															echo "selected";
														} ?>>25 a 34 años</option>
						<option value="25 a 44 años" <?php if (isset($rango_edad) && $rango_edad == "25 a 44 años") {
															echo "selected";
														} ?>>25 a 44 años</option>
						<option value="45 a 54 años" <?php if (isset($rango_edad) && $rango_edad == "45 a 54 años") {
															echo "selected";
														} ?>>45 a 54 años</option>
						<option value="Más de 54" <?php if (isset($rango_edad) && $rango_edad == "Más de 54") {
														echo "selected";
													} ?>>Más de 54</option>
					</select>
				</div>
				<!-- ------ -->

				<div class="form-group col-3">
					<label for="programa_ccp">Pertenece a programa/proyecto de CCP u otras organizaciones:</label>
					<select class="form-control" style="width: 5em;" name="programa_ccp" v-model="programa_ccp" id="programa_ccp" onChange="cpp(this.value)">
						<option value="No" <?php if (isset($programa_ccp) && $programa_ccp == "No") {
												echo "selected";
											} ?>>No</option>
						<option value="Si" <?php if (isset($programa_ccp) && $programa_ccp == "Si") {
												echo "selected";
											} ?>>Si</option>
					</select>
				</div>

				<div class="form-group col-3 aux_program">
					<label for="estado_solicitud">Estado solicitud:</label>
					<select class="form-control " name="estado_solicitud" id="estado_solicitud">
						<option value="En proceso" <?php if (isset($estado_solicitud) && $estado_solicitud == "En proceso") {
														echo "selected";
													} ?>>En proceso</option>
						<option value="Resuelta" <?php if (isset($estado_solicitud) && $estado_solicitud == "Resuelta") {
														echo "selected";
													} ?>>Resuelta</option>
					</select>
				</div>
				<div class="form-group col-3 aux_program">
					<label for="fecha_solicitud">Fecha respuesta:</label>
					<input class="form-control" type="date" name="fecha_solicitud" id="fecha_solicitud" value="<?= $fecha_solicitud ?>">
				</div>
				<!-- --------------------------------------------------------- -->
				<br><br>
				<div class="form-group col-12">
					<b>PROYECTOS - PROGRAMAS</b>
					<div class="dropdown-divider"></div><br>

					<div class="form-group col-12">
						<div class="table-responsive" id="datos_extra">
							<table class="table" style="font-size: 12px;">
								<tr>
									<th>#</th>
									</tg>
									<th width="40%">Nom Proyecto/ Programa</th>
									<th>Participa</th>
									<th>Recibe apoyo</th>
									<th>Tipo de apoyo</th>
									<th>Descripción/ Valor</th>
								</tr>
								<?php
								// $conspxd = "SELECT * FROM `progsxdiligencias` WHERE `progsxdiligencias`.`id_diligencia` = $id_diligencia";
								$conspxd = "SELECT * FROM `progsxdiligencias` WHERE `progsxdiligencias`.`id_diligencia` = $id_diligencia";
								$query_pxd = mysqli_query($conn, $conspxd);
								$aux_pxd = array();
								if ($query_pxd) {
									while ($filapxd = mysqli_fetch_array($query_pxd)) {
										$aux_pxd[$filapxd['id_programa']] = $filapxd;
									}
								}


								$consp = "SELECT * FROM programas WHERE estado=1 ORDER BY programa";
								$query_programas = mysqli_query($conn, $consp);
								$cont = 1;
								while ($filap = mysqli_fetch_array($query_programas)) {  ?>
									<tr>
										<td><?= $cont++ ?></td>
										<td>
											<?= $filap['programa'] ?>
										</td>
										<td>
											<input type="checkbox" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][si_programa]" value="<?= $filap['id_programa'] ? $filap['id_programa'] : '' ?>" <?php if (isset($aux_pxd[$filap['id_programa']]) && $aux_pxd[$filap['id_programa']]) echo "checked"; ?>>
										</td>
										<td>
											<select class="form-control" style="width: 5em;" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][recibe_apoyo]" id="apoyo">
												<option value="No" <?php if (isset($aux_pxd[$filap['id_programa']]['recibe_apoyo']) && $aux_pxd[$filap['id_programa']]['recibe_apoyo'] == "No") {
																		echo "selected";
																	} ?>>No</option>
												<option value="Si" <?php if (isset($aux_pxd[$filap['id_programa']]['recibe_apoyo']) && $aux_pxd[$filap['id_programa']]['recibe_apoyo'] == "Si") {
																		echo "selected";
																	} ?>>Si</option>
											</select>
										</td>
										<td>
											<select class="form-control " name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][dinero_espcie]" id="dinero_espcie">
												<option value="Dinero" <?php
																		if (isset($aux_pxd[$filap['id_programa']]['dinero_espcie']) && ($aux_pxd[$filap['id_programa']]['dinero_espcie'] == "Dinero"
																			|| $aux_pxd[$filap['id_programa']] == "Di")) {
																			echo "selected";
																		} ?>>Dinero</option>

												<option value="Especie" <?php if (isset($aux_pxd[$filap['id_programa']]['dinero_espcie']) && ($aux_pxd[$filap['id_programa']]['dinero_espcie'] != "Dinero" && $aux_pxd[$filap['id_programa']] != "Di")) {
																			echo "selected";
																		} ?>>Especie</option>
											</select>
										</td>
										<td>
											<input class="form-control " type="text" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][descrip_val]" id="especie" value="<?= isset($aux_pxd[$filap['id_programa']]['descrip_val']) ? $aux_pxd[$filap['id_programa']]['descrip_val'] : '' ?>">
										</td>
									</tr> <?php
										} ?>
							</table>
						</div>
					</div>

				</div>

				<!-- --------- -->
				<div class="d-flex justify-content-between">
					<div class="form-group col-12">
						<input type="button" value="Regresar" class="btn btn-danger" onClick="document.location.href='diligencias.php?ruta=Diligencias'">
						<input type="submit" value="Actualizar" class="btn btn-success" name="update">
						<!-- <input type="submit" value="Guardar" class="btn btn-success" name="Guardar"> -->
					</div>
				</div>
		</div>


	</form>

</div>

<?php
include "pie.php";
?>

<script>
	$(document).ready(function() {
		<?php
		if ($programa_ccp == "No" || $programa_ccp == "") { ?>
			$(".aux_program").hide();
		<?php   }
		if ($poblacion == "Otro") { ?>
			$(".aux_cual").show();
		<?php   }
		if ($activEcon == "Other") { ?>
			$(".act_econ").show();
		<?php  }
		if ($registrado == "Si") { ?>
			$(".aux_regis").show();
		<?php   } ?>
	});


	function validar() {

	}

	function ocultar() {
		$("#datos_reg").hide();
		$("#ocultar").hide();
		$("#mostrar").show();
	}

	function mostrar() {
		$("#datos_reg").show();
		$("#ocultar").show();
		$("#mostrar").hide();
	}

	function tipoPobla(tipo_pob) {
		if (tipo_pob != "Otro") {
			$(".aux_cual").hide();
		} else {
			$(".aux_cual").show();
		}
	}

	function activEconomica(activ_econ) {
		if (activ_econ != "Other") {
			$(".act_econ").hide();
		} else {
			$(".act_econ").show();
		}
	}

	function siRegistrado(si_regis) {
		if (si_regis != "Si") {
			$(".aux_regis").hide();
		} else {
			$(".aux_regis").show();
		}
	}

	function cpp(cpp_p) {
		if (cpp_p == "Si") {
			$(".aux_program").show();
		} else {
			$(".aux_program").hide();
		}
	}
</script>