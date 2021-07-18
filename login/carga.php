<?php
//ESTE ARCHIVO NO SE ESTA UTILIZANDO ACTUALMENTE - NO FUNCIONAAA
include '../funciones.php';

// ---------------------------------Subir Excel
$ruta = "../site/assets/Upload/";

foreach ($_FILES as $key) {
	$nombre = $key["name"];
	$ruta_temporal = $key["tmp_name"];

	$fecha = getDate();
	// No reemplazar archivos con el mismo nombre
	$nombre_archivo = $fecha["mday"] . "-" . $fecha["mon"] . "-" . $fecha["year"] . "_" . $fecha["hours"] . "-" . $fecha["minutes"] . "-" . $fecha["seconds"] . ".csv";

	// print_r($nombre);
	$destino = $ruta . $nombre_archivo;
	// explode separa
	$explo = explode(".", $nombre);

	if ($explo[1] != "csv") {
		$alert = 1;
	} else {
		if (move_uploaded_file($ruta_temporal, $destino)) {
			$alert = 2;
		}
	}
}

$x = 0;
$data = array();
// fopen abre una URL o un archivo, r = read mode
$fichero = fopen($destino, "r");

while (($datos = fgetcsv($fichero, 1000)) != FALSE) {

	$x++;
	if ($x > 0) {
		$data[] = '(' . $datos[0] . '' . $datos[1] . '' . $datos[2] . ')';
		// implode junta
		$inserta = "INSERT INTO programas VALUES " . implode(",", $data);
		$ejecutar = mysqli_query($conn, $inserta);
	}
}

// header("location: carguemasivo.php");


// fclose($fichero);
// print_r("<pre>");
// print_r($data);
// print_r("</pre>");
