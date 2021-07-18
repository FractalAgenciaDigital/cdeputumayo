<?php
// ESTE ARCHIVO FUNCIONA PERO SE IMPLEMENTO UNO MEJOR POR LO TANTO NO SE ESTA UTILIZANDO
include '../funciones.php';

// validación
if ($_FILES['csv']['size'] > 0) {
	$csv = $_FILES['csv']['tmp_name'];

	// abrir el archivo recibido con privilegios de solo lectura
	$handle = fopen($csv, 'r');

	while ($data = fgetcsv($handle, 1000, ";", "'")) {
		if ($data[0]) {

			$query = "INSERT INTO programas (programa, estado) VALUES('" . $data[0] . "','" . $data[1] . "')";

			$ejecutar = mysqli_query($conn, $query);
		}
	}
	// echo "OK";
	header("location: carguemasivo.php");
	// print_r("<pre>");
	// print_r($query);
	// print_r("</pre>");
}
