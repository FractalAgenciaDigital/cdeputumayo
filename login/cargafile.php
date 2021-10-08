<?php
//ESTE ARCHIVO NO SE ESTA UTILIZANDO ACTUALMENTE - EL INSERT SE REALIZO EN EL MISMO ARCHIVO: carguemasivo.php
include '../funciones.php';

function insertar_datos($tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado,  $programa_ccp, $estado_solicitud, $fecha_solicitud, $genero, $escolaridad, $rango_edad, $solicitud)
{

	global $conn;

	$insert = "INSERT INTO diligencias_new (tipoDocumento, documento, nombres, apellidos, ciudad, email, celular, direccEmpr, activEcon, otro_activEcon, des_productivo, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado,, programa_ccp, estado_solicitud, fecha_solicitud, genero, escolaridad, rango_edad, solicitud) VALUES ($tipoDocumento, $documento, '$nombres', '$apellidos', '$ciudad', '$email', '$celular', '$direccEmpr', '$activEcon', '$otro_activEcon', '$des_productivo', '$fort_empresarial', '$form_empresarial', '$nombre_representante', '$celular_representante', '$email_representante', '$poblacion', '$otro_poblacion', $fecha_matricula, '$matricula', '$registrado', '$programa_ccp', '$estado_solicitud', $fecha_solicitud, '$genero', '$escolaridad', '$rango_edad', '$solicitud')";

	$exe_insert = mysqli_query($conn, $insert);
	return $exe_insert;
}
